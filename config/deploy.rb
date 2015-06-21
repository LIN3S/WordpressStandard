############################################
# Setup project
############################################

set :application, "standard-wordpress"
set :repo_url, "git@gitlab.novisline.es:lin3s/standard-wordpress.git"
set :scm, :git
set :theme_name, "standard-wordpress"

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

set :composer_install_flags, '--no-dev --no-interaction --optimize-autoloader'

set :theme_path, "src/themes/#{fetch(:theme_name)}"

set :linked_files, %w{wp-config-custom.php .htaccess}
set :linked_dirs, %w{src/uploads}

namespace :sass do
    desc 'Compile and copy'
    task :compile do
        run_locally do
            execute "cd #{fetch(:theme_path)}; gulp prod"
        end
    end

    task :upload do
        on roles(:all) do |host|
          upload! "#{fetch(:theme_path)}/Resources/build/css", "#{release_path}/src/themes/#{fetch(:theme_name)}/Resources/build/css", recursive: true
          upload! "#{fetch(:theme_path)}/Resources/assets/vendor", "#{release_path}/src/themes/#{fetch(:theme_name)}/Resources/assets/vendor", recursive: true
          upload! "#{fetch(:theme_path)}/style.css", "#{release_path}/src/themes/#{fetch(:theme_name)}/style.css"
          # upload! "#{fetch(:theme_path)}/Resources/assets/sprites", "#{release_path}/#{fetch(:theme_path)}/Resources/assets/sprites", recursive: true
        end
    end
end

namespace :deploy do
  after :starting, 'composer:install_executable'
  after :updated, 'sass:compile'
  after :updated, 'sass:upload'
end

