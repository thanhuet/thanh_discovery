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
    <?php new_wordpress_project_post_thumbnail(); ?>
    <?php echo get_post_meta(get_the_ID(),'soundcould',true);?>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>


    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
//        the_excerpt();
        the_excerpt();
//        the_meta();
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'new_wordpress_project'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
    <footer class="article-footer">
        <div class="readmore">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html__('READ MORE', 'new_wordpress_project'); ?></a>
        </div>
        <?php
        if ('post' === get_post_type()) {
            ?>
            <div class="entry-meta">
                <?php
                new_wordpress_project_posted_on();
                thim_entry_meta_comment_number();
                ?>
            </div>
            <?php
        }
        ?>
    </footer>

</article><!-- #post-<?php the_ID(); ?> -->
