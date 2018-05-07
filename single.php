<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package new_wordpress_project
 */

get_header();
?>
    <div class="content-area-down container">
        <div class="row">
            <div id="primary" class="content-area col-md-9">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content-single');
                    ?>
                    <?php
                    if (has_tag()) {
                        ?>
                        <div class="tags-single"><span
                                class="text-socail-link">TAGS</span> <?php echo the_tags('<ul><li>', '</li><li>', '</li></ul>');
                        ?>
                    <?php } else {
                        ?>
                        <div class="tags-single"><span class="text-socail-link"></span>
                    <?php } ?>
                    </div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile; // End of the loop.
                ?>
            </div> <!-- #primary -->
            <?php
            get_sidebar();
            ?>
        </div>
    </div>

    <div class="relatedposts">
        <div class="relatedposts-sub container">
            <?php dynamic_sidebar('related-post') ?>
        </div>
    </div>
<?php
get_footer();
