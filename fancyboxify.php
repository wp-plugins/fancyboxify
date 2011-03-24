<?php
/*
Plugin Name: Fancyboxify
Plugin URI: http://wordpress.org/extend/plugins/fancyboxify/
Description: Enables <a href="http://fancybox.net/">Fancybox</a> on all image links, also groups images within posts. Can be disabled per post (Instructions at plugin homepage).
Version: 1.1
Author: Omer Kilic
Author URI: http://omer.me/2011/03/fancyboxify
*/

if ( !is_admin() ) { // Do not execute in admin related pages

	// Load JS files
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery.fancybox', get_option('siteurl').'/wp-content/plugins/fancyboxify/fancybox/jquery.fancybox.pack.js', array('jquery'), '1.3.4');
	wp_enqueue_script('jquery.easing', get_option('siteurl').'/wp-content/plugins/fancyboxify/fancybox/jquery.easing.pack.js', array('jquery'), '1.3');
	wp_enqueue_script('jquery.mousewheel', get_option('siteurl').'/wp-content/plugins/fancyboxify/fancybox/jquery.mousewheel.pack.js', array('jquery'), '3.0.4');

	// Load stylesheet
	wp_enqueue_style('fancybox', get_option('siteurl').'/wp-content/plugins/fancyboxify/fancybox/fancybox.css', false, '1.3.4');

	// Add Fancybox voodoo to <head> of the document
	add_action('wp_head', 'fancybox_script');

	// Add filters to 'gallerify' image links
	add_filter('the_excerpt', 'fancybox_rel');
	add_filter('the_content', 'fancybox_rel');
	add_filter('get_comment_text', 'fancybox_rel');

}


function fancybox_script()
{

echo <<<FANCY
<script type="text/javascript">
	jQuery(document).ready(function($){
		var imglinks = $('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".gif"], a[href$=".JPG"], a[href$=".JPEG"], a[href$=".PNG"], a[href$=".GIF"]');

		imglinks.each(function(){ 
			if ( $(this).attr('rel').indexOf("fancybox") != -1 ) {
				$(this).fancybox({
					'transitionIn'	:	'none',
					'transitionOut'	:	'none',
					'titlePosition'	:	'over',
					'titleFormat'	:	function(title, currentArray, currentIndex, currentOpts){
									return '<span id="fancybox-title-over">(' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ')&nbsp;&nbsp;' + title : ')') + '</span>';
								},
					'title'		:	$(this).find("img").first().attr("title")	// Extract title from the first <img> element within the <a>
				});
			}
		});
	});
</script>
FANCY;

}


function fancybox_rel($content)
{
	global $post;

	// Acquire the 'nofancybox' custom field
	$nofancybox = (bool) get_post_meta($post->ID, 'nofancybox', TRUE);

	// Check if we should add the 'rel' attribute or not.
	// Fancybox won't fire unless 'rel' contains 'fancybox'.
	if ( !$nofancybox ){
		// Shamelessly stolen from: http://wordpress.org/support/topic/automatic-adding-lightbox-rel-and-group-to-images-in-posts
		$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
		$replacement = '<a$1href=$2$3.$4$5 rel="fancybox-' . $post->ID . '"$6>$7</a>';
	 	$content = preg_replace($pattern, $replacement, $content);
	}

	return $content;
}

?>
