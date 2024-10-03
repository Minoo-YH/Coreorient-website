<?php

/**

||-> Shortcode: Google map

*/

function modeltheme_shortcode_google_map($params, $content) {
    extract( $get = shortcode_atts( 
        array(
            'animation'     => '',
            'latitude'      => '',
            'longitude'     => '',
            'select_marker' => ''
        ), $params ) );
    //echo $select_marker;
 
    $getMarker = wp_get_attachment_image_src($get["select_marker"], "full");
    $show_marker = $getMarker[0];

    echo $show_marker;
    echo $latitude;
    echo $longitude;
    $content = '';
    $content .= '<div id="google-container"></div>';
    
    return $content;
}
add_shortcode('shortcode_google_map', 'modeltheme_shortcode_google_map');




if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    //require_once('../vc-shortcodes.inc.arrays.php');

    vc_map( 
        array(
            "name" => esc_attr__("MT - Google Maps", 'modeltheme'),
            "base" => "shortcode_google_map",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                   "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Latitude", 'modeltheme'),
                   "param_name" => "latitude",
                   "value" => "40.6700",
                   "description" => ""
                ),
                array(
                   "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Longitude", 'modeltheme'),
                   "param_name" => "longitude",
                   "value" => "-73.9400",
                   "description" => ""
                )
            )
        )
    );
}



?>