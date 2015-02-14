<?php

add_theme_support( 'automatic-feed-links' );

function breadcrumb() {
         if ( !is_front_page() ) {
		echo '<p><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a> &raquo; ";
		}

		if ( is_category() || is_single() ) {
			$category = get_the_category();
			$ID = $category[0]->cat_ID;
			echo get_category_parents($ID, TRUE, ' &raquo; ', FALSE );
		}

		if(is_single() || is_page()) {the_title();}
		if(is_tag()){ echo "Tag: ".single_tag_title('',FALSE); }
		if(is_404()){ echo "404 - Page not Found"; }
		if(is_search()){ echo "Search"; }
		if(is_year()){ echo get_the_time('Y'); }

		echo "</p>";

          }

register_sidebar(array('name'=>'sidebar','id'=>'sidebar'));
register_sidebar(array('name'=>'footer-1','id'=>'footer-1'));
register_sidebar(array('name'=>'footer-2','id'=>'footer-2'));
register_sidebar(array('name'=>'footer-3','id'=>'footer-3'));

register_nav_menu( 'primary', 'Primary Menu' );
register_nav_menu( 'mobile', 'Mobile Menu' );

add_theme_support( 'post-thumbnails' );

// Replaces the excerpt "more" text by a link
function new_excerpt_more() {
       global $post;
	return '<a class="more button" href="'. get_permalink($post->ID) . '">READ MORE</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function my_acf_options_page_settings( $settings )
{
	$settings['title'] = 'Theme Options';
    $settings['pages'] = array('Theme', 'Footer');
 
	return $settings;
}
 
add_filter('acf/options_page/settings', 'my_acf_options_page_settings');

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

?>