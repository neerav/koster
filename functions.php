<?php

/*----------------------*/
/* Add theme support for post thumbnails, automatic feed links and post formats */
/*----------------------*/
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' ); 
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'  ) );

/*----------------------*/
/* Theme Options */
/*----------------------*/
require_once ( get_template_directory() . '/includes/theme-options.php' );

add_action('after_setup_theme','koster_options_init', 9 );

// Set background colour based on theme option settings
add_action('wp_head','koster_background_color');
if ( ! function_exists( 'koster_background_color' ) ) {
	function koster_background_color() {
		$koster_options = get_option('koster_theme_options');
		?>
			<style type="text/css" media="screen">
				body, form {
					background:<?php echo $koster_options['background_color']; ?>;
				}
				body, #sidebar {
					color: <?php echo $koster_options['text_color']; ?>;
				}
				h1, h2, h3, h4, h5, h6 {
					color: <?php echo $koster_options['heading_color']; ?> !important;
				}
				a {
					color: <?php echo $koster_options['link_color']; ?>;
				}
				article.post ol.commentlist li.bypostauthor .comment-author, .page ol.commentlist li.bypostauthor .comment-author {
					background-color: <?php echo $koster_options['link_color']; ?>;
				}
				#content {
					background-color: <?php echo $koster_options['content_background_color']; ?>;
				}
				@media only screen and (min-width: 768px) { 
					.menu-main-menu-container ul.menu, .menu-main-menu-container ul.menu ul {
						background-color: <?php echo $koster_options['content_background_color']; ?>;
					}
				}
			</style>
		<?php
	}
}

// Display logo based on theme option settings. Display my gravatar if not set.
if ( ! function_exists( 'display_logo' ) ) {
	function display_logo() {
		$koster_options = get_option('koster_theme_options');
		$logosrc = $koster_options['logo_url'];
		?>
		<div class="twocol logo">
			<a href="<?php echo home_url(); ?>" title="<?php get_bloginfo('name'); ?>">
				<img src="<?php if ($logosrc !== '') { echo $logosrc; } else { echo 'http://www.gravatar.com/avatar/babdd787a9577a0e615246ac79cf2826?s=256&d=identicon&r=PG'; } ?>" alt="<?php get_bloginfo('name'); ?>" class="mugshot">
			</a>
		</div>
		<?php
	}
}

/*----------------------*/
/* Enqueue scripts */
/*----------------------*/
if ( ! is_admin() ) { add_action( 'wp_enqueue_scripts', 'koster_add_javascript' ); }

if ( ! function_exists( 'koster_add_javascript' ) ) {
	function koster_add_javascript() {
		wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/js/responsive-enhance.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'comment-reply' );	
	}
}

// Add HTML5 shim in <IE9
add_action('wp_head', 'koster_html5');
function koster_html5() {
	global $is_IE;
	if($is_IE) {
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$browser = substr( "$browser", 25, 8);
		if ($browser == "MSIE 6.0" || $browser == "MSIE 7.0" || $browser == "MSIE 8.0" ) {
			echo '<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>'; 	
		}
	}
}

/*----------------------*/
/* Register main nav */
/*----------------------*/
register_nav_menu('main', 'Main menu');

/*----------------------*/
/* Register Sidebar */
/*----------------------*/
if ( function_exists('register_sidebar') )
register_sidebar(array(
    'before_widget' => '<section class="widget">',
    'after_widget' => '</section>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

/*----------------------*/
/* Prepare featured images for mobile which are served conditionally (big props to http://viewportindustries.com/blog/automatic-responsive-images-in-wordpress/) */
/*----------------------*/
add_image_size('thumbnail-bw', 400, 0, false);
add_filter('wp_generate_attachment_metadata','bw_images_filter');

/*----------------------*/
/* Define content width */
/*----------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;


/*----------------------*/
/* Post Meta */
/*----------------------*/
if ( ! function_exists( 'koster_post_meta' ) ) {
	function koster_post_meta() { ?>
		<ul>
			<li class="date"><i><?php _e('Written on', 'koster'); ?></i> <?php the_time('j F Y', '<time>', '</time>'); ?></li>
			<li class="category"><i><?php _e('Posted in', 'koster'); ?></i> <?php the_category(', '); ?></li>
			<li class="tags"><?php the_tags('<i>Tagged</i> ',', ',''); ?></li>
			<li class="comment"><i><?php _e('Your thoughts', 'koster'); ?></i> <?php comments_popup_link( __( 'Leave a comment', 'koster' ), __( '1 Comment', 'koster' ), __( '% Comments', 'koster' ) ); ?></li>
			<li class="permalink"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'koster' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><i><?php _e('Permalink','koster'); ?></i></a></li>
		</ul>
	<?php }
}
?>