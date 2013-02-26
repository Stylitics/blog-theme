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
    <div class="c550 cmiddle">
    	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    	<?php
    		$post_date = the_date( 'd-F', '', '', false );
			$post_date = explode("-", $post_date);
    	?>
        
        <div class="post-full">
            <div class="header">
                <div class="time">
                    <span class="month"><?php echo $post_date[1]; ?></span> <br/>
                    <span class="day"><?php echo $post_date[0]; ?><sup><?php the_time('S'); ?></sup></span>
                </div>
                <h1 class="title"><a href="<?php the_permalink(); ?><"><?php the_title(); ?></a></h1>
                <a class="comment-bubble" href="<?php the_permalink(); ?>#disqus-thread"> <?php comments_number( '0', '1', "%" ); ?></a>
            </div>
            <div class="content">
               <?php the_content(); ?>
            </div>
    <!--   <ul class="social-share clearfix">
                <li class="facebook">
                    <div class="icon"></div>
                    <span class="counter">232</span>
                </li>
                <li class="twitter">
                    <div class="icon"></div>
                    Share
                </li>
                <li class="pinterest">
                    <div class="icon"></div>
                    Pin it
                </li>
                <li class="star">
                    <div class="icon"></div>
                    Star this
                </li>
                <li class="comments">
                    <div class="icon"></div>
                    <em>2</em> Comments
                </li>
            </ul> -->
            <div class="tags">
				<?php
					$tags_list = get_the_tag_list( '' );
					if ( $tags_list ):
				?>
					<?php printf( __( 'Tags: %2$s', 'ari' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				<?php endif; ?>                
            </div>
            <div class="more-articles">
                <span class="desc">You might also like:</span>
                <ul class="article-list clearfix">
                	 <?php do_action(
					    'related_posts_by_category',
					    array(
					      'orderby' => 'post_date',
					      'order' => 'DESC',
					      'limit' => 4,
					      'echo' => true,
					      'before' => '<li>',
					      'inside' => '',
					      'outside' => '',
					      'after' => '</li>',
					      'rel' => 'nofollow',
					      'type' => 'post',
					      'image' => array(50, 50),
					      'hidden' => 'image',
					      'message' => ''
					    )
					  ) ?>
                  <!--   <li><a href="#">3 Perfect Weekend Looks</a></li>
                    <li><a href="#">3 Trends That are on Their Way Out</a></li>
                    <li><a href="#">1 trend 3 ways: Plaid and Pearls</a></li>
                    <li><a href="#">The Top 5 Most Popular Handbags</a></li> -->
                </ul>
            </div>
        </div>
        <?php comments_template( '', true ); ?>
        <?php endwhile; // end of the loop. ?>
    </div>
</div>
<div class="c160 sidebar">
    <ul class="category-list">
        <?php
        $catsy = get_the_category();
        $myCat = $catsy[0]->cat_ID;
        wp_list_categories('orderby=name&title_li=&current_category='.$myCat);
        ?>
    </ul>
</div>









<?php /*
<div id="main">
	<div id="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>
			<div class="clear"></div>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'ari' ), 'after' => '</div>' ) ); ?>
						
		<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="author-info" class="clearfix">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'ari_author_bio_avatar_size', 50 ) ); ?>
						</div>
						<div id="author-description">
							<h2><?php printf( __( 'About <span>%s</span>', 'ari' ), get_the_author() ); ?></h2>
							<p><?php the_author_meta( 'description' ); ?></p>
						</div>
					</div><!-- end Author Info -->
		<?php endif; ?>
						
		<p class="meta"><span><?php the_time('d. F Y') ?> <?php _e( 'by', 'ari' ); ?> <?php the_author() ?></span><br/>				

				<?php if ( count( get_the_category() ) ) : ?>
					<?php printf( __( 'Categories: %2$s', 'ari' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					|
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<?php printf( __( 'Tags: %2$s', 'ari' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					|
				<?php endif; ?>
				<?php comments_popup_link( __( 'Leave a comment', 'ari' ), __( '1 comment', 'ari' ), __( '% comments', 'ari' ) ); ?>
				<?php edit_post_link( __( 'Edit &rarr;', 'ari' ), '| ', '' ); ?></p>


				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

	</div>
	<!--end Post-->
	
		<p class="previous"><?php previous_post_link( '%link',  __( '&larr;  Previous Post', 'Previous post link', 'ari' ) ); ?></p>
		<p class="next"><?php next_post_link( '%link', __( 'Next Post &rarr;', 'Next post link', 'ari' ) ); ?></p>
	
	</div>
	<!--end Content-->
*/
	?>

<?php get_sidebar('secondary'); ?>

</div>
<!--end Main-->

<?php get_footer(); ?>