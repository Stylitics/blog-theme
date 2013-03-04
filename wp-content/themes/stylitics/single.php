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
                <a class="comment-bubble" href="<?php the_permalink(); ?>#comments"> <?php comments_number( '0', '1', "%" ); ?></a>
            </div>
            <div class="content">
               <?php the_content(); ?>
            </div>
            <ul class="social-buttons clearfix">
                <li><a style="margin-right: 5px;" data-pin-config="beside" href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a></li>
                <li><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink();?>&amp;send=false&amp;layout=button_count&amp;width=200&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=209742945804238" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 85px; height:21px;" allowTransparency="true"></iframe></li>
                <li>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-via="stylitics">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </li>
            </ul>
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
    <div class="sidebar">
        <?php get_sidebar('default'); ?>
    </div>
</div>

</div>
<!--end Main-->

<?php get_footer(); ?>