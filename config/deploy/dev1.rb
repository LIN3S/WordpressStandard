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
# Setup Server
############################################

server "dev1.novisline.es", user: "deploy", roles: %w{web}
set :deploy_to, "/home/novisline/domains/standard-wordpress.novisline.es/public_html"
set :env, "dev1"

############################################
# Setup Git
############################################

set :branch, "master"
