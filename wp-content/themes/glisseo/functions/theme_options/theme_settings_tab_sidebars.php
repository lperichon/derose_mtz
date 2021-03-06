<?php
/**
 * Initializes the theme's input example by registering the Sections,
 * Fields, and Settings. This particular group of options is used to demonstration
 * validation and sanitization.
 *
 * This function is registered with the 'admin_init' hook.
 */ 
function tb_glisseo_theme_initialize_sidebar_options() {

	if( false == get_option( 'tb_glisseo_theme_sidebar_options' ) ) {	
		add_option( 'tb_glisseo_theme_sidebar_options' );
	} // end if

	add_settings_section(
		'sidebar_options_section',
		'sidebars',
		'tb_glisseo_sidebar_options_callback',
		'tb_glisseo_theme_sidebar_options'
	);
	
	add_settings_field(
		'sidebar_builder',
		'sidebars',
		'tb_glisseo_sidebar_build_callback',
		'tb_glisseo_theme_sidebar_options',
		'sidebar_options_section',
		array(
			'sidebar_builder','tb_glisseo_theme_sidebar_options','Activate this setting to display the header.'
		)
	);
	
	register_setting(
		'tb_glisseo_theme_sidebar_options',
		'tb_glisseo_theme_sidebar_options',
		'tb_glisseo_theme_validate_sidebar_options'
	);

} // end tb_glisseo_theme_initialize_sidebar_options
add_action( 'admin_init', 'tb_glisseo_theme_initialize_sidebar_options' );


/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */ 
/**
 * This function provides a simple description for the Input Examples page.
 *
 * It's called from the 'tb_glisseo_theme_intialize_sidebar_options_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function tb_glisseo_sidebar_options_callback() {
	echo '<p>Build unlimited sidebars here. Insert a human readable <strong>name</strong></p><p>After saving you will find all Sidebars inside the "Appearance" -> "Widgets" at the bottom of the sidebar list on the right side of the screen.</p>';
} // end tb_glisseo_general_options_callback


/* ------------------------------------------------------------------------ *
 * Setting Callbacks
 * ------------------------------------------------------------------------ */ 
 
 /**
 * Sanitization callback for the social options. Since each of the social options are text inputs,
 * this function loops through the incoming option and strips all tags and slashes from the value
 * before serializing it.
 *	
 * @params	$input	The unsanitized collection of options.
 *
 * @returns			The collection of sanitized values.
 */
function tb_glisseo_theme_validate_sidebar_options( $input ) {

	// Create our array for storing the validated options
	$output = array();
	
	// Loop through each of the incoming options
	
	if(is_array($input))
	foreach( $input as $key => $value ) {
		
		// Check to see if the current option has a value. If so, process it.
		if( isset( $input[$key] ) ) {
		
			// Strip all HTML and PHP tags and properly handle quoted strings
			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
			
		} // end if
		
	} // end foreach
	
	// Return the array processing any additional functions filtered by this action
	return apply_filters( 'tb_glisseo_theme_validate_sidebar_options', $output, $input );

} // end tb_glisseo_theme_validate_sidebar_options
