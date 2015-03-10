############################################
# Setup Server
############################################

server "", user: "", roles: %w{web}
set :deploy_to, "/var/www/your-project.net"

############################################
# Setup Git
############################################

set :branch, "master"

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"