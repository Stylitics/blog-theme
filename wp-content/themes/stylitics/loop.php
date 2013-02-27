
<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'ari' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'ari' ); ?></p>

<?php endif; ?>


<div class="c550 cmiddle">
    <ul class="listing-section">
<?php /* Start the Loop. */ 
$tmp_posts_count = 1;
?>
<?php while ( have_posts() ) : the_post(); ?>

 <li class="<?php if($tmp_posts_count%2==0) {echo 'even';} else echo 'odd'; ?> clearfix">
 	<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ){ the_post_thumbnail('category-post-list-images', array('class'=>'post-img')); } ?></a>
    <div class="container">
        <span class="status"><?php echo single_cat_title( '', false ) ?></span>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="excerpt restyled"><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></div>
        
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

        <ul class="social-buttons clearfix">
            <li>
                <a data-pin-config="beside" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $url; ?>&description=<?php the_title(); ?>" data-pin-do="buttonPin" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
            </li>
            <li><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink();?>&amp;send=false&amp;layout=button_count&amp;width=200&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=209742945804238" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width: 85px; height:21px;" allowTransparency="true"></iframe></li>
            <li>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="stylitics">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </li>
        </ul>
    </div>
</li>
<?php $tmp_posts_count++; ?>


<?php endwhile; // End the loop. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <div class="pagination">
        <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
        ) );
        ?>
    </div>
<?php endif; ?>

    </ul>
</div>
