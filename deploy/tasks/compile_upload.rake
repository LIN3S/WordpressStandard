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

namespace :compile_and_upload do
  desc 'npm dependencies'
  task :npm do
    if fetch(:env) == "prod"
      run_locally do
        execute "cd #{fetch(:theme_path)}; rm -rf node_modules/* && npm install --production"
        execute "cd #{fetch(:theme_path)}; tar -zcvf node_modules.tar.gz node_modules"
      end
      on roles(:all) do |host|
        upload! "#{fetch(:theme_path)}/node_modules.tar.gz", "#{release_path}/#{fetch(:theme_path)}/node_modules.tar.gz"
        execute :tar, '-zxvf', "#{release_path}/#{fetch(:theme_path)}/node_modules.tar.gz -C #{release_path}/#{fetch(:theme_path)}/"
        execute :rm, "#{release_path}/#{fetch(:theme_path)}/node_modules.tar.gz"
      end
      run_locally do
        execute :rm, "#{fetch(:theme_path)}/node_modules.tar.gz"
        execute "cd #{fetch(:theme_path)}; npm install"
      end
    else
      on roles(:all) do |host|
        execute "cd #{release_path}/#{fetch(:theme_path)}; npm install"
      end
    end
  end

  desc 'Gulp tasks launch'
  task :gulp do
    if fetch(:env) == "prod"
      run_locally do
        execute "cd #{fetch(:theme_path)}; npm install && gulp prod"
      end
    else
      on roles(:all) do |host|
        execute "cd #{release_path}/#{fetch(:theme_path)}; npm install && gulp prod"
      end
    end
  end

  desc 'Upload needed files'
  task :upload do
    if fetch(:env) == "prod"
      on roles(:all) do |host|
        upload! "#{fetch(:theme_path)}/Resources/build", "#{release_path}/#{fetch(:theme_path)}/Resources/build", recursive: true
        upload! "#{fetch(:theme_path)}/style.css", "#{release_path}/#{fetch(:theme_path)}/style.css"
      end
    end
  end
end
