# WordPress Standard Edition
> The "WordPress Standard Edition" distribution in the LIN3S way.

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b43b0be1-d2b5-44a1-8d4b-a556848129a5/mini.png)](https://insight.sensiolabs.com/projects/b43b0be1-d2b5-44a1-8d4b-a556848129a5)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LIN3S/WordpressStandard/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LIN3S/WordpressStandard/?branch=master)
[![Total Downloads](https://poser.pugx.org/lin3s/wordpress-standard/downloads)](https://packagist.org/packages/lin3s/wordpress-standard)
&nbsp;&nbsp;&nbsp;&nbsp;
[![Latest Stable Version](https://poser.pugx.org/lin3s/wordpress-standard/v/stable.svg)](https://packagist.org/packages/lin3s/wordpress-standard)
[![Latest Unstable Version](https://poser.pugx.org/lin3s/wordpress-standard/v/unstable.svg)](https://packagist.org/packages/lin3s/wordpress-standard)

## Why?
[**WordPress**][1] is the most important CMS around the world, but its PHP code is dark and unmaintainable. In
[*LIN3S*][2] we implement this solution providing some useful features that the standard edition of WordPress doesn't
come with:

1. [Composer][3]
2. [PHP namespaces][4]
3. [Capistrano][5] deploy
4. [WPFoundation][6] made by LIN3S
5. [Coding standards library][7] made by LIN3S

## Prerequisites
The above sounds great so, now, to start developing WordPress project based on this repo, you need the the following
requirements:

1. [PHP][15] 7.1 or higher
2. [MySQL][16]
3. Composer: `curl -sS https://getcomposer.org/installer | php`
4. [Ruby][17]: `gem install bundler && bundle`

## Getting Started
After installing all the prerequisites, to create a WordPress project based on this *Wordpress Standard* you should
check the following steps.

Firstly, you need to **create the project**:
```
$ composer create-project lin3s/wordpress-standard <project-name> && cd <project-name>
```
> You should remove the header licenses and `LICENSE` itself, because we are not going to be the authors of your
awesome project :).

Create the `wp-config-custom.php` copying the `wp-config-custom-sample.php` and customizing with your values.

**Configure the web server** to serve this project. With PHP 5.4 or higher you don't need to configure the web server
for this project, because you can use the "**built-in-server**":
```
$ php -S 127.0.0.1:8000 router.php
```

Use an [Apache][20], Nginx or other web server of your choice for production environments. If you choose Apache,
remember that you should create the `.htaccess` copying the base `.htaccess.dist` file.

## Considerations
If all goes well you should have your project on top of WordPress Standard running like a charm. However, there are
few tips that you should read.

* **Activate all yours plugins before all**: it's a common mistake.
* Usually, the features WordPress has by default are not enough so new PostTypes, Widgets, ShortCodes, ImageSizes...
have to be created. In case you need those changes to the codebase you should go to the `core` folder. There, you will
find some examples on how to extend many different WordPress features. In case there is no class for what you need, just
create a new class or a new folder (if there are multiple classes related to that feature as in post types) with your
code.

## Deployment
To automate deployment process this project is using **Capistrano**. All related configuration is inside located inside the
`deploy` directory. You can customize deployment tasks simply, modifying the `deploy/deploy.rb` file.

You should update the *wordpress-standard* application name for your awesome project name and the repo url with your
project git url.

Inside `deploy/stages` directory there two files that can be considered as pre-production stage and production stage.
There is no logic, these files only contain few parameters that you should customize for your proper deployment.

After all, and following the Capistrano [documentation][11] to configure the server, you can deploy executing:
```
$ cap <stage> deploy    # <stage> can be dev1, prod or whatever file inside stages directory
```

> In the Capistrano shared directory you should create the `uploads` folder, the `.htaccess` file (if you are using
Apache), the `robots.txt` and the `wp-config-custom.php` files.

### Downloading database dump

To download the file just run `cap dev1 database:download`. A sql file will be downloaded to your local environment

### Replacing uploads with remote ones
 
To steps are required to get all the uploads located in the remote environment, download and extract.

`cap dev1 uploads:download` will download a .tar.gz file to the root of your local environment and 
`cap dev1 uploads:extract` will extract the downloaded file into `src/uploads` folder, replacing all the existing 
uploads.

### Ensuring remote files and folders

The first time you deploy the project, all linked files must be created in order to be symlinked. In order to
autocreate folders and uploads your local files to the remote server (very handy when using W3 Total Cache), just run:

`cap dev1 server:ensure`

After this, just deploy without any problem.

### Clearing remote caches

When working with PHP7 & Opcache, for example, you won't see all changes after deploying. Caches need to be flushed
with the correct website domain. If you need this feature, just open the `deploy.rb` file and remove the commented line:

```
after :finishing, 'cache:clear'
```

You also need to configure the website domain in each stage file. If the website is password protected, the `curl`
command must use the `-u user:password` given in the `dev1.rb` example file.

## Licensing Options
[![License](https://poser.pugx.org/lin3s/wordpress-standard/license.svg)](https://github.com/LIN3S/WordpressStandard/blob/master/LICENSE)

[1]: https://wordpress.org/
[2]: http://lin3s.com
[3]: https://getcomposer.org/
[4]: http://php.net/manual/en/language.namespaces.php
[5]: http://capistranorb.com/
[6]: https://github.com/LIN3S/WPFoundation
[7]: https://github.com/LIN3S/CS
[15]: http://php.net
[16]: http://dev.mysql.com/downloads/
[17]: https://www.ruby-lang.org/en/downloads/
[20]: http://httpd.apache.org/
