<?php
$thim_heading_top_img = get_theme_mod('link_textcolor');
$thim_heading_top_src = $thim_heading_top_img;
$c_css_style = '';
$c_css_style .= ($thim_heading_top_src != '') ? 'background-image:url(' . $thim_heading_top_src . ');' : '';
//$c_css_style .= ($thim_heading_top_src != '') ? 'height:' . $page_title_height . ';' : '';
$c_css_style .= ($thim_heading_top_src != '') ? 'background-position:center;' : '';
$c_css = ($c_css_style != '') ? 'style="' . $c_css_style . '"' : '';
$parallax = ' data-stellar-background-ratio="0.5"';
?>
<div class="page-title">
    <div class="main-top" <?php echo ent2ncr($c_css); ?>  <?php echo ent2ncr($parallax); ?> >
        <div class="content ">
            <?php
            //            if (is_single()) {
            //                $typography = 'h2 ' . $title_css;
            //            } else {
            //                $typography = 'h1 ' . 'BLOG';
            //            }
            if (is_front_page() || is_home()) {
                echo '<h4 class="info-title">';
                echo esc_html__('BEST', 'restaurant-wp');
                echo '<span class = "info-title-sub">'.esc_html__(' ONLINE SERVICES', 'restaurant-wp').'</span>';
                echo '</h4>';
                echo '<h2 class="title">';
                echo esc_html__('Blog Archive', 'restaurant-wp');
                echo '</h2>';
            }
            else{
                echo '<h2 class="title">';
                echo esc_html__('Blog Archive', 'restaurant-wp');
                echo '</h2>';
            }
            ?>
        </div>
    </div><!-- .main-top -->

    <div class="breadcrumb-content">
        <?php
        if (!is_front_page() || !is_home()) { ?>
            <div class="breadcrumbs-wrapper">
                <div class="">
                    <ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs"
                        class="breadcrumbs">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                                                                                                          href="<?php echo esc_url(home_url()); ?>"
                                                                                                          title="<?php esc_attr__('Home ', 'restaurant-wp'); ?>"><span
                                        itemprop="name"><?php echo esc_html__('Home', 'restaurant-wp'); ?></span></a></li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="<?php echo esc_attr( get_the_title() );?>"><?php echo  esc_html__( '/ Blog', 'restaurant-wp' )?></span></li>

                    </ul>
                </div><!-- .container -->
            </div><!-- .breadcrumbs-wrapper -->
        <?php }
        ?>
    </div>


</div><!-- .page-title -->


