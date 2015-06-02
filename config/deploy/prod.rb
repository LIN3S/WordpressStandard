############################################
# Setup Server
############################################

server "", user: "", roles: %w{web}
set :deploy_to, "/var/www/standard-wordpress.net"

############################################
# Setup Git
############################################

set :branch, "master"

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"
