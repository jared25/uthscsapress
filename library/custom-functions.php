<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 //Custom Functions by Jared Ozuna
 //Controls - (User Control), Settings - (Database selection), Sections - (Group of Options)
 
 require get_template_directory(). '/settings/uthscsaPress_settings.php';
 
 //Creating custom theme colors
 function FoundationPress_customize_register( $wp_customize ) {
	 //ADD SETTINGS BELOW
	 $wp_customize->add_setting('fp_theme_switch_control', array(
	 'theme_color', 
	 array(
		'default' => 'orangeTheme'
	 )
	 ));
	 
	 $wp_customize->add_section('fp_test_options', array(
	 'title' => __('Theme Color Switch', 'FoundationPress'),
	 'priority' => 80,
	 'description' => __('Please choose the color scheme that best suits your sites status', 'FoundationPress')
	 ));
	 
	 $wp_customize->add_control(
	 	 'theme_color', 
	 array(
		'type' => 'radio',
		'label' => 'Color Schemes',
		'section' => 'fp_test_options',
		'settings' => 'fp_theme_switch_control',
		'choices' => array(
		'orangeTheme' => 'Institutional: Orange Theme',
		'purpleTheme' => 'Patient Care: Purple Theme',
		'tealTheme' => 'Research: Teal Theme',
		'blueTheme' => 'Academics: Blue Theme',
	)));
}
add_action ('customize_register', 'FoundationPress_customize_register');

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
 
 
/** START CUSTOM META ON PAGE**/

 /**
 * Register meta box(es).
 */
 
 function wpdocs_register_meta_boxes() {
	add_meta_box( 
	'meta-box-id',
	__( 'Page Sub-Header Text', 'textdomain' ),
	'wpdocs_my_display_callback',
	'page', 
	'side' 
	);
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function wpdocs_my_display_callback( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
	wp_nonce_field( basename( __FILE__ ), 'wpdocs_nonce' );
    $wpdocs_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <label for="meta-text" class="wpdocs-row-title"><?php _e( 'The text you type below will apear under the page title in the featured banner', 'wpdocs-textdomain' )?></label> 
		<br>
        <input style="width:100%; height: 6em; vertical-align:text-top; margin-top:2em;" type="text" name="meta-text" value="<?php if ( isset ( $wpdocs_stored_meta['meta-text'] ) ) echo $wpdocs_stored_meta['meta-text'][0]; ?>" />
    </p>
    <?php
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function wpdocs_save_meta_box( $post_id ) {
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'wpdocs_nonce' ] ) && wp_verify_nonce( $_POST[ 'wpdocs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
    if ( isset( $_POST[ 'job_id' ] ) ) {
    	update_post_meta( $post_id, 'job_id', sanitize_text_field( $_POST[ 'job_id' ] ) );
    }
}
add_action( 'save_post', 'wpdocs_save_meta_box' );



/**END OF CUSTOM META BOX IN PAGE **/