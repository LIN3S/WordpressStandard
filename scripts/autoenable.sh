#!/bin/bash

curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
./wp-cli.phar core install --allow-root --admin_name=admin --admin_password=admin --admin_email=info@lin3s.com --path=core --url=http://127.0.0.1:8000 --title=SiteTitle
./wp-cli.phar plugin activate template-selector --allow-root --path=core --url=http://127.0.0.1:8000
./wp-cli.phar plugin activate timber-library --allow-root --path=core --url=http://127.0.0.1:8000
./wp-cli.phar theme activate WordpressStandard --allow-root --path=core --url=http://127.0.0.1:8000
./wp-cli.phar rewrite flush --allow-root --path=core --url=http://127.0.0.1:8000
