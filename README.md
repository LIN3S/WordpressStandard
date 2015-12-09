#Wordpress Standard Edition
> The "Wordpress Standard Edition" distribution in the LIN3S way.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b43b0be1-d2b5-44a1-8d4b-a556848129a5/mini.png)](https://insight.sensiolabs.com/projects/b43b0be1-d2b5-44a1-8d4b-a556848129a5)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LIN3S/WordpressStandard/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LIN3S/WordpressStandard/?branch=master)
[![Total Downloads](https://poser.pugx.org/lin3s/wordpress-standard/downloads)](https://packagist.org/packages/lin3s/wordpress-standard)
&nbsp;&nbsp;&nbsp;&nbsp;
[![Latest Stable Version](https://poser.pugx.org/lin3s/wordpress-standard/v/stable.svg)](https://packagist.org/packages/lin3s/wordpress-standard)
[![Latest Unstable Version](https://poser.pugx.org/lin3s/wordpress-standard/v/unstable.svg)](https://packagist.org/packages/lin3s/wordpress-standard)

##Why?
[**Wordpress**][1] is the most important CMS around the world, but its PHP code is dark and unmaintainable. In
[*LIN3S*][2] we implement this solution providing some useful features that the standard edition of Wordpress doesn't
come with:

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
7. [WPFoundation][13] made by LIN3S
8. [Coding standards library][14] made by LIN3S

##Prerequisites
The above sounds great so, now, to start developing Wordpress project based on this repo, you need the the following
requirements:

1. [PHP][15] 5.5.9 or higher
2. [MySQL][16]
3. Composer: `curl -sS https://getcomposer.org/installer | php`
4. [Ruby][17]
  * Capistrano: `gem install capistrano && gem install capistrano-composer`
  * Sass: `gem install sass`
  * Scss-lint: `gem install scss-lint`
5. [Node.js][18]
  * Bower: `npm install -g bower`
  * Gulp.js: `npm install -g gulp`
  * ESLint: `npm install -g eslint`

##Getting Started
After installing all the prerequisites, to create a Wordpress project based on this *Wordpress Standard* you should
check the following steps.

Firstly, you need to **create the project**:
```
$ composer create-project lin3s/wordpress-standard <project-name> && cd <project-name>
```
Also, all the namespaces and different references inside project have the **WordpressStandard** keyword so you should
**check for the references across the files and replace them with your awesome project name**.
> You should remove the header licenses and `LICENSE` itself, because we are not going to be the authors of your
 awesome project :)
> Remember that the `WordpressStandardTheme.php` file name and the `src/themes/WordpressStandard` directory name
should be changed too.
> Also, **CAUTION!**: you **MUST** updated `!WordpressStandard` of [`src/themes/.gitignore`][19] file.

Then, in order to **install all the front-end dependencies** run the following commands:
```
$ cd src/themes/<project-name> && npm install && bower install
```
Create the `wp-config-custom.php` copying the `wp-config-custom-sample.php` and customizing with your values.

**Generate all the required assets** using Gulp. You can also watch the changes:
```
$ gulp
$ gulp watch
```
**Configure the web server** to serve this project. With PHP 5.4 or higher you don't need to configure the web server
for this project, because you can use the "**built-in-server**":
```
$ php -S 127.0.0.1:8000 router.php
```

Use an [Apache][20], Nginx or other web server of your choice for production environments. If you choose Apache,
remember that you should create the `.htaccess` copying the base `.htaccess.dist` file.

##Considerations
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

##Deployment
To automatize the deployment process this project is using **Capistrano**. All about its configuration is inside the
`deploy` directory. You can customize deployment tasks simply, modifying the `deploy/deploy.rb` file.

You should update the *wordpress-standard* application name for your awesome project name and the repo url with your
project git url.

Inside `deploy/stages` directory there two files that can be considered as pre-production stage and production stage.
There is no logic, these files only contain few parameters that you should customize for your proper deployment.

After all, and following the Capistrano [documentation][11] to configure the server, you can deploy executing:
```
$ cap <stage> deploy    # <stage> can be dev1, prod or whatever file inside stages directory
```

> In the Capistrano shared directory you should create the `src/uploads` folder, the `.htaccess` file (if you are using
Apache), the `robots.txt` and the `wp-config-custom.php` files.

### Downloading database dump

To download the file just run `cap dev1 database:download`. A sql file will be downloaded to your local environment

### Replacing uploads with remote ones
 
To steps are required to get all the uploads located in the remote environment, download and extract.

`cap dev1 uploads:download` will download a .tar.gz file to the root of your local environment and 
`cap dev1 uploads:extract` will extract the downloaded file into `src/uploads` folder, replacing all the existing 
uploads. 

##Licensing Options
[![License](https://poser.pugx.org/lin3s/wordpress-standard/license.svg)](https://github.com/LIN3S/WordpressStandard/blob/master/LICENSE)

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
[13]: https://github.com/LIN3S/WPFoundation
[14]: https://github.com/LIN3S/CS
[15]: http://php.net
[16]: http://dev.mysql.com/downloads/
[17]: https://www.ruby-lang.org/en/downloads/
[18]: https://nodejs.org/download/
[19]: https://github.com/LIN3S/WordpressStandard/blob/master/src/themes/.gitignore#L13
[20]: http://httpd.apache.org/
