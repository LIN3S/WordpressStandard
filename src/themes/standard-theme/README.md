#StandardTheme - Wordpress theme skeleton
 
StandardTheme is a Wordpress theme skeleton created to standardize the process of creating a custom template. Bellow some 
 guidelines have been written in order to keep the code clean and maintainable.
  
##Installation

To handle assets gulp is used and some gulp plugins need to be installed, run the following:

    npm install
    
To get theme dependencies Bower is required, run the following:

    bower install

##Overriding Wordpress behaviour

Usually the features Wordpress has by default are not enough so new PostTypes, Walkers, Shortcodes, ImageSizes...
have to be created. In case you need those changes to the codebase you should go to the `core` folder. There, you will 
find some examples on how to extend many different Wordpress features. In case there is no class for what you need, just
create a new class or a new folder (if there are multiple classes related to that feature as in post types) with your 
code.

##Stylesheets

NvlTheme uses Compass together with Foundation to generate the `app.css` that will be used in the frontend. It is
recommended to generate a new `.scss` file for each `.php` file. `header.php` for example will have its `header.scss`.
 
To keep consistent while creating stylesheets, mobile first strategy should be used and media queries should be placed 
at the bottom of each file.

`app.scss` will be used as the root file and all the `.scss` files should be imported there. If some generic styles can
be extracted, those will be located bellow other files `@import`. 

##Javascripts

The same strategy as in stylesheets is used here. One javascript file for each file. All `.js` should be enqueued and 
registered in `NvlScripts` class.