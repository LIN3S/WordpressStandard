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
