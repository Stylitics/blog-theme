<?php get_header(); ?>
<div class="c870 content-area post-area default">
    <div class="c280 left-area">
        <div class="title-tpl">
            <span style="font-weight: normal;">Search</span>
        </div>
    </div>
    <?php if ( have_posts() ) : ?>
<!--     <div class="title-tpl">
            <?php echo $wp_query->found_posts; ?> <?php printf( __( 'Search Results for <strong>%s</strong>', 'ari' ), '' . get_search_query() . '' ); ?>
    </div> -->
    <?php get_template_part( 'loop' ); ?>
    <?php else : ?>
    <div class="archive"><strong><?php _e( 'No Search Result Found', 'ari' ); ?></strong></div>
		<div class="post">
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'ari' ); ?></p>
		</div>
<?php endif; ?>         
    </div>
    <div class="c160 sidebar">
        <ul class="category-list catlist-arch">
            <?php wp_list_categories('orderby=name&title_li&exclude=1'); ?>
        </ul>
        <?php get_sidebar('default'); ?>
    </div>
</div>
<?php get_footer(); ?>