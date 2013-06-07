<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'ari' ), max( $paged, $page ) );
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" media="all" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
<?php if (is_single()) {
        global $post;
        $cat='';
        $cats = get_the_category($post->ID);
        foreach ( $cats as $c ) {
            $cat .= $c->category_nicename.' ';
        }
} ?>
</head>

<body <?php body_class($cat); ?>>

   <div class="siteHeader clearfix">
        <div class="wrap clearfix">
	    <a class="stylitics-logo" href="http://stylitics.com">Stylitics</a>
            <?php wp_nav_menu( array('menu' => 'top-menu' )); ?>
            <ul class="social-sites clearfix">
                <li class="facebook"><a href="http://www.facebook.com/stylitics">Facebook</a></li>
                <li class="twitter"><a href="http://www.twitter.com/stylitics">Twitter</a></li>
                <li class="pinterest"><a href="http://www.pinterest.com/stylitics">Pinterest</a></li>
                <li class="instagram"><a href="http://www.instagram.com/stylitics">Instagram</a></li>
            </ul>
            <h1 class="blog-logo">
                <a href="<?php echo home_url( '/'); ?>"><sup>The</sup> Stylitics Report</a>
            </h1>
        </div>
<div class="search_input wrap clearfix">
    <?php get_search_form(); ?>
</div>
    </div>
<div id="wrap" class="wrap content clearfix">
