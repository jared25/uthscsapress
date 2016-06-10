<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 //Custom Functions by Jared Ozuna
 
 //Controls - (User Control), Settings - (Database selection), Sections - (Group of Options)
 
 //Creating a customize option to change link colors
 function FoundationPress_customize_register( $wp_customize ) {
	 //ADD SETTINGS BELOW
	 $wp_customize->add_setting('fp_link_color', array(
	 'default' => '#006ec3',
	 'transport' => 'refresh',
	 ));
	 //$wp_customize->add_setting('fp_background_color_control', array(
	 //'default' => '#006ec3',
	 //'transport' => 'refresh',
	 //));
	 //$wp_customize->add_setting('fp_menu_link_control', array(
	 //'default' => '#000000',
	 //'transport' => 'refresh',
	 //));
	 //$wp_customize->add_setting('fp_menu_hover_control', array(
	 //'default' => '#000000',
	 //'transport' => 'refresh',
	 //));
	 //$wp_customize->add_setting('fp_menu_active_text_control', array(
	 //'default' => '#000000',
	 //'transport' => 'refresh',
	 //));
	 $wp_customize->add_setting('fp_theme_switch_control', array(
	 'theme_color', 
	 array(
		'default' => 'orangeTheme'
	 )
	 ));
	 
	 //ADD SECTIONS BELOW
	 //$wp_customize->add_section('fp_standard_colors', array(
	 //'title' => __('Color Options', 'FoundationPress'),
	 //'priority' => 80,
	 //));
	 $wp_customize->add_section('fp_test_options', array(
	 'title' => __('Theme Color Switch', 'FoundationPress'),
	 'priority' => 80,
	 ));
	 
	 //ADD NEW CONTROLS BELOW
	 //$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fp_link_color_control', array(
	 //'title' => __('General Color' , 'FoundationPress'),
	 //'label' => __('Text Link Color', 'FoundationPress'),
	 //'section' => 'fp_standard_colors',
	 //'settings' => 'fp_link_color',
	 //)));
	 //$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fp_background_color_control', array(
	 //'label' => __('Menu Background Color', 'FoundationPress'),
	 //'section' => 'fp_standard_colors',
	 //'settings' => 'fp_background_color_control',
	 //)));
	 //$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fp_menu_link_control', array(
	 //'label' => __('Menu Link Color', 'FoundationPress'),
	 //'section' => 'fp_standard_colors',
	 //'settings' => 'fp_menu_link_control',
	 //)));
	 //$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fp_menu_hover_control', array(
	 //'label' => __('Menu Hover Background Color', 'FoundationPress'),
	 //'section' => 'fp_standard_colors',
	 //'settings' => 'fp_menu_hover_control',
	 //)));
	// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fp_menu_active_text_control', array(
	// 'label' => __('Menu Link Text Color', 'FoundationPress'),
	// 'section' => 'fp_standard_colors',
	// 'settings' => 'fp_menu_active_text_control',
	// )));
	 $wp_customize->add_control(
	 	 'theme_color', 
	 array(
		'type' => 'radio',
		'label' => 'Test Radio',
		'section' => 'fp_test_options',
		'settings' => 'fp_theme_switch_control',
		'choices' => array(
		'orangeTheme' => 'Orange Theme',
		'purpleTheme' => 'Purple Theme',
		'tealTheme' => 'Teal Theme',
		'blueTheme' => 'Blue Theme',
	)
	)
);
 }
 add_action ('customize_register', 'FoundationPress_customize_register');
 
 //Output Customize CSS
 function FoundationPress_customize_css() { ?>
	 <style type="text/css">
		a:link:not(.button),
		a:visited{
			color:<?php echo get_theme_mod('fp_link_color'); ?>
		}
		.menu .active{
			color: <?php echo get_theme_mod('fp_menu_active_text_control'); ?> ;
			}
		.top-bar, .top-bar ul {
			background-color: <?php echo get_theme_mod('fp_background_color_control'); ?> ;
			}
		.top-bar .menu a {
			color: <?php echo get_theme_mod('fp_menu_active_text_control'); ?> ;
			}
			/* Hover Text Color - Same as the background Color */
		.menu a:hover:not(.button){
			color: <?php echo get_theme_mod('fp_background_color_control'); ?> ;
		}
	 </style>
	 <?php
 }
 
 add_action('wp_head', 'FoundationPress_customize_css');
 
 

//Social Media Links in Menu
 
function my_customizer_social_media_array() { 
	/* store social site names in array */
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');
	return $social_sites;
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'my_add_social_sites_customizer');
 
function my_add_social_sites_customizer($wp_customize) { 
	$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'FoundationPress'),
			'priority' => 35,
	) );
	$social_sites = my_customizer_social_media_array();
	$priority = 5;
	foreach($social_sites as $social_site) {
		$wp_customize->add_setting( "$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'FoundationPress' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => $priority,
		) );
		$priority = $priority + 5;
	}
}

/* takes user input from the customizer and outputs linked social media icons */
function my_social_media_icons() {
	$social_sites = my_customizer_social_media_array();

	/* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }

    /* for each active social site, add it as a list item */
        if ( ! empty( $active_sites ) ) {

            echo "<ul class='social-media-icons'>";

            foreach ( $active_sites as $active_site ) {

	            /* setup the class */
		        $class = 'fa fa-' . $active_site;

                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo antispambot( is_email( get_theme_mod( $active_site ) ) ); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email icon', 'FoundationPress'); ?>"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="social-icons">
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'FoundationPress'), $active_site ); ?>"></i>
                        </a>
                    </li>
                <?php
                }
            }
		echo "</ul>";
    }
}

//Theme Setup

//Add Feature Image support to front page
function front_featured_image_set (){
	add_theme_support('post-thumbnails');
}

add_action('customize_register', 'front_featured_image_set');
 
 
//Custom Hero Image Upload
// Register Theme Features
// Register Theme Features

// Add theme support for Custom Background
$background_args = array(
	'default-color'          => 'ffffff',
	'default-image'          => '',
	'default-repeat'         => 'no-repeat',
	'default-position-x'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-background', $background_args );


//Logo Upload Support
function FoundationPress_Logo_customizer( $wp_customize ) {
    //New Section
	$wp_customize->add_section( 'FoundationPress_logo_section' , array(
    'title'       => __( 'Logo Uplodaer', 'FoundationPress' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',) );
	
	$wp_customize->add_setting( 'FoundationPress_logo' );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'FoundationPress' ),
    'section'  => 'FoundationPress_logo_section',
    'settings' => 'FoundationPress_logo', ) ) );

}
add_action( 'customize_register', 'FoundationPress_Logo_customizer' );
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 // use 'semi quotes' if you are speaking to a computer and use --('This') if you are speaking to a human. (Localization)