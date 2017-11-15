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

server "dev.company.com", user: "sshuser", roles: %w{web}
set :deploy_to, "/path/to/your/deployment/directory"
set :env,  "dev"
set :cache_opts, "-u user:password"
set :domain, "http://devwebsite.domain.com"

set :branch, "master"
