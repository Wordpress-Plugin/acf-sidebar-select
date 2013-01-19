# Select Sidebar

Addon for Advanced Custom Fields to add a select box for all sidebar. Useful if you want user defined sidebars on a per page basis.

## Dependencies

1. [Advanced Custom Fields](http://wordpress.org/extend/plugins/advanced-custom-fields/) must be installed.

## Installation

* Find the location of your theme folder
* Make a directory for the addon inside your theme files called `library/php/acf-addons/`
* Copy the contents of this repo into the directory

```
cd `~/sites/wp-content/themes/twentytwelve/` 
mkdir -p library/php/acf-addons
mv ~/Downloads/acf-sidebar-select library/php/acf-addons/
```

* Edit `functions.php` to include the ACF addon

```
if(function_exists("register_field")) {
  register_field('acf_sidebar_select', dirname(__FILE__) . '/library/php/acf-addons/acf-sidebar-select/main.php');
}
```
