=== Fancyboxify ===
Contributors: omerk
Tags: fancybox, lightbox, photo, gallery, jquery, javascript
Requires at least: 2.6
Tested up to: 3.1
Stable tag: 1.1

This simple plugin enables Fancybox on image links. It groups all images within a single post 
and can also be disabled per post.

== Description ==
[Fancybox](http://fancybox.net/) is a tool for displaying images, html content and multi-media
in a Mac-style "lightbox" that floats overtop of web page. It was built using the jQuery library.

This plugin inserts the necessary elements required to run Fancybox on your blog. It also groups
images within posts using rel attributes. (Based on the code found on [this](http://wordpress.org/support/topic/automatic-adding-lightbox-rel-and-group-to-images-in-posts)
forum thread)

To disable Fancybox per post: Add a custom field called 'nofancybox' and set it's value to 'true'.
Instructions on how to add custom fields to posts can be found at [this](http://codex.wordpress.org/Custom_Fields)
codex article.

== Installation ==
1. Upload 'fancyboxify' directory to your '/wp-content/plugins/'
2. Activate the plugin through the 'Plugins' menu

== Frequently Asked Questions ==
= How do I disable Fancybox on a particular post? =
If you'd like to disable Fancybox on a single post just add a custom field called 'nofancybox'
and set it's value to 'true'. Instructions on how to add custom fields to posts can be found
at [this](http://codex.wordpress.org/Custom_Fields) codex article.

= Yet another lightbox plugin, really? =
Yes, I wanted a simple solution based on Fancybox and at the time of writing none of
the available plugins in the repository fit the bill, so I created this. 

== Screenshots ==

1. Fancybox in action.

== Changelog ==

= 1.1 =
* Released: 24/03/2011
* Added the option to disable Fancybox on a single post (Add 'nofancybox' as a custom field 
and set it's value to 'true')

= 1.0 =
* Released: 22/03/2011
* First release, includes Fancybox 1.3.4
