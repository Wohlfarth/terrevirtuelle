=== WP Photo Album ===
Version: 1.5
Plugin URI: http://me.mywebsight.ws/web/wppa
Author: Rubin J. Kaplan 
Author URI: http://me.mywebsight.ws
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=just%2ebe%2ehappy%40gmail%2ecom&item_name=WP%20Photo%20Album%20Donation
Tags: photo, album, gallery
Requires at least: 2.1
Tested up to: 2.6.2

This plugin is designed to easily manage and display your photo albums within your WordPress site. 


== Description ==
This plugin is designed to easily manage and display your photo albums within your WordPress site. 
 
Plugin Admin Features:
You can find the plugin admin section under Manage then submenu Photos.

* Manage and create albums
* Move photos to and from albums
* Upload and delete photos
* Adjust thumbnail and full view picture sizes (set default max sizes for each).




== Installation ==
1. Unzip and upload the wppa plugin folder to wp-content/plugins/
2. Make sure that the folder wp-content/uploads/ exists and is writable by the server (CHMOD 755)
3. Activate the plugin in WP Admin -> Plugins.
4. Create at least one album in the albums tab
5. In the uploads tab, you can now upload you photots


== Creating Photo Album Page ==
Create a page like you normally would in WordPress. In my example, we'll give it the page title of "Photo Gallery". In the Page Content 
section add the following code:

%%wppa%%

Also, make sure under 'Page Template' you are using 'Default Template' as some WordPress themes have an archives template.  
Press the publish button and you're done. You'll now have a photo gallery page. 

You can also create a custom page template by dropping the following code into a page:

<?php wppa_albums(); ?>

In order to work properly, this tag needs to be within the WordPress loop ( http://codex.wordpress.org/The_Loop ) 
For more information on creating custom page templates, visit http://codex.wordpress.org/Pages#Creating_your_own_Page_Templates



== Adjusting CSS and Template Styling ==

WP Photo Album comes with a default layout and theme. To change the style and layout of the photo album, copy 
them/edit wppa_theme.php and theme/wppa_style.css to your active theme's folder, and edit them. 
WPPA uses a system of tags similar to the WordPress theme system. To view a list of available tags, please read tags.txt



== Plugin Support And Feature Request ==
If you've read over this readme carefully and are still having issues, if you've discovered a bug, or have a feature request, please 
contact me via my contact page.


== About and Credits ==
WP Photo Album was created by R.J. Kaplan of http://me.mywebsight.ws
A special thanks to my friend Sean ( http://www.idunzo.com ) for beta testing, SEO features and writing the readme file. 
If you need any custom WordPress theme or plugin work, please consider W3Lift ( http://www.w3lift.com )
A special thanks to Mark for fixing the plugin to work with 2.5.x

== Licence ==
WP Photo Album is released under the GNU GPL licence. ( http://www.gnu.org/copyleft/gpl.html )