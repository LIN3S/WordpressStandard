#StandardTheme - Wordpress theme skeleton
 
StandardTheme is a Wordpress theme skeleton created to standardize the process of creating a custom template. Bellow some 
 guidelines have been written in order to keep the code clean and maintainable.
  
##Installation

To handle assets gulp is used and some gulp plugins need to be installed, run the following:

    npm install
    
To get theme dependencies Bower is required, run the following:

    bower install

Replace all namespaces to match current clients name.

To generate all required assets gulp is used. Run the following:

    gulp
    
You can also watch the changes:
    
    gulp watch

##Overriding Wordpress behaviour

Usually the features Wordpress has by default are not enough so new PostTypes, Walkers, Shortcodes, ImageSizes...
have to be created. In case you need those changes to the codebase you should go to the `core` folder. There, you will 
find some examples on how to extend many different Wordpress features. In case there is no class for what you need, just
create a new class or a new folder (if there are multiple classes related to that feature as in post types) with your 
code.

##Stylesheets

Please mantain it simple and clean. Example folder structure has been created, follow it. Use mobile first approach 
and don't use magic numbers. SCSS-Lint is used so please check your styles pass those tests.
