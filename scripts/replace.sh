#!/bin/bash

# This file is part of the WordPress Standard project.
#
# Copyright (c) 2015-2016 LIN3S <info@lin3s.com>
#
# For the full copyright and license information, please view the LICENSE
# file that was distributed with this source code.
#
# @author Jon Torrado <jontorrado@gmail.com>

echo -e "Enter the name of your project (one word, first letter uppercase): \c "
read project
lowerproject="${project,,}"

find src -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find src -type f -print0 | xargs -0 sed -i "s/wordpress-standard/$lowerproject/g"

find .gitignore -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find .htaccess.dist -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"

rm .lin3s_cs.yml
find .lin3s_cs.yml.dist -type f -print0 | xargs -0 sed -i "s/CHANGE-FOR-YOUR-AWESOME-NAME/$project/g"
find .lin3s_cs.yml.dist -type f -print0 | xargs -0 sed -i "s/WordpressStandard/$project/g"
find Capfile -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find composer.json -type f -print0 | xargs -0 sed -i "s/lin3s\/wordpress-standard/$lowerproject/g"
find robots.txt -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find robots.txt.dist -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find router.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find wp-config.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find wp-config-custom.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find wp-config-custom-sample.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find deploy/ -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"

echo "Replace done! Check your composer.json and run composer install again"
