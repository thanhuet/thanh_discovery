<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package new_wordpress_project
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <div class="overlay-close-menu"></div>
    <header id="masthead" class="site-header navbar-toggle no-transition">
        <div class="menu-mobile-effect">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <div class="header-v1 container">
            <div class="row header-container">
                <div class="site-branding col-md-3">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
                    else :
                        ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                 rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                    endif;
                    $new_wordpress_project_description = get_bloginfo('description', 'display');
                    if ($new_wordpress_project_description || is_customize_preview()) :
                        ?>
                        <p class="site-description"><?php echo $new_wordpress_project_description; /* WPCS: xss ok. */ ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation col-md-6">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                    ));
                    ?>
                </nav><!-- #site-navigation -->

                <div class="header-search col-md-3">
                    <div class="search-bar">
                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <input type="text" class="hidden-search" id="search-input" name="search-input"
                                   value=""/>
                            <button class="button-search" type="submit"><i class="icon ion-ios-search-strong"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- #masthead -->

    <div class="mobile-menu-container">
        <div class="menu-mobile-effect">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <ul class="nav navbar-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'items_wrap' => '%3$s'
            ));
            ?>
        </ul>
    </div>

    <div id="content" class="site-content">
        <section class="content-area">
            <?php
            get_template_part('templates/page-title');
            //            do_action('thim_wrapper_loop_start');
            //            include $file;
            //            do_action('thim_wrapper_loop_end');

            ?>
        </section>