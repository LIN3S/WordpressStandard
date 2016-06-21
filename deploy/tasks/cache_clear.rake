namespace :cache do
  desc 'Clears accelerator caches'
  task :clear do
    on roles(:all) do |host|
      execute "curl #{fetch(:cache_opts)} #{fetch(:domain)}/scripts/clearcache.php"
    end
  end
end
