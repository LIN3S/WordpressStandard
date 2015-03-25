Standard wordpress distribution
===============================

Installation
------------

To get the standard distribution in your local environment just run the following

    git clone git@gitlab.novisline.es:lin3s/standard-wordpress.git project-name
    cd project-name
    
Remove ´.git´ folder and create a new git repo for the project

    rm -Rf .git
    git init
    
Run composer to get all the dependencies

    composer install
    
Check for references to `project-name` across the files and replace them with your project-name

Copy `wp-config-custom-sample.php` to `wp-config-custom.php` and add database connection details

To start using the template read its `README.md` located in `src\themes\project-name`

> To use capistrano check all gems have been installed
