<?php get_header(); ?>
<div class="c870 content-area post-area">
    <div class="c280 left-area left-area-title">
        <div class="title">
        </div>
        <ul class="trending-list">
			<?php
			global $post;
			$category = get_the_category($post->ID);
			$category = $category[0]->cat_ID;
			$myposts = get_posts(array('numberposts' => 5, 'offset' => 0, 'category__in' => array($category), 'post__not_in' => array($post->ID),'post_status'=>'publish'));
			foreach($myposts as $post) :
			setup_postdata($post);
			?>
			<li>
			<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?></a>
			</li>
			<?php endforeach; ?>
			<?php wp_reset_query(); ?>
        </ul>
        <span class="meta">
            <span><a href ="<?php echo home_url( '/?p=archive' ); ?>">Older Posts</a></span>
        </span>
    </div>
    	<?php get_template_part( 'loop', 'category' ); ?>
	         
	</div>

	<div class="c160 sidebar">
        <ul class="category-list">
            <?php wp_list_categories('orderby=name&title_li&exclude=1'); ?>
        </ul>
	</div>
</div>


<div id="main">
	<div id="content">
	<!-- <h1 class="archive"><?php printf( __( 'Category Archives for <strong>%s</strong>', 'ari' ), '' . single_cat_title( '', false ) . '' ); ?></h1> -->
	
		<?php
			$category_description = category_description();
			if ( ! empty( $category_description ) )
				echo '' . $category_description . '';
			// get_template_part( 'loop', 'category' );
		?>
			
	</div>
	<!--end Content-->

<?php get_sidebar('secondary'); ?>

</div>
<!--end Main-->

<?php get_footer(); ?>