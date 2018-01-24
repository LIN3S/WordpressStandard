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

server "", user: "", roles: %w{web}
set :deploy_to, "/var/www/standard-wordpress.net"
set :env, "prod"
set :cache_opts, ""
set :domain, "http://website.domain.com"

set :branch, "master"

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"
