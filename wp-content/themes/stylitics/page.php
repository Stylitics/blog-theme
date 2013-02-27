<?php get_header(); ?>
<div class="clearfix wrap">
<div class="c870 content-area post-area post-full">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="c280 left-area left-area-title page-titles">
				<?php if ( is_front_page() ) { ?>
					<h2 class="title"><?php the_title(); ?></h2>
				<?php } else { ?>	
					<h1 class="title"><?php the_title(); ?></h1>
				<?php } ?>	
		    </div>
			<div class="c550 middle">
				<div class="content">
					<?php the_content(); ?>
				</div>
				<div class="clear"></div>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'ari' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit this page &rarr;', 'ari' ), '', '' ); ?>
			</div>

		<?php endwhile; ?>
		<!--end Page-->
	<!--end Content-->

</div>
<!--end Main-->
<div class="c160 sidebar">
    <ul class="category-list">
        <?php
        $catsy = get_the_category();
        $myCat = $catsy[0]->cat_ID;
        wp_list_categories('orderby=name&title_li=&current_category='.$myCat);
        ?>
    </ul>
</div>
</div>

<?php get_footer(); ?>