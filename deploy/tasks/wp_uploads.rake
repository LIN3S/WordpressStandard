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

namespace :uploads do
  desc 'Get uploads'
  task :download do
    on roles(:all) do |host|
      execute "cd #{shared_path}; tar -zcvf uploads.tar.gz src/uploads/"
      download! "#{shared_path}/uploads.tar.gz", "."
      execute :rm, "-rf", "#{shared_path}/uploads.tar.gz"
    end
  end

  desc 'Extract uploads'
  task :extract do
    run_locally do
      execute :rm, "-rf", "src/uploads"
      execute :tar, '-zxvf', "uploads.tar.gz"
      execute :rm, "uploads.tar.gz"
    end
  end
end
