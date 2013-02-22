<?php

$c_slider_direct_path =  get_bloginfo('wpurl')."/wp-content/plugins/wp-featured-content-slider";

$c_slider_class = c_slider_get_dynamic_class();

?>

		<?php
		function get_image($post_data)
		{
			 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_data, $matches);
			  $first_img = $matches [1] [0];
			  return $first_img;
		}
		
		$c_slider_sort = get_option('sort'); if(empty($c_slider_sort)){$c_slider_sort = "post_date";}
		$c_slider_order = get_option('order'); if(empty($c_slider_order)){$c_slider_order = "DESC";}
		$c_slider_limit = get_option('limit'); if(empty($c_slider_limit)){$c_slider_limit = 150;}
		$c_slider_points = get_option('points'); if(empty($c_slider_points)){$c_slider_points = "...";}
		$c_slider_post_limit = get_option('limit_posts'); if(empty($c_slider_limit_posts)){$c_slider_limit_posts = "-1";}
                
		global $wpdb;
	
		global $post;
		
		$args = array( 'meta_key' => 'feat_slider', 'meta_value'=> '1', 'suppress_filters' => 0, 'post_type' => array('post', 'page'), 'orderby' => $c_slider_sort, 'order' => $c_slider_order, 'numberposts'=> $c_slider_post_limit);
		
		$myposts = get_posts( $args );
		
		foreach( $myposts as $post ) :	setup_postdata($post);
			
			$c_slider_custom = get_post_custom($post->ID);
			$c_slider_date = the_date( 'd-F', '', '', false );
			$c_slider_date = explode("-", $c_slider_date);
			$c_slider_thumb = get_image(get_the_content());
			if(empty($c_slider_thumb))
			{
				$c_slider_thumb = c_slider_get_thumb("feat_slider");
			}
			
		?>
	

		<li class="post">
			<?php
				$x = kdMultipleFeaturedImages::get_featured_image_id('featured-image-2', 'post', $post->ID);
				if($x) {
    				kd_mfi_the_featured_image( 'featured-image-2', 'post' );
				} else {
					echo get_the_post_thumbnail($post->ID, 'big-slider-top', array('class'=>'post-img'));
				}
			?>
            <div class="post-content">
                <div class="time">
                    <span class="month"><?php the_time('F'); ?></span> <br/>
                    <span class="day"><?php the_time('j'); ?><sup>th</sup></span>
                </div>
                <h2 class="title">
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                </h2>
                <p class="excerpt">
                	<?php
						$excerpt = get_the_excerpt();
						echo string_limit_words($excerpt,22);
					?> ...
                </p>
                <a class="button read-more" href="<?php the_permalink();?>">Read More</a>
            </div>
        </li>
		
		<?php endforeach; ?>
	
</div>