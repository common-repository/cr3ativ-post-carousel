<?php 

// Register and load the widget
function cr3postcarousel_load_widget() {
    register_widget( 'cr3postcarousel_widget' );
}
add_action( 'widgets_init', 'cr3postcarousel_load_widget' );
 
// Creating the widget 
class cr3postcarousel_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'cr3postcarousel_widget', 
 
// Widget name will appear in UI
__('Recent Post Carousel Loop', 'cr3at_career'), 
 
// Widget description
array( 'description' => __( 'Show your recents posts in a carousel in any widget ready area.', 'cr3at_career' ), ) 
);
}

	// widget form creation
	function form($instance) { 
// Check values
 if( $instance) { 
     $title = esc_attr($instance['title']);
     $showposts = esc_attr($instance['showposts']);
     $numbertodisplay = esc_attr($instance['numbertodisplay']); 
     $sortby = esc_attr($instance['sortby']); 
     $recentposts_carousel_category = esc_attr($instance['recentposts_carousel_category']);
     $thumbnail = esc_attr($instance['thumbnail']);
     $readmore = esc_attr($instance['readmore']);
     $showauthor = esc_attr($instance['showauthor']);
     $showauthoravatar = esc_attr($instance['showauthoravatar']);
     $showcategories = esc_attr($instance['showcategories']);
     $showpubdate = esc_attr($instance['showpubdate']);
} else { 
     $title = ''; 
     $showposts = ''; 
     $numbertodisplay = ''; 
     $sortby = '';
     $recentposts_carousel_category = '';
     $thumbnail = '';
     $readmore = '';
     $showauthor = '';
     $showauthoravatar = '';
     $showcategories = '';
     $showpubdate = '';
} 
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" style="float:right; width:56%;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('numbertodisplay'); ?>"><?php _e('# of Columns', 'cr3atrecentposts'); ?></label>
<select id="<?php echo $this->get_field_id('numbertodisplay'); ?>" name="<?php echo $this->get_field_name('numbertodisplay'); ?>"  style="float:right; width:56%;">
    <option selected="selected" value="none"><?php _e( 'Select One', 'cr3atrecentposts' ); ?></option>
    <option <?php if ( $numbertodisplay == '1' ) { echo ' selected="selected"'; } ?> value="1"><?php _e('One Column', 'cr3atrecentposts'); ?></option>
    <option <?php if ( $numbertodisplay == '2' ) { echo ' selected="selected"'; } ?> value="2"><?php _e('Two Column', 'cr3atrecentposts'); ?></option>
    <option <?php if ( $numbertodisplay == '3' ) { echo ' selected="selected"'; } ?> value="3"><?php _e('Three Column', 'cr3atrecentposts'); ?></option>
    <option <?php if ( $numbertodisplay == '4' ) { echo ' selected="selected"'; } ?> value="4"><?php _e('Four Column', 'cr3atrecentposts'); ?></option>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id('sortby'); ?>"><?php _e('Sort by ASC?', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('sortby'); ?>" name="<?php echo $this->get_field_name('sortby'); ?>" type="checkbox" value="1" <?php checked( '1', $sortby ); ?> style="float:right; margin-right:6px;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('showposts'); ?>"><?php _e('# of Posts', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('showposts'); ?>" name="<?php echo $this->get_field_name('showposts'); ?>" type="text" value="<?php echo $showposts; ?>" style="float:right; width:56%;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('recentposts_carousel_category'); ?>"><?php _e('Carousel category', 'cr3atrecentposts'); ?></label>
<select id="<?php echo $this->get_field_id('recentposts_carousel_category'); ?>" name="<?php echo $this->get_field_name('recentposts_carousel_category'); ?>"  style="float:right; width:56%;" >
    <option selected="selected" value="none"><?php _e( 'Select One', 'cr3atrecentposts' ); ?></option>
    <option <?php if ( $recentposts_carousel_category == 'all' ) { echo ' selected="selected"'; } ?> value="all"><?php _e( 'All', 'cr3atrecentposts' ); ?></option>
    <?php $categories = get_categories(); ?> 
    <?php foreach ( $categories as $category ) { ?>
    <option<?php if ( $recentposts_carousel_category == $category->cat_name ) { echo ' selected="selected"'; } ?> value="<?php echo $category->cat_name; ?>"><?php echo $category->cat_name; ?></option>
    <?php } ?>
</select>
</p>
<p>
<label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Show thumbnail?', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" value="1" <?php checked( '1', $thumbnail ); ?> style="float:right; margin-right:6px;" />
</p>

<p>
<label for="<?php echo $this->get_field_id('readmore'); ?>"><?php _e('Show read more link?', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('readmore'); ?>" name="<?php echo $this->get_field_name('readmore'); ?>" type="checkbox" value="1" <?php checked( '1', $readmore ); ?> style="float:right; margin-right:6px;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('showauthor'); ?>"><?php _e('Show author name?', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('showauthor'); ?>" name="<?php echo $this->get_field_name('showauthor'); ?>" type="checkbox" value="1" <?php checked( '1', $showauthor ); ?> style="float:right; margin-right:6px;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('showauthoravatar'); ?>"><?php _e('Show author avatar?', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('showauthoravatar'); ?>" name="<?php echo $this->get_field_name('showauthoravatar'); ?>" type="checkbox" value="1" <?php checked( '1', $showauthoravatar ); ?> style="float:right; margin-right:6px;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('showcategories'); ?>"><?php _e('Show categories?', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('showcategories'); ?>" name="<?php echo $this->get_field_name('showcategories'); ?>" type="checkbox" value="1" <?php checked( '1', $showcategories ); ?> style="float:right; margin-right:6px;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('showpubdate'); ?>"><?php _e('Show published date?', 'cr3atrecentposts'); ?></label>
<input id="<?php echo $this->get_field_id('showpubdate'); ?>" name="<?php echo $this->get_field_name('showpubdate'); ?>" type="checkbox" value="1" <?php checked( '1', $showpubdate ); ?> style="float:right; margin-right:6px;" />
</p>
            
<?php }
	// widget update
	function update($new_instance, $old_instance) {
      $instance = array();
      // Fields
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['showposts'] = ( ! empty( $new_instance['showposts'] ) ) ? strip_tags( $new_instance['showposts'] ) : '';
        $instance['numbertodisplay'] = ( ! empty( $new_instance['numbertodisplay'] ) ) ? strip_tags( $new_instance['numbertodisplay'] ) : '';
        $instance['sortby'] = ( ! empty( $new_instance['sortby'] ) ) ? strip_tags( $new_instance['sortby'] ) : '';
        $instance['recentposts_carousel_category'] = ( ! empty( $new_instance['recentposts_carousel_category'] ) ) ? strip_tags( $new_instance['recentposts_carousel_category'] ) : '';
        $instance['thumbnail'] = ( ! empty( $new_instance['thumbnail'] ) ) ? strip_tags( $new_instance['thumbnail'] ) : '';
        $instance['readmore'] = ( ! empty( $new_instance['readmore'] ) ) ? strip_tags( $new_instance['readmore'] ) : '';
        $instance['showauthor'] = ( ! empty( $new_instance['showauthor'] ) ) ? strip_tags( $new_instance['showauthor'] ) : '';
        $instance['showauthoravatar'] = ( ! empty( $new_instance['showauthoravatar'] ) ) ? strip_tags( $new_instance['showauthoravatar'] ) : '';
        $instance['showcategories'] = ( ! empty( $new_instance['showcategories'] ) ) ? strip_tags( $new_instance['showcategories'] ) : '';
        $instance['showpubdate'] = ( ! empty( $new_instance['showpubdate'] ) ) ? strip_tags( $new_instance['showpubdate'] ) : '';
      return $instance;
}

	// widget display
	function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = apply_filters('widget_title', $instance['title']);
   $showposts = $instance['showposts'];
   $numbertodisplay = $instance['numbertodisplay'];
   $recentposts_carousel_category = $instance['recentposts_carousel_category'];
   $thumbnail = $instance['thumbnail'];
   $sortby = $instance['sortby'];
   $readmore = $instance['readmore']; 
   $showauthor = $instance['showauthor']; 
   $showauthoravatar = $instance['showauthoravatar']; 
   $showcategories = $instance['showcategories']; 
   $showpubdate = $instance['showpubdate']; 
        
   echo $before_widget;
   if( $sortby == '1' ) {
   $sortby = 'ASC';
   } else {
   $sortby = 'DESC';
   }
   if( $recentposts_carousel_category != ('all') ) {      
		global $post;  
		$carousel = array(
		'post_type' => 'post',
		'order' => $sortby,
        'showposts' => $showposts,
        'category_name' => $recentposts_carousel_category
		); 
   } else {
       global $post;  
		$carousel = array(
		'post_type' => 'post',
		'order' => $sortby,
        'showposts' => $showposts
        );
   }
   
   // Check if title is set
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }	
   
   // Display the widget
?> 
<?php if( $numbertodisplay == '1' ) { ?>
<div class="1-column">
<?php } elseif ( $numbertodisplay == '2' ) { ?>
<div class="2-column">    
<?php } elseif ( $numbertodisplay == '3' ) { ?>    
<div class="3-column">       
<?php } else { ?>    
<div class="4-column">   
<?php } ?>   

    <?php query_posts($carousel); if (have_posts()) : while (have_posts()) : the_post(); 
    
    ?>
        
<div class="cr3_recentposts_wrap">
    
    <?php if( $thumbnail == '1' ) { 
    
        if ( has_post_thumbnail() ) {  ?>

            <div class="cr3_recentposts_thumb">
                <a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('full');?></a>
            </div>    
    
    <?php } } ?> 
    
    <div class="cr3_recentposts_meta_wrap">
    
        <?php if( $showcategories == '1' ) { ?>

            <div class="cr3_recentposts_categories">
                <?php the_category('&nbsp; / &nbsp;'); ?>
            </div>

        <?php } ?>

        <h2 class="recentposts_carousel">
            <a href="<?php the_permalink (); ?>"><?php the_title (); ?></a>
        </h2>

        <p><?php echo wp_trim_words( get_the_content(), 10, '...' ); ?></p>

        <?php if( $readmore == '1' ) { ?>

        <div class="cr3_recentposts_readmore">
            <a href="<?php the_permalink (); ?>"><?php _e( 'Read More', 'cr3atrecentposts' ); ?></a>
        </div>

        <?php } ?>

        <?php if( $showauthor == '1' ) { ?>    

            <?php if( $showauthoravatar == '1' ) { ?>

            <div class="cr3_recentposts_authoravatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
            </div>


            <?php } ?>

        <div class="cr3_recentposts_author">
            <?php the_author_posts_link(); ?>
        </div>

            <?php if( $showpubdate == '1' ) { ?>

              <div class="cr3_recentposts_sep"> / </div>

            <?php } ?>

        <?php } ?>

        <?php if( $showpubdate == '1' ) { ?>

        <div class="cr3_recentposts_pubdate">
            <?php echo get_the_date(get_option('date_format')); ?>
        </div>

        <?php } ?>
        
        <div class="clearposts"></div>
        
    </div>
    
</div>

<?php endwhile; ?>
    
<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'cr3atrecentposts' ); ?></p> 

<?php endif; ?><?php wp_reset_query(); ?>
    
</div>
  
<?php     
   
   echo $after_widget;
}
}


?>