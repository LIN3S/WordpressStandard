#!/bin/bash

echo -e "Enter the name of your project (one word, first letter uppercase): \c "
read project
lowerproject="${project,,}"

mv src/themes/WordpressStandard/WordpressStandardTheme.php "src/themes/WordpressStandard/${project}Theme.php"
mv src/themes/WordpressStandard "src/themes/$project"
find src -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find src -type f -print0 | xargs -0 sed -i "s/WordpressStandard/$project/g"
find src -type f -print0 | xargs -0 sed -i "s/wordpress-standard/$lowerproject/g"

find .gitignore -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find .htaccess.dist -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"

rm .lin3s_cs.yml
find .lin3s_cs.yml.dist -type f -print0 | xargs -0 sed -i "s/CHANGE-FOR-YOUR-AWESOME-NAME/$project/g"
find Capfile -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find composer.json -type f -print0 | xargs -0 sed -i "s/lin3s\/wordpress-standard/$lowerproject/g"
find composer.json -type f -print0 | xargs -0 sed -i "s/WordpressStandard/$project/g"
find robots.txt -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find robots.txt.dist -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find router.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find wp-config.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find wp-config-custom.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"
find wp-config-custom-sample.php -type f -print0 | xargs -0 sed -i "s/WordPress Standard/$project/g"

echo "Replace done! Check your composer.json and run composer install again"
