# This file is part of the Wordpress Standard project.
#
# Copyright (c) 2015 LIN3S <info@lin3s.com>
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
set :repo_url, "git@github.com:LIN3S/WordpressStandard.git"
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
    task :compile do
        run_locally do
            execute "cd #{fetch(:theme_path)}; gulp prod"
        end
    end

    task :upload do
        on roles(:all) do |host|
            upload! "#{fetch(:theme_path)}/Resources/build", "#{release_path}/src/themes/#{fetch(:theme_name)}/Resources/build", recursive: true
            upload! "#{fetch(:theme_path)}/style.css", "#{release_path}/src/themes/#{fetch(:theme_name)}/style.css"

            if fetch(:env) == "prod"
                run_locally do
                    execute "cd #{fetch(:theme_path)}; bower install"
                end
                on roles(:all) do |host|
                    upload! "#{fetch(:theme_path)}/Resources/assets/vendor", "#{release_path}/src/themes/#{fetch(:theme_name)}/Resources/assets/vendor", recursive: true
                end
            else
                execute "cd #{release_path}/#{fetch(:theme_path)}; bower install"
            end
        end
    end
end

namespace :deploy do
  after :starting, 'composer:install_executable'
  after :updated, 'compile_and_upload:compile'
  after :updated, 'compile_and_upload:upload'
end
