Wordpress Theme Skeleton
=========================

Why?
----
This theme skeleton is created to standardize the process of creating a custom template.
Below, some guidelines have been written in order to keep the code clean and maintainable.
  
Getting Started
---------------
This is a Wordpress theme so, to run requires *[PHP][1]*, *[Composer][2]* and *[MySQL][3]*, and also
needs the *[Node.js][4]* environment and *[Ruby][5]*'s gems.

To generate simple, clean and maintainable SASS code you should use the *[scss-lint][6]* so you have to install
with the following command:
```
$ gem install scss-lint
```
> Sass example folder structure has been created, follow it. Use mobile first approach and don't use magic numbers.

To handle assets *[Gulp][7]* is used and some gulp plugins need to be installed, run the following:
```
$ npm install
```
Front-end dependencies are managed with *[Bower][8]*:
```
$ bower install
```
After install all the requirements, **replace all namespaces** to match current clients name.
> Remember that the `ClientNameTheme.php` file name and the `src/themes/ClientName` directory name, also, should be changed.
> Also, **CAUTION!**: you **MUST** updated `!ClientName` of `.gitignore` file

To generate all required assets *[Gulp][7]* is used. Run the following:
```
$ gulp
```
Also, you can also watch the changes:
```
$ gulp watch
```
Overriding Wordpress behaviour
------------------------------
Usually the features Wordpress has by default are not enough so new PostTypes, Walkers, ShortCodes, ImageSizes...
have to be created. In case you need those changes to the codebase you should go to the `core` folder. There, you will 
find some examples on how to extend many different Wordpress features. In case there is no class for what you need, just
create a new class or a new folder (if there are multiple classes related to that feature as in post types) with your 
code.

[1]: http://php.net
[2]: http://getcomposer.org/download
[3]: http://dev.mysql.com/downloads/
[4]: https://nodejs.org/
[5]: https://www.ruby-lang.org
[6]: https://github.com/brigade/scss-lint
[7]: http://gulpjs.com/
[8]: http://bower.io/
