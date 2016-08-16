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
set :theme_name, "AppTheme"

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
set :linked_dirs, %w{src/uploads src/languages}

set :composer_install_flags, '--no-dev --no-interaction --optimize-autoloader'

namespace :deploy do
  before :starting, 'git:check_branch'
  after :starting, 'composer:install_executable'
  after :updated, 'compile_and_upload:npm'
  after :updated, 'compile_and_upload:gulp'
  after :updated, 'compile_and_upload:upload'
  #after :finishing, 'cache:clear'
end
