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

set :linked_files, %w{wp-config-custom.php robots.txt}
set :linked_dirs, %w{src/uploads}

namespace :sass do
    desc 'Compile and copy'
    task :compile do
        run_locally do
            execute "cd #{fetch(:theme_path)}; gulp sass:prod"
        end
    end

    task :upload do
        on roles(:all) do |host|
          upload! "#{fetch(:theme_path)}/css/app.css", "#{release_path}/src/themes/#{fetch(:theme_name)}/css/app.css"
          upload! "#{fetch(:theme_path)}/sprites", "#{release_path}/#{fetch(:theme_path)}/sprites", recursive: true
        end
    end
end

namespace :deploy do
  after :starting, 'composer:install_executable'
  after :updated, 'sass:compile'
  after :updated, 'sass:upload'
end

