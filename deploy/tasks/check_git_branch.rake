namespace :git do
  desc 'Checks for same actual and deploy branch'
  task :check_branch do
    current_branch = `git branch`.match(/\* (\S+)\s/m)[1]
    if current_branch != fetch(:branch)
      puts "\e[31mCurrent branch '#{current_branch}' differs from deployment branch, stopping\e[0m"
      exit 1
    end
  end
end
