# This file is part of the WordPress Standard project.
#
# Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.
#
# @author Gorka Laucirica <gorka.lauzirika@gmail.com>
# @author Beñat Espiña <benatespina@gmail.com>
# @author Jon Torrado <jontorrado@gmail.com>

############################################
# Setup project
############################################

set :application, "wordpress-standard"
set :repo_url, "https://github.com/LIN3S/WordpressStandard.git"
set :scm, :git
set :theme_name, "WordpressStandard"

############################################
# Setup Capistrano
############################################

set :log_level, :info
set :use_sudo, false

set :ssh_options, {
  forward_agent: true
}

set :keep_releases, 5

############################################
# Linked files and directories (symlinks)
############################################

set :theme_path, "src/themes/#{fetch(:theme_name)}"

set :linked_files, %w{wp-config-custom.php .htaccess robots.txt}
set :linked_dirs, %w{src/uploads}

set :composer_install_flags, '--no-dev --no-interaction --optimize-autoloader'

namespace :compile_and_upload do

  desc 'Compile and upload'

  task :npm do
    if fetch(:env) == "prod"
      run_locally do
        execute "cd #{fetch(:theme_path)}; rm -rf node_modules/* && npm install --production"
        execute "cd #{fetch(:theme_path)}; tar -zcvf node_modules.tar.gz node_modules"
      end
      on roles(:all) do |host|
        upload! "#{fetch(:theme_path)}/node_modules.tar.gz", "#{release_path}/#{fetch(:theme_path)}/node_modules.tar.gz"
        execute :tar, '-zxvf', "#{release_path}/#{fetch(:theme_path)}/node_modules.tar.gz -C #{release_path}/#{fetch(:theme_path)}/"
        execute :rm, "#{release_path}/#{fetch(:theme_path)}/node_modules.tar.gz"
      end
      run_locally do
        execute :rm, "#{fetch(:theme_path)}/node_modules.tar.gz"
        execute "cd #{fetch(:theme_path)}; npm install"
      end
    else
      on roles(:all) do |host|
        execute "cd #{release_path}/#{fetch(:theme_path)}; npm install"
      end
    end
  end

  task :gulp do
    if fetch(:env) == "prod"
      run_locally do
        execute "cd #{fetch(:theme_path)}; npm install && gulp prod"
      end
    else
      on roles(:all) do |host|
        execute "cd #{release_path}/#{fetch(:theme_path)}; npm install && gulp prod"
      end
    end
  end

  task :upload do
    if fetch(:env) == "prod"
      on roles(:all) do |host|
        upload! "#{fetch(:theme_path)}/Resources/build", "#{release_path}/#{fetch(:theme_path)}/Resources/build", recursive: true
        upload! "#{fetch(:theme_path)}/style.css", "#{release_path}/#{fetch(:theme_path)}/style.css"
      end
    end
  end
end

############################################
# Download and extract uploaded files
############################################
namespace :uploads do
  desc 'Get uploads'

  task :download do
    on roles(:all) do |host|
      execute "cd #{shared_path}; tar -zcvf uploads.tar.gz src/uploads/"
      download! "#{shared_path}/uploads.tar.gz", "."
      execute :rm, "-rf", "#{shared_path}/uploads.tar.gz"
    end
  end

  task :extract do
    run_locally do
      execute :rm, "-rf", "src/uploads"
      execute :tar, '-zxvf', "uploads.tar.gz"
      execute :rm, "uploads.tar.gz"
    end
  end
end

############################################
# Download database
############################################
namespace :database do
  desc "Database management"
  task :download do
    on roles(:all) do |host|
      dbuser = nil
      dbpass = nil
      dbname = nil
      file = capture "cat #{shared_path}/wp-config-custom.php"
      file.each_line do |line|
        line.split("\t").each do |item|
          if item.include? "DB_USER"
            dbuser = item.gsub(/(define|\(|\'|\,|\)\;|\ |\n|DB_USER)/, '')
          end
          if item.include? "DB_PASSWORD"
            dbpass = item.gsub(/(define|\(|\'|\,|\)\;|\ |\n|DB_PASSWORD)/, '')
          end
          if item.include? "DB_NAME"
            dbname = item.gsub(/(define|\(|\'|\,|\)\;|\ |\n|DB_NAME)/, '')
          end
        end
      end
      if dbuser != nil and dbpass != nil and dbname != nil
        execute "cd #{shared_path};mysqldump -u#{dbuser} -p#{dbpass} #{dbname} > #{dbname}_cap.sql"
        download! "#{shared_path}/#{dbname}_cap.sql", "."
        execute :rm, "-f", "#{shared_path}/#{dbname}_cap.sql"
      else
        puts "Cannot download file (dbuser or dbpass or dbname not found)"
      end
    end
  end
end

############################################
# Empty remote caches
############################################
namespace :cache do

  desc 'Clears accelerator caches'

  task :clear do
    on roles(:all) do |host|
      execute "curl #{fetch(:cache_opts)} #{fetch(:domain)}/deploy/scripts/clearcache.php"
    end
  end
end

namespace :deploy do
  after :starting, 'composer:install_executable'
  after :updated, 'compile_and_upload:npm'
  after :updated, 'compile_and_upload:gulp'
  after :updated, 'compile_and_upload:upload'
  #after :finishing, 'cache:clear'
end
