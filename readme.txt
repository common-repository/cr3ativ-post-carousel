=== Cr3ativ RecentPosts Carousel ===
Contributors: Cr3ativ
Tags: carousel, recent posts
Requires at least: 3.0.1
Tested up to: 4.9
Stable tag: 1.4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Cr3ativ RecentPosts Carousel plugin is taken from your posts within WordPress and displays them in a carousel based on variables you choose.


== Description ==

Easily add as many carousel items as you'd like by category.  

Using the owl script available here http://owlgraphic.com/owlcarousel/ - we have created an easy to use plugin based on the content area.

You can include these items by carousel category in a post or page using the short code:

[recentposts-carousel columns="1" category="standard" number="3" image="yes"]  

Above is an example of that short code.  We state how many columns we want to display, which category, how many posts and if we want the featured image displayed (yes/no).  If you want to pull from all categories, just leave off the category part of the short code like this:

[recentposts-carousel columns="1" number="3" image="yes"]

Here is the full list for the text based shortcode options:
 1. columns - you can have 1 - 4 columns.
 2. category - the slug name of the category you wish to show.  Leave blank if you want all categories.
 3. number - number of posts to pull.
 4. image - yes or no to show the posts featured image.
 5. order - asc or desc for the post order by publish date.
 6. showreadmore - yes or no to show the readmore link
 7. showauthor - yes or no to show the author of the post (it does not link).
 8. showauthoravatar - yes or no to show the author's avatar (it does not link).
 9. showcategories - yes or no to show the categories of the post (this does link to a category.php template).
10. showpubdate - yes or no to show the publish date of the post (it does not link).

We also provide a widget for this plugin to utilize the same as the short code with the exception of you can tell the carousel how to sort the items and the carousel category is provided by a drop down menu.

For your convenience, the plugin also contains a directory called languages, you will find the mo/po files used for this plugin here.

Here is [the demo](http://mythemepreviews.com/plugins/recentposts-plugin/ "the demo").

== Plugin Installation ==

1. Upload the `cr3ativ-recentposts-carousel` folder to your to the `/wp-content/plugins/` directory or alternatively upload the cr3ativ-recentposts-carousel.zip via the plugin page of WordPress by clicking 'Add New' and select the zip from your local computer.

2. Activate the plugin once uploaded.


3. Using either the short code or the drag and drop widget, just create your carousel where ever you want it to appear.



== Styling ==
Styling for these page templates are included in the includes directory under :

/css/owl.carousel.css
/css/animate.css



== Changelog ==

= 1.4.0 =
Updated plugin to WP 4.9+, added some new functions for the widget/shortcode to allow for more control of what to show and not show in the carousel.  Removed PHP deprecated calls and debug notices.

= 1.3.0 =
Updated cr3ativ-recentposts.php and cr3ativ-recentposts-carousel-widget.php to strip out the shortcodes when calling the_excerpt to prevent audio and video playlists from showing the titles of the media.

= 1.2.2 =
Backed out the owl 2.0 and animate.css due to js errors.

= 1.2.1 =
Updated cr3ativ-recentposts.php to correct issue with shortcode not pulling in anything from the excerpt meta box. 

= 1.2.0 =
Updated owl carousel to the new 2.0 and now includes animate.css for customization of the plugin (transitions and transition speed).

= 1.1.0 =
Updated widget section to support WP 4.3.

= 1.0.9 =
* Updated still receiving a 404 on the css file.

= 1.0.7 =
* Updated cr3ativ-recentposts.php and css stylesheet to group all stylesheets into 1 call and remove the 404 error on page load (in script).

= 1.0.6 =
* Updated to include missing images from CSS file.

= 1.0.5 =
* Updated to combine all 3 CSS files into one for quicker loading on CSS file.

= 1.0.4 =
* Updated plugin readme.txt and version # on cr3ativ-recentposts.php and updated the text based short code, one of the functions was deprecated.

= 1.0.3 =
* Updated plugin readme.txt and version # on cr3ativ-recentposts.php and added banners to /assets directory.

= 1.0.2 =
* Updated plugin so when the shortcode is used, the excerpt is wrapped in p tags to pick up the format.

= 1.0.1 =
* Updated plugin to include ability to choose ‘All’ from the widget category drop down or to leave the category selection off the short code to pull all categories and updated the language files.

= 1.0 =
* First release.



