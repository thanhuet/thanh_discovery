<?php
///**
// * Create Thim_Startertheme_Customize
// *
// */
//
///**
// * Class Thim_Customize_Options
// */
//class Thim_Customize_Options {
//    /**
//     * Thim_Customize_Options constructor.
//     */
//    public function __construct() {
////        add_action( 'customizer_register', 'thim_create_customize_options' );
//    }
//
//    public static function register( $wp_customize ) {
//
//        // include sections
//        $customize_path = THIM_DIR . 'inc/admin/customize-section/';
//
//        require_once $customize_path . 'blog-meta.php';
//        require_once $customize_path . 'blog.php';
//    }
//}
//
//add_action( 'customize_register' , array( 'Thim_Customize_Options' , 'register' ) );

/**
 * Contains methods for customizing the theme customization screen.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */

require 'then_style.php';

function register($wp_customize)
{
    //1. Define a new section (if desired) to the Theme Customizer

    $wp_customize->add_section('mytheme_options',
        array(
            'title' => __('Logo Header', 'mytheme'), //Visible title of section
            'priority' => 35, //Determines what order this appears in
            'description' => __('Allows you to set logo for site.', 'mytheme'), //Descriptive tooltip
        )
    );

    //2. Register new settings to the WP database...
    $wp_customize->add_setting('link_textcolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
        array(
            'default' => '#2BA6CB', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        )
    );

    //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'mytheme_link_textcolor', //Set a unique ID for the control

        array(
            'label'       => esc_html__( 'Header Positions', 'mytheme' ),
            'tooltip'     => esc_html__( 'Allows you can select position layout for header layout. ', 'mytheme' ),
            'settings' => 'link_textcolor', //Which setting to load and manipulate (serialized is okay)
            'section'     => 'mytheme_options',
            'priority'    => 20,
        )
    ));





}

function general($wp_customize){
    $wp_customize->add_section('general',
        array(
            'title' => __('General', 'mytheme'), //Visible title of section
            'priority' => 35, //Determines what order this appears in
            'description' => __('Allows you to set font size.', 'mytheme'), //Descriptive tooltip
        )
    );

    $wp_customize->add_setting('general_font', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
        array(
            'default' => '', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        )
    );

    $wp_customize->add_setting('general_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
        array(
            'default' => '', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        )
    );

    $wp_customize->add_control(
        'general_option', //Set a unique ID for the control
        array(
            'label'       => esc_html__( 'Font size', 'mytheme' ),
            'settings' => 'general_font', //Which setting to load and manipulate (serialized is okay)
            'section'     => 'general',
            'priority'    => 20,
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'general_option1',
            array(
                'label'      => __( 'Font Color', 'mytheme' ),
                'section'    => 'general',
                'settings'   => 'general_color',
            ) )
    );
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register','register');
add_action('customize_register','general');
