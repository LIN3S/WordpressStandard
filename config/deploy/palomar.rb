############################################
# Setup Server
############################################

server "palomar.novisline.es", user: "deploy", roles: %w{web}
set :deploy_to, "/var/www/vhosts/novisline.es/subdomains/your-project-name/httpdocs"

############################################
# Setup Git
############################################

set :branch, "master"