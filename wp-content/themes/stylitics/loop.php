
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
        <ul class="social-share clearfix">
            <li class="comments">
                <div class="icon"></div>
                <em><?php comments_number( '0', '1', "%" ); ?></em> Comments
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
