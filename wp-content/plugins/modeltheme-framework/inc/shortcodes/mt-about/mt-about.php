<?php

/**

||-> Shortcode: About

*/
function modeltheme_shortcode_about($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'       =>'',
            'about_image'     =>'',
            'about_text'      =>'',
            'align_section'   =>''
        ), $params ) );


    $thumb1      = wp_get_attachment_image_src($about_image, "connection_about_625x415");
    $thumb1_src  = $thumb1[0];


    $html = '';
    $html .= '<div class="mt--about wow '.$animation.'" >';
        $html .= '<div class="container_about">';
        if($align_section == "text_image") {
            $html .= '<div class="row all_overlay '.$align_section.' about_row">';
                $html .= '<div class="vc_col-md-6">';
                    $html .= '<div class="row about_text_holder">';
                        $html .= '<p class="about_text">'.$about_text.'</p>';
                    $html .= '</div>';
                $html .= '</div>';
                $html .= '<div class="vc_col-md-6">';
                    $html .= '<div class="row image_overlay_holder">';
                        $html .= '<div class="about_overlay"></div>';
                        $html .= '<img class="about_image" src="'.$thumb1_src.'">';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        } elseif ($align_section == "image_text") {
            $html .= '<div class="row all_overlay '.$align_section.' about_row">';
                $html .= '<div class="vc_col-md-6">';
                    $html .= '<div class="row image_overlay_holder">';
                        $html .= '<div class="about_overlay"></div>';
                        $html .= '<img class="about_image" src="'.$thumb1_src.'">';
                    $html .= '</div>';
                $html .= '</div>';
                $html .= '<div class="vc_col-md-6">';

                    $html .= '<div class="row about_text_holder">';
                        $html .= '<p class="about_text">'.$about_text.'</p>';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        }

            
        $html .= '</div>';
        
    $html .= '</div>';
    return $html;
}
add_shortcode('mt_about', 'modeltheme_shortcode_about');




/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
            "name" => esc_attr__("MT - About", 'modeltheme'),
            "base" => "mt_about",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                 array(
                    "group" => "Options",
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Add your description", 'modeltheme' ),
                    "param_name" => "about_text",
                    "value" => "",
                    "description" => esc_attr__( "Enter your description.", 'modeltheme' )
                 ),
                 array(
                    "group" => "Options",
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "About image source url", 'modeltheme' ),
                    "param_name" => "about_image",
                    "value" => "",
                    "description" => ""
                 ),
                 array(
                    "group" => "Options",
                    "type" => "dropdown",
                    "heading" => esc_attr__("Section alignment", 'modeltheme'),
                    "param_name" => "align_section",
                    "std" => '',
                    "holder" => "div",
                    "class" => "",
                    "description" => "Select the text and image alignment",
                    "value" => array(
                      esc_attr__('Text to left and image to the right', 'modeltheme')   => 'text_image',
                      esc_attr__('Image to left and text to the right', 'modeltheme')   => 'image_text'
                    )
                 ),
                 array(
                    "group" => "Animation",
                    "type" => "dropdown",
                    "heading" => esc_attr__("Animation", 'modeltheme'),
                    "param_name" => "animation",
                    "std" => '',
                    "holder" => "div",
                    "class" => "",
                    "description" => "",
                    "value" => $animations_list
                )
            )
        )
    );
}




?>