# This file is part of the WordPress Standard project.
#
# Copyright (c) 2015-present LIN3S <info@lin3s.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.
#
# @author Gorka Laucirica <gorka.lauzirika@gmail.com>
# @author Beñat Espiña <benatespina@gmail.com>
# @author Jon Torrado <jontorrado@gmail.com>

set :application, "wordpress-standard"
set :repo_url, "https://github.com/LIN3S/WordpressStandard.git"
set :scm, :git

set :log_level, :info
set :use_sudo, false

set :ssh_options, {
  forward_agent: true
}

set :keep_releases, 3

set :linked_files, [
  ".htaccess",
  "advanced-cache.php",
  "db.php",
  "object-cache.php",
  "plugins/w3tc-wp-loader.php",
  "robots.txt",
  "wp-config-custom.php"
]

set :linked_dirs, [
  "cache",
  "languages",
  "uploads",
  "w3tc-config"
]

set :composer_install_flags, '--no-dev --no-interaction --optimize-autoloader'

namespace :deploy do
  before :starting, 'git:check_branch'
  after :starting, 'composer:install_executable'
#  after :finishing, 'cache:clear'
end
