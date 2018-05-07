<?php

define( 'THIM_DIR', trailingslashit( get_template_directory() ) );
define( 'THIM_URI', trailingslashit( get_template_directory_uri() ) );
define( 'SAVEQUERIES', true );

/**
 * new_wordpress_project functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package new_wordpress_project
 */

if ( ! function_exists( 'new_wordpress_project_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function new_wordpress_project_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on new_wordpress_project, use a find and replace
		 * to change 'new_wordpress_project' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'new_wordpress_project', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'new_wordpress_project' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'new_wordpress_project_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'new_wordpress_project_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function new_wordpress_project_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'new_wordpress_project_content_width', 640 );
}
add_action( 'after_setup_theme', 'new_wordpress_project_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function new_wordpress_project_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'new_wordpress_project' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'new_wordpress_project' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Thim: Topbar Center', 'new_wordpress_project' ),
        'id'            => 'topbar_center',
        'description'   => esc_html__( 'Add widgets here.', 'new_wordpress_project' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'new_wordpress_project_widgets_init' );


require THIM_DIR . '/inc/widgets/widgets.php';
require THIM_DIR . '/inc/function-custom.php';
/**
 * Enqueue scripts and styles.
 */
function new_wordpress_project_scripts() {
	wp_enqueue_style( 'new_wordpress_project-style', get_stylesheet_uri() );

	wp_enqueue_script( 'new_wordpress_project-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'new_wordpress_project-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array( ), '' );
    wp_enqueue_script( 'main-js', get_template_directory_uri(). '/assets/js/thim-custom.js', array( ), '', true);
    wp_enqueue_script( 'jquery-main', get_template_directory_uri(). '/assets/libs/jquery/jquery-3.3.1.min.js', array( ), '');
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( ), '');
    wp_enqueue_style('ionic','http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), '');
//    wp_enqueue_style('font-awesome-css');
}
add_action( 'wp_enqueue_scripts', 'new_wordpress_project_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//add sidebar footer
function thim_widgets_init()
{
    $thim_options = get_theme_mods();

    register_sidebar(array(
    'name' => esc_html__('Footer Sidebar', 'new_wordpress_project'),
    'id' => 'footer-sidebar',
    'description' => esc_html__('Sidebar display widgets.', 'new_wordpress_project'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-4">',
    'after_widget' => '</aside>',
    'before_item' => '<div class="info-contact-footer "><p>',
    'after_item' => '</p></div>',
    'before_title' => '<h3 class="title-contact-footer">',
    'after_title' => '</h3>',

));

    register_sidebar(array(
        'name' => esc_html__('Footer Sidebar Right', 'new_wordpress_project'),
        'id' => 'footer-sidebar-right',
        'description' => esc_html__('Sidebar footer right display widgets.', 'new_wordpress_project'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-12">',
        'after_widget' => '</aside>',
        'before_item' => '<div class="info-contact-footer"><p>',
        'after_item' => '</p></div>',
        'before_title' => '<h3 class="title-contact-footer">',
        'after_title' => '</h3>',

    ));

    register_sidebar(array(
        'name' => esc_html__('Related Post', 'new_wordpress_project'),
        'id' => 'related-post',
        'description' => esc_html__('Sidebar bottom single page', 'new_wordpress_project'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
        'after_widget' => '</aside>',
        'before_item' => '<div class="info-contact-footer"><p>',
        'after_item' => '</p></div>',
        'before_title' => '<h3 class="title-related-post">',
        'after_title' => '</h3>',

    ));

    register_sidebar(array(
        'name' => esc_html__('Social link single page', 'new_wordpress_project'),
        'id' => 'social-link',
        'description' => esc_html__('Display social link', 'new_wordpress_project'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-1">',
        'after_widget' => '</aside>',
        'before_item' => '<div class="info-contact-footer"><p>',
        'after_item' => '</p></div>',
        'before_title' => '<span class="socail-link">',
        'after_title' => '</span>',

    ));

    register_sidebar(array(
        'name' => esc_html__('Copyright Sidebar', 'new_wordpress_project'),
        'id' => 'copyright-sidebar',
        'description' => esc_html__('Info copyright site.', 'new_wordpress_project'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_item' => '<div class="menu-copyright"><p>',
        'after_item' => '</p></div>',
        'before_title' => '<h3 class="title-contact-footer">',
        'after_title' => '</h3>',

    ));

}

add_action( 'widgets_init', 'thim_widgets_init' );

function custom_excerpt_length( $length ) {
    if(is_single()){
        return 20;
    }
    return 45;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) { return '' . '' . '';}
add_filter('excerpt_more', 'new_excerpt_more');

require THIM_DIR . 'inc/admin/customize-option.php';

function pagination_bar() {
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'show_all' => true,
            'type' =>'list',
            'prev_text' => '<i class="icon ion-chevron-left"></i>',
            'next_text' => '<i class="icon ion-chevron-right"></i>'
        ));
    }
}

if ( ! function_exists( 'thim_comment' ) ) {
    function thim_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        if ( 'div' == $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo ent2ncr( $tag );
        echo ' '; ?><?php comment_class( 'description_comment' ) ?> id="comment-<?php comment_ID() ?>">
        <?php
        if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, 60 );
        } ?>
        <div class="content-comment">
            <div class="author">
                <?php printf( '<span class="author-name">%s</span>', get_comment_author_link() ) ?>
                <span class="date-comment"><?php echo get_comment_date();?></span>
                <span>
					<?php comment_reply_link( array_merge( $args, array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => 'REPLY'
                    ) ) ) ?>
                    <?php edit_comment_link( esc_html__( 'Edit', 'restaurant-wp' ), '', '' ); ?>
				</span>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'restaurant-wp' ) ?></em>
            <?php endif; ?>
            <div class="message">
                <?php comment_text(); ?>
            </div>
        </div>
        <div class="clear"></div>
        <?php
    }
}

function custom_comments($fields)
{
//    $custom_fields = $fields;
//    $custom_fields = array(
//        'author' =>
//            '<p class="comment-form-author"><input placeholder="Your Name *" id="author" name="author" type="text" value="" size="30" aria-required="true"></p>',
//        'email'  =>
//            '<p class="comment-form-email"><input placeholder="Email" id="email" name="email" type="text" value="" size="30" aria-required="true"></p>'
//    );

    $commenter = wp_get_current_commenter();
    $req       = get_option( 'require_name_email' );
    $aria_req  = ( $req ? 'aria-required=true' : '' );

    $fields = array(
        'author' => '<p class="comment-form-author">' . '<input placeholder="' . esc_attr__( 'Your Name *', 'restaurant-wp' ) . ( $req ? ' ' : '' ) . '" id="author" name="author" type="text" value="" size="30" ' . $aria_req . ' /></p>',
        'email'  => '<p class="comment-form-email">' . '<input placeholder="' . esc_attr__( 'Email', 'restaurant-wp' ) . ( $req ? ' ' : '' ) . '" id="email" name="email" type="text" value="" size="30"  /></p>',
    );

    return $fields;

}
add_filter('comment_form_default_fields','custom_comments');

