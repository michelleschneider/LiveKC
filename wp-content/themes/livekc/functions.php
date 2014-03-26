<?php
/*
Author: Michelle Schneider
URL: htp://livekc.org
*/


require_once( 'library/bones.php' ); // if you remove this, bones will break
require_once( 'library/custom-post-type.php' ); // you can disable this if you like


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );


add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}



/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} 

/************* STYLESHEETS ********************/
function livekc_styles() {
		wp_register_style( 'sm-font', get_template_directory_uri() . '/css/sm-style.css' );
		wp_register_style( 'ie7', get_template_directory_uri() . '/css/ie7.css' );
				
		wp_enqueue_style( 'sm-font' );
		wp_enqueue_style( 'ie7' );
		
}
add_action('wp_print_styles', 'livekc_styles');

/************* SCRIPTS ********************/
function livekc_js() {
	if (!is_admin()) {
		
	wp_register_script('scrolly', get_template_directory_uri() . '/js/jquery.scrolly.js', 'jquery', '1.0', TRUE);
		wp_register_script('typekit', 'http://use.typekit.net/lgs3yky.js', 'jquery', '1.0', FALSE);
		wp_register_script('jquery171', 'http://code.jquery.com/jquery-1.7.1.min.js', 'jquery', '1.7.1', TRUE);
			
		wp_enqueue_script('scrolly');
		wp_enqueue_script('typekit');
		wp_enqueue_script('jquery171');
		
		
	}
}
add_action('init', 'livekc_js');

?>