<?php

// POPULAR POST WIDGET
class Related_Post extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'replated-posts', // Base ID
            __('Related posts', 'new_wordpress_project'), // Name
            array('description' => __('Show related posts for tag', 'new_wordpress_project'),) // Args
        );
    }

    function widget($args, $instance)
    {
        extract($args);

        $title = $instance['title'];
        $postscount = $instance['number'];
        $col = 12 / $postscount;

        global $postcount;

        echo $before_widget . $before_title . $title . $after_title;
        ?>

        <?php
        global $post;
        $tags = wp_get_post_tags($post->ID);

        if ($tags) {
            $tag_ids = array();
            foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
            $args = array(
                'tag__in' => $tag_ids,
                'post__not_in' => array($post->ID),
                'posts_per_page' => $postscount // Number of related posts to display.
//                'caller_get_posts'=>1
            );

            $my_query = new wp_query($args);
            ?>
            <div class="row">
                <?php
                while ($my_query->have_posts()) {
                    $my_query->the_post();
                    $cat_single = get_the_category();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-' . $col); ?>>
                        <div class="cate-single"><a href="<?php echo esc_url( get_category_link( $cat_single[0]->term_id ) );?>"><?php echo esc_html( $cat_single[0]->name );?> </a></span>
                        </div>
                        <?php new_wordpress_project_post_thumbnail(); ?>


                        <?php echo get_post_meta(get_the_ID(), 'soundcould', true); ?>
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
                                    the_excerpt();
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'new_wordpress_project'),
                                'after' => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->
                        <footer class="article-footer">
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

                    </article>

                <?php }
                ?>
            </div>
            <?php
        }
        wp_reset_query();
        echo $after_widget;
    }

    function update($newInstance, $oldInstance)
    {
        $instance = $oldInstance;
        $instance['title'] = strip_tags($newInstance['title']);
        $instance['number'] = $newInstance['number'];

        return $instance;
    }

    function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('New tittle', 'new_wordpress_project');
        $number = !empty($instance['number']) ? $instance['number'] : '';

        echo '<p style="text-align:right;"><label  for="' . $this->get_field_id('title') . '">' . __('Title:') . '  <input style="width: 200px;" id="' . $this->get_field_id('title') . '"  name="' . $this->get_field_name('title') . '" type="text"  value="' . $title . '" /></label></p>';

        echo '<p style="text-align:right;"><label  for="' . $this->get_field_id('number') . '">' . __('Number of Posts:', 'widgets') . ' <input style="width: 50px;"  id="' . $this->get_field_id('number') . '"  name="' . $this->get_field_name('number') . '" type="text"  value="' . $number . '" /></label></p>';

        echo '<input type="hidden" id="custom_recent" name="custom_recent" value="1" />';
    }
}

add_action('widgets_init', function () {
    register_widget('Related_Post');
});
?>
