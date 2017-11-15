# This file is part of the WordPress Standard project.
#
# Copyright (c) 2015-present LIN3S <info@lin3s.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.
#
# @author Gorka Laucirica <gorka.lauzirika@gmail.com>
# @author Jon Torrado <jontorrado@gmail.com>
# @author Beñat Espiña <benatespina@gmail.com>

set :deploy_config_path, 'deploy/deploy.rb'
set :stage_config_path, 'deploy/stages/'

require 'capistrano/setup'

require 'capistrano/deploy'
require 'capistrano/scm/git'
install_plugin Capistrano::SCM::Git
require 'capistrano/composer'

Dir.glob('deploy/tasks/*.cap').each { |r| import r }
