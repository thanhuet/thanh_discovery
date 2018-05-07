<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package new_wordpress_project
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) {
            ?>
            <div class="comment-post-single">
                <?php
                new_wordpress_project_posted_by();
                new_wordpress_project_posted_on_single();
                thim_entry_meta_comment_number_single();
                ?>
            </div>
            <?php
        }
        ?>

    </header><!-- .entry-header -->

    <?php new_wordpress_project_post_thumbnail(); ?>
    <?php echo get_post_meta(get_the_ID(),'soundcould',true);?>
    <?php dynamic_sidebar('social-link');?>
    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'new_wordpress_project'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->