<?php
/**
 * Plugin Name: Cr3ativ RecentPosts Plugin
 * Plugin URI: https://wordpress.org/plugins/cr3ativ-post-carousel/
 * Description: Custom written plugin to have your posts in a carousel based on categories from WordPress.
 * Author: Cr3ativ
 * Author URI: http://cr3ativ.com/
 * Version: 1.4.0
 */

/* Place custom code below this line. */

/* Variables */
$ja_cr3ativ_recentposts_main_file = dirname(__FILE__).'/cr3ativ-recentposts.php';
$ja_cr3ativ_recentposts_directory = plugin_dir_url($ja_cr3ativ_recentposts_main_file);
$ja_creativ_recentposts_path = dirname(__FILE__);

/* Add css and scripts file */
function creativ_recentposts_add_scripts() {
	global $ja_cr3ativ_recentposts_directory, $ja_creativ_recentposts_path;
		wp_enqueue_style('creativ_recentposts_styles', $ja_cr3ativ_recentposts_directory.'css/owl.carousel.css');
		wp_enqueue_script('jquery');
		wp_register_script('creativ_recentposts_js', $ja_cr3ativ_recentposts_directory.'js/owl.carousel.js', 'jquery');
		wp_register_script('creativ_recentposts_script_js', $ja_cr3ativ_recentposts_directory.'js/owl.script.js', 'jquery');
		wp_enqueue_script('creativ_recentposts_js');
        wp_enqueue_script('creativ_recentposts_script_js');
}
		
add_action('wp_enqueue_scripts', 'creativ_recentposts_add_scripts');

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////         Limit Excerpt Length         ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Text Domain     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
load_plugin_textdomain ('cr3atrecentposts');



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Word Limit      /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function cr3recentcarousel_string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////       Shortcode Loop      ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

// Taxonomy category shortcode
function recentposts_cat_func($atts, $content) {
    extract(shortcode_atts(array(
            'columns'    => '4',
            'showcategories' => 'yes',
            'showreadmore' => 'yes',
            'showauthor' => 'yes',
            'showauthoravatar' => 'yes',
            'showpubdate' => 'yes',
            'number'    => '4',
            'image'    => 'yes',
            'order' => 'DESC',
            'category'      => ''
            ), $atts));

    global $post;

    if( $category != ('') ) {      
		$args = array(
		'post_type' => 'post',
        'showposts' => $number,
        'category_name' => $category, 
        'order' => $order
		); 
   } else {
		$args = array(
		'post_type' => 'post',
        'showposts' => $number,
        'order' => $order
		);
   }
   
    query_posts($args);
    
    $output = '';
    $temp_title = '';
    $temp_link = '';
    $temp_excerpt = '';
    $tempshowcategories = '';
    $tempshowauthoravatar = '';
    $tempshowauthor = '';
    $tempshowpubdate = '';
    $tempreadmoretext = '';
    
    if( $columns == '1' ) {
        $output = '<div class="1-column">';
    ;} elseif ( $columns == '2' ) {
        $output = '<div class="2-column">';  
    ;} elseif ( $columns == '3' ) {    
        $output = '<div class="3-column">';     
    ;} else {    
        $output = '<div class="4-column">';  
    }

    if (have_posts($args)) : while (have_posts()) : the_post();
    $output .= '<div class="cr3_recentposts_wrapper">';
            $temp_title = get_the_title($post->ID);
            $temp_link = get_permalink($post->ID);
            $temp_excerpt = wp_trim_words( get_the_content(), 10, '...' );
            $temp_image = get_the_post_thumbnail($post->ID, 'full');
            $tempshowcategories = get_the_category_list( __( '&nbsp; / &nbsp;', 'creatrecentposts' ) );
            $tempshowauthoravatar = get_avatar( get_the_author_meta( 'ID' ), 32 );
            $tempshowauthor = get_the_author_link();
            $tempshowpubdate = get_the_date(get_option('date_format'));
            $tempreadmoretext = __( 'Read More', 'creatrecentposts');

        if( $image == 'yes' ) {
            $output .= '<div class="cr3_recentposts_thumb"><a href="'.$temp_link.'">'.$temp_image.'</a></div>';
            }

        $output .= '<div class="cr3_recentposts_meta_wrap">';

        if( $showcategories == 'yes' ) {
            $output .= '<div class="cr3_recentposts_categories">'.$tempshowcategories.'</div>';
            }

            $output .= '<div><h2 class="recentposts_carousel"><a href="'.$temp_link.'">'.$temp_title.'</a></h2><p>'.$temp_excerpt.'</p></div>';  

        if( $showreadmore == 'yes' ) {
            $output .= '<div class="cr3_recentposts_readmore"><a href="'.$temp_link.'">'.$tempreadmoretext.'</a></div>';
            }

        if( $showauthoravatar == 'yes' ) {
            $output .= '<div class="cr3_recentposts_authoravatar">'.$tempshowauthoravatar.'</div>';
            }

        if( $showauthor == 'yes' ) {
            $output .= '<div class="cr3_recentposts_author">'.$tempshowauthor.'</div>';
            }

        if( $showpubdate == 'yes' ) {
            if( $showauthor == 'yes' ) {
                $output .= '<div class="cr3_recentposts_sep"> / </div>';
            }
            $output .= '<div class="cr3_recentposts_pubdate">'.$tempshowpubdate.'</div>';
            }
    
        $output .= '<div class="clearposts"></div>';
    
        $output .= '</div>';
    
    $output .= '</div>';
    
    endwhile;  wp_reset_query();
    
    $output .= '</div>';

    endif; 
   
   return $output;
}
add_shortcode('recentposts-carousel', 'recentposts_cat_func');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////             Carousel widget                 /////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


include_once( 'cr3ativ-recentposts-carousel-widget.php' );

?>