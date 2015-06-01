Wordpress Standard Edition
===========================

Why?
----
**Wordpress** it is the most important CMS around the world, but its PHP code is dark and unmaintainable. This WP
skeleton provides some useful features that the standard edition of Wordpress hasn't, such as *Composer*,
*PHP namespaces* or a proper *front-end workflow* to develop themes in the right way. 

Getting Started
---------------
To get the standard distribution in your local environment just run the following:
```
$ git clone git@gitlab.novisline.es:lin3s/standard-wordpress.git <project-name>
$ cd <project-name>
```
Remove `.git` folder and create a new git repo for the project:
```
$ rm -Rf .git
$ git init
```

This repository is a Wordpress skeleton so, to run requires *[PHP][1]* itself, *[Composer][2]* and *[MySQL][3]*.
Run composer to get all the dependencies:
```
$ composer install
```
Check for references to `standard-wordpress` across the files and replace them with your project-name
Copy `wp-config-custom-sample.php` to `wp-config-custom.php` and add database connection details
Do the same `.htaccess.dist` to `.htaccess` customizing what you need.

To start using the template read its [`README.md`][4] located in `src\themes\ClientName`

Deploy
------
> To use *[Capistrano][5]* check all gems have been installed

[1]: http://php.net
[2]: http://getcomposer.org/download
[3]: http://dev.mysql.com/downloads/
[4]: http://gitlab.novisline.es:8081/lin3s/standard-wordpress/blob/master/src/themes/standard-theme/README.md
[5]: http://capistranorb.com/
