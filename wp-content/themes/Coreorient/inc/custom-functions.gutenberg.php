<?php
// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'eaglewp_add_gutenberg_assets' );
/**
 * Load Gutenberg stylesheet.
 */
function eaglewp_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'eaglewp-gutenberg-style', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), false );
    wp_enqueue_style( 
        'eaglewp-gutenberg-fonts', 
        '//fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic,latin-ext,latin|Montserrat:regular,700,latin' 
    ); 
}
?>