Wordpress Standard Edition
===========================
> The "Wordpress Standard Edition" distribution in the LIN3S way

Why?
----
[**Wordpress**][1] is the most important CMS around the world, but its PHP code is dark and unmaintainable. In
[*LIN3S*][2] we implement this solution providing some useful features that the standard edition of Wordpress hasn't:

1. [Composer][3]
2. [PHP namespaces][4]
3. Front-end workflow
 * [Sass][5]
 * [Npm][6]
 * [Bower][7]
 * [Gulp.js][8]
4. [Twig][9] template engine with [Timber][10]
5. [Capistrano][11] deploy
6. [Symfony style routing made by LIN3S][12]

Prerequisites
-------------
The above sounds great so now, to start developing Wordpress themes based on this project, you need the the following
requirements:

1. [PHP][13] 5.4 or higher
2. [MySQL][14]
3. Composer: `curl -sS https://getcomposer.org/installer | php`
4. [Ruby][15]
  * Capistrano: `gem install capistrano && gem install capistrano-composer`
  * Sass: `gem install sass`
  * Scss-lint: `gem install scss-lint`
5. [Node.js][16]
  * Bower: `npm install -g bower`
  * Gulp.js: `npm install -g gulp`

Getting Started
---------------
After install all the prerequisites, to create a Wordpress project based on this *Wordpress Standard* you should check
the following steps.

Firstly, you need to **clone the project**:
```
$ git clone git@github.com:LIN3S/WordpressStandard.git <project-name> && cd <project-name>
```
Because our proposal is create a new Wordpress project on top of this, you should **remove `.git` folder and create a
new git repo** for your new awesome Wordpress theme:
```
$ rm -Rf .git && git init
```
Also, all the namespaces and different references inside project have the **WordpressStandard** keyword so, you should
**check for the references across the files and replace them with your awesome project name**.
> You should remove the header licenses and `LICENSE` itself, because we are not going to be the authors of your
 awesome project :)
> Remember that the `WordpressStandardTheme.php` file name and the `src/themes/WordpressStandard` directory name,
also, should be changed.
> Also, **CAUTION!**: you **MUST** updated `!WordpressStandard` of [`src/themes/.gitignore`][18] file

Then, to **install all the project dependencies** run the following commands:
```
$ composer install
$ cd src/themes/<project-name> && npm install && bower install
```
Create the `wp-config-custom.php` copying the `wp-config-custom-sample.php` and customizing with your values.

**Generate all required assets** using Gulp. You can also watch the changes:
```
$ gulp
$ gulp watch
```
**Configure the web server** to serve this project. With PHP 5.4 or higher you don't need to configure the web server
for this project, because you can use the "**built-in-server**":
```
$ php -S 12.0.0.1:8000
```
And that's all! Now, if you request [http://127.0.0.1:8000/](http://127.0.0.1:8000/), you will see your site up and
running, for testing.

Use an [Apache][17], Nginx or another web server of your choice for production environments. If you choose Apache,
remember that you should created the `.htaccess` moving from base `.htaccess.dist` file.

Considerations
--------------
If all goes well you should have your project on top of Wordpress Standard running like a charm. However, there are
few tips that you should read.

* **Activate all yours plugins before all**: it's a common mistake; you are developing inside your favorite IDE, you
test in the browser and something is wrong because *Timber* or *simple-fields* plugins are very required in this project.
* To generate simple, clean and maintainable Sass code you should use the *scss-lint*. It's a project prerequisite so
please, check its outputs and try to accomplish them. Also, **Sass example folder structure has been created,
follow it. Use mobile first approach** and **don't use magic numbers**.
* Usually, the features Wordpress has by default are not enough so new PostTypes, Widgets, ShortCodes, ImageSizes...
have to be created. In case you need those changes to the codebase you should go to the `core` folder. There, you will 
find some examples on how to extend many different Wordpress features. In case there is no class for what you need, just
create a new class or a new folder (if there are multiple classes related to that feature as in post types) with your 
code.

Deploy
------
To automatize the deploy process this project is using **Capistrano**. All about its configuration is inside `config`
directory. You can customize deploy tasks simply, modifying the `config/deploy.rb` file.

You should update the *wordpress-standard* application name for your awesome project name and the repo url with your
project git url.

Inside `config/deploy` directory there two files that can be considered as pre-production stage and production stage.
There is no logic, these files only contain few parameters that you should customize for your proper deployment.

After all, and following the Capistrano [documentation][11] to configure the server, you can deploy executing:
```
$ cap <stage> deploy       # <stage> can be dev1, prod or whatever file inside deploy directory
```

> In the Capistrano shared directory must be exist `src/uploads`, .htaccess (if you are using Apache), robots.txt and
 wp-config-custom.php

[1]: https://wordpress.org/
[2]: http://lin3s.com
[3]: https://getcomposer.org/
[4]: http://php.net/manual/en/language.namespaces.php
[5]: http://sass-lang.com/
[6]: https://www.npmjs.com/
[7]: http://bower.io/
[8]: http://gulpjs.com/
[9]: http://twig.sensiolabs.org/
[10]: http://upstatement.com/timber/
[11]: http://capistranorb.com/
[12]: https://github.com/LIN3S/WPRouting
[13]: http://php.net
[14]: http://dev.mysql.com/downloads/
[15]: https://www.ruby-lang.org/en/downloads/
[16]: https://nodejs.org/download/
[17]: http://httpd.apache.org/
[18]: https://github.com/LIN3S/WordpressStandard/blob/master/src/themes/.gitignore#L13
