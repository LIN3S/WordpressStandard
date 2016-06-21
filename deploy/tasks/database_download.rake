namespace :database do
  desc 'Remote database download'
  task :download do
    on roles(:all) do |host|
      dbuser, dbpass, dbname = nil, nil, nil
      file = capture "cat #{shared_path}/wp-config-custom.php"
      file.each_line do |line|
        line.split("\t").each do |item|
          if item.include? "DB_USER"
            dbuser = item.gsub(/(define|\(|\'|\,|\)\;|\ |\n|DB_USER)/, '')
          end
          if item.include? "DB_PASSWORD"
            dbpass = item.gsub(/(define|\(|\'|\,|\)\;|\ |\n|DB_PASSWORD)/, '')
          end
          if item.include? "DB_NAME"
            dbname = item.gsub(/(define|\(|\'|\,|\)\;|\ |\n|DB_NAME)/, '')
          end
        end
      end
      if dbuser != nil and dbpass != nil and dbname != nil
        execute "cd #{shared_path};mysqldump -u'#{dbuser}' -p'#{dbpass}' #{dbname} > #{dbname}_cap.sql"
        download! "#{shared_path}/#{dbname}_cap.sql", "."
        execute :rm, "-f", "#{shared_path}/#{dbname}_cap.sql"
      else
        puts "Cannot download file (dbuser or dbpass or dbname not found)"
      end
    end
  end
end
