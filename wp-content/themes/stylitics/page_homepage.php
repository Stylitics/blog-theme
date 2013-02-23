<?php get_header(); ?>
<?php
/*
Template Name: homepage
*/
?>
        <div class="wrap content clearfix">
            <div class="top-slider">
                <div class="viewport flexslider flexslider-top">
                	
                    <ul class="post-list slides">
                    	<?php include (ABSPATH . '/wp-content/plugins/wp-featured-content-slider/content-slider.php'); ?>
                    </ul>
                </div>
                <ul class="category-list">
                    <?php wp_list_categories('orderby=name&title_li'); ?>
                </ul>
            </div>	
        </div>

        <div class="wrap clearfix">
            <div class="c675">
                <div class="bottom-slider content-area">
                    <span class="title">Today in fashion history</span>
                    <div class="viewport flexslider flexslider-bottom">
                        <ul class="slides">
                             <?php
                            global $post;
                            $args = array( 'numberposts' => 5, 'offset'=> 0, 'category' => 994 );
                            $myposts = get_posts( $args );
                            foreach( $myposts as $post ) :  setup_postdata($post); ?>
                                <li class="post">
                                    <?php
                                        $x = kdMultipleFeaturedImages::get_featured_image_id('featured-image-4', 'post', $post->ID);
                                        if($x) {
                                            kd_mfi_the_featured_image( 'featured-image-4', 'post' );
                                        } else {
                                            echo get_the_post_thumbnail($post->ID, 'fashion-history-slider', array('class'=>'post-img'));
                                        }
                                    ?>
                                    <div class="time">
                                        <span class="month"><?php the_time('F'); ?></span> <br/>
                                        <span class="day"><?php the_time('j'); ?><sup>th</sup></span>
                                    </div>
                                    <div class="container">
                                        <p class="excerpt">
                                            <?php
                                                $excerpt = get_the_excerpt();
                                                echo string_limit_words($excerpt,22);
                                            ?> ...
                                            <a class="button read-more" href="<?php the_permalink(); ?>">Read More</a>
                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div> 
                </div>
                <div class="recent-posts content-area">
                    <div class="title">Recent Posts</div>
                    <ul class="recent-posts">

                        <?php $temp_query = $wp_query; query_posts('showposts=4&cat=-942'); ?>
                        <?php while (have_posts()) { the_post(); ?>
                        <li class="post long">
                            <div class="type">
                                <span>
                                    <?php
                                        $category = get_the_category(); 
                                        echo $category[0]->cat_name;
                                    ?>
                                </span>
                            </div>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to &ldquo;<?php the_title(); ?>&rdquo;">

                                <?php
                                    $x = kdMultipleFeaturedImages::get_featured_image_id('featured-image-3', 'post', $post->ID);
                                    if($x) {
                                        kd_mfi_the_featured_image( 'featured-image-3', 'post' );
                                    } else {
                                        echo get_the_post_thumbnail($post->ID, 'recent-posts', array('class'=>'post-img'));
                                    }
                                ?>
                                <h3 class="title"><?php the_title(); ?></h3>
                            </a>
                        </li>
                        <?php } $wp_query = $temp_query; ?>

                    </ul>
                </div>
            </div>
            <div class="c333 sidebar">
                <div class="content-area">
                </div>
                <div class="newsletter-container">
                    <img id="subscr-trigger" class="promo promo-subscribe" src="wp-content/themes/stylitics/img/subscribe-promo.png" />
                    <div class="newsletter newsletter-widget">
                        <?php mailchimpSF_signup_form() ?>
                    </div>
                </div>
            </div>
        </div>

<?php get_footer(); ?>