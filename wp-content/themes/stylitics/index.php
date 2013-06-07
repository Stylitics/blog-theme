<?php get_header(); ?>
<div class="c870 content-area post-area">
    <div class="c280 left-area default">
        <div class="title-tpl">
            Archives
        </div>
        <ul class="trending-list">
           <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
        </ul>
        <span class="meta">
            <span><a href ="<?php echo home_url( '/?p=archive' ); ?>">Older Posts</a></span>
        </span>
    </div>
    <?php get_template_part( 'loop', 'index' ); ?>
           
    </div>
    <div class="c160 sidebar">
        <ul class="category-list catlist-arch">
            <?php wp_list_categories('orderby=name&title_li&exclude=1'); ?>
        </ul>
        <?php get_sidebar('default'); ?>
    </div>
</div>

<?php get_footer(); ?>