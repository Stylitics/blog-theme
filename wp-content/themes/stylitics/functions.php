<?php

/* Make theme available for translation */
/* Translations can be filed in the /languages/ directory */
load_theme_textdomain( 'ari', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) )
	$content_width = 450;

/* Tell WordPress to run ari_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'ari_setup' );

if ( ! function_exists( 'ari_setup' ) ):

function ari_setup() {

	/* This theme styles the visual editor with editor-style.css to match the theme style. */
	add_editor_style();
	
	/* This theme uses post thumbnails */
	if ( function_exists( 'add_theme_support', array( 'post','xtechnos_poll'))) {
		add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
	}
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'homepage-popular', 170, 261, true ); //(cropped)
		add_image_size( 'big-slider-top', 840, 385, true ); //(cropped)
		add_image_size( 'fashion-history-slider', 180, 271, true ); //(cropped)
		add_image_size( 'category-post-list-images', 170, 226, true ); //(cropped)
		add_image_size( 'recent-posts', 199, 162, true ); //(cropped)
		add_image_size( 'poll-pic', 138, 144, true ); //(cropped)
	}

	/* Add default posts and comments RSS feed links to head */
	add_theme_support( 'automatic-feed-links' );

	/* This theme uses wp_nav_menu() in one location. */
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'ari'),
	) );

}
endif;

/* Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link. */
function ari_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'ari_page_menu_args' );


/* Sets the post excerpt length to 40 characters. */
function ari_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'ari_excerpt_length' );


/* Returns a "Continue Reading" link for excerpts */
function ari_continue_reading_link() {
	return ' <a class="rmore" href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ari' ) . '</a>';
}

/* Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and ari_continue_reading_link(). */
function ari_auto_excerpt_more( $more ) {
	return ' &hellip;' . ari_continue_reading_link();
}
add_filter( 'excerpt_more', 'ari_auto_excerpt_more' );

/* Adds a pretty "Continue Reading" link to custom post excerpts. */
function ari_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= ari_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'ari_custom_excerpt_more' );


if ( ! function_exists( 'ari_comment' ) ) :

/*  Search form custom styling */
function ari_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="'.get_bloginfo('url').'" >
    <input type="text" class="search-input" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'ari') .'" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'ari_search_form' );

/* Template for comments and pingbacks. */
function ari_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-gravatar"><?php echo get_avatar( $comment, 50 ); ?></div>
		
		<div class="comment-body">
		<div class="comment-meta commentmetadata"><?php printf( __( '%s <span class="says">says</span>', 'ari' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?> <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'ari' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( 'Edit &rarr;', 'ari' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<?php comment_text(); ?>
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
		<p class="moderation"><?php _e( 'Your comment is awaiting moderation.', 'ari' ); ?></p>
		<?php endif; ?>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
		
		</div>
		<!--comment Body-->
		
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'ari' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'ari'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;


/* Register widgetized areas, including two sidebars and four widget-ready columns in the footer. */
function ari_widgets_init() {
	// Primary Widget area (left, fixed sidebar)

	register_sidebar( array(
		'name' => __( 'Footer posts area', 'ari' ),
		'id' => 'footer-widget-area',
		'description' => __( 'Here you can put all the additional widgets for your right sidebar.', 'ari' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Default Sidebar', 'ari' ),
		'id' => 'default-sidebar',
		'description' => __( 'Here you can put all the additional widgets for your right sidebar.', 'ari' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'homepage Sidebar', 'ari' ),
		'id' => 'homepage-sidebar',
		'description' => __( 'Here you can put all the additional widgets for your right sidebar.', 'ari' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
/* Register sidebars by running ari_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'ari_widgets_init' );

/* Removes the default styles that are packaged with the Recent Comments widget. */
function ari_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'ari_remove_recent_comments_style' );

if ( ! function_exists( 'ari_posted_on' ) ) :
/* Prints HTML with meta information for the current post—date/time and author. */
function ari_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'ari' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'ari' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

// multiple featured images

if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'featured-image-2',
                'post_type' => 'post',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Frontpage Featured Articles',
                    'set'       => 'Set Homepage Featured 840x385px',
                    'remove'    => 'Remove Featured Image',
                    'use'       => 'Use as Homepage Featured Image',
                )
        );

        new kdMultipleFeaturedImages( $args );

        $args2 = array(
                'id' => 'featured-image-3',
                'post_type' => 'post',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Recent Posts Thumbnail',
                    'set'       => 'Set Recent Posts Thumbnail 199x162px',
                    'remove'    => 'Remove Recent Posts Thumbnail',
                    'use'       => 'Use as Recent Posts Thumbnail',
                )
        );

        new kdMultipleFeaturedImages( $args2 );

        $args3 = array(
                'id' => 'featured-image-4',
                'post_type' => 'post',      // Set this to post or page
                'labels' => array(
                    'name'      => 'TodayIFH Slider Thumbnail',
                    'set'       => 'Set TodayIFH Slider Thumbnail 180x271px',
                    'remove'    => 'Remove TodayIFH Slider Thumbnail',
                    'use'       => 'Use as TodayIFH Thumbnail',
                )
        );

        new kdMultipleFeaturedImages( $args3 );

        $args4 = array(
                'id' => 'featured-image-5',
                'post_type' => 'post',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Popular posts thumbnail',
                    'set'       => 'Set popular posts thumbnail 171x261px',
                    'remove'    => 'Remove popular posts thumbnail',
                    'use'       => 'Use as popular posts thumbnail',
                )
        );

        new kdMultipleFeaturedImages( $args4 );
}

function current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

// limit excerpt in words

function string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}