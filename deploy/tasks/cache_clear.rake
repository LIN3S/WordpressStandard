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

namespace :cache do
  desc 'Clears accelerator caches'
  task :clear do
    on roles(:all) do |host|
      execute "curl #{fetch(:cache_opts)} #{fetch(:domain)}/scripts/clearcache.php"
    end
  end
end
