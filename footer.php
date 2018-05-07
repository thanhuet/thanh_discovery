<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package new_wordpress_project
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="sub-footer container">
        <div class="bottom-bar row">
            <div class="bottom-bar-left col-md-9">
                <div class="row">
                    <?php dynamic_sidebar('footer-sidebar') ?>
                </div>
            </div>
            <div class="bottom-bar-right col-md-3">
                <div class="row">
                    <?php dynamic_sidebar('footer-sidebar-right') ?>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->

<div class="site-info ">
    <div class="site-info-sub container">
        <div class="row">
            <div class="copyright-info col-md-6">
                <!--        <span class="sep"> | </span>-->
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('%1$s by %2$s.', 'new_wordpress_project'), 'Copyright 2018 Corporate WordPress Theme ', '<a href="https://thimpress.com/">ThemePress</a>');
                ?>
            </div>
            <div class="site-info-menu col-md-6">
                <?php dynamic_sidebar('copyright-sidebar') ?>
            </div>
        </div>
    </div>
</div><!-- .site-info -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
