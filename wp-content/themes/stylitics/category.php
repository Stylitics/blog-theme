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
	<a style="width:280px; height:600px; display:block; margin-top:20px;" href="http://www.stylitics.com/?join=true" target="_blank">
	<img width="280" height="600" style="display:block;" alt="stylitics sign up" src="http://i1281.photobucket.com/albums/a512/Stylitics/blog-stylitics-banner_zpsf9255726.jpg" />
	</a>
    </div>
    	<?php get_template_part( 'loop', 'category' ); ?>

	</div>

	<div class="c160 sidebar">
        <ul class="category-list">
            <?php wp_list_categories('orderby=name&title_li&exclude=1'); ?>
        </ul>
        <?php get_sidebar('default'); ?>
	</div>
</div>

<?php get_footer(); ?>
