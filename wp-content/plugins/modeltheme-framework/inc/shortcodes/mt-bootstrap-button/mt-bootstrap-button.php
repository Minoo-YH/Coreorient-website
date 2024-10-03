<?php


/**

||-> Shortcode: Bootstrap Buttons

*/
function modeltheme_btn_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'btn_text'                 => '',
            'btn_url'                  => '',
            'btn_size'                 => '',
            'align'                    => '',
            'gradient_color_1'         => '',
            'gradient_color_2'         => '',
            'text_color'               => '',
            'btn_format'             => '',
            'btn_format_rounded_radius'             => '',
        ), $params ) ); 

    $id_selector = 'btn_custom_'.uniqid();

    $content .= '<style type="text/css">
                .modeltheme_button .'.$id_selector.' {
                  background: '.esc_attr($gradient_color_1).' !important; /* Old browsers */
                  transform: scale(1.0);
                  transition: all 300ms ease-in-out 0s;
                  -ms-transformtransition: all 300ms ease-in-out 0s;
                  -webkit-transformtransition: all 300ms ease-in-out 0s;
                }
                .modeltheme_button .button-winona:hover,
                .modeltheme_button .button-winona::before, 
                .modeltheme_button .button-winona::after {
                  background: '.$gradient_color_2.' !important;
                  transition: all 300ms ease-in-out 0s;
                  -ms-transformtransition: all 300ms ease-in-out 0s;
                  -webkit-transformtransition: all 300ms ease-in-out 0s;
                }
              </style>';

    $style = '';
    if (!empty($text_color)) {
      $style = 'color:' . $text_color . ';';
    }
    
    $style_radius = '';
    if (!empty($btn_format_rounded_radius)) {
      $style_radius = 'border-radius:' . $btn_format_rounded_radius . ';';
    }



    $content .= '<div class="'.$align.' modeltheme_button wow ">';
        $content .= '<a href="'.$btn_url.'" class="button-winona '.$btn_size.' '.$id_selector.'" style="'.$style.' ' .$style_radius.'">'.$btn_text.'</a>';
    $content .= '</div>';
    return $content;
}
add_shortcode('mt-bootstrap-button', 'modeltheme_btn_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  vc_map( 
    array(
        "name" => esc_attr__("MT - Button", "modeltheme"),
        "base" => "mt-bootstrap-button",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "icon" => "smartowl_shortcode",
        "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Button text", "modeltheme" ),
            "param_name" => "btn_text",
            "value" => esc_attr__( "Shop now", "modeltheme" )
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Button url", "modeltheme" ),
            "param_name" => "btn_url",
            "value" => esc_attr__( "#", "modeltheme" )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__("Button size", "modeltheme"),
            "param_name" => "btn_size",
            "value" => array(
                esc_attr__('Small', "modeltheme")   => 'btn btn-sm',
                esc_attr__('Medium', "modeltheme")  => 'btn btn-medium',
                esc_attr__('Large', "modeltheme")   => 'btn btn-lg'
            ),
            "std" => 'normal',
            "holder" => "div",
            "class" => ""
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_attr__("Alignment", "modeltheme"),
            "param_name" => "align",
            "value" => array(
                esc_attr__('Left', "modeltheme")   => 'text-left',
                esc_attr__('Center', "modeltheme") => 'text-center',
                esc_attr__('Right', "modeltheme")  => 'text-right'
            ),
            "std" => 'normal',
            "holder" => "div",
            "class" => ""
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Choose custom background color", 'modeltheme' ),
            "param_name" => "gradient_color_1",
            "value" => '#FFBA41', //Default color
            "description" => esc_attr__( "Choose background color", 'modeltheme' )
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Choose custom background color hover", 'modeltheme' ),
            "param_name" => "gradient_color_2",
            "value" => '#151515', //Default color
            "description" => esc_attr__( "Choose background color", 'modeltheme' )
         ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "class" => "",
            "heading" => esc_attr__( "Text color", 'modeltheme' ),
            "param_name" => "text_color",
            "value" => '#ffffff', //Default color
            "description" => esc_attr__( "Choose text color", 'modeltheme' )
         ),
        array(
          "group" => "Styling",
          "type" => "dropdown",
          "heading" => esc_attr__("Button Format", 'modeltheme'),
          "param_name" => "btn_format",
          "value" => array(
            esc_attr__('Square', 'modeltheme')   => 'btn-square',
            esc_attr__('Rounded', 'modeltheme')   => 'btn-rounded',

            ),
          "std" => 'normal',
          "holder" => "div",
          "class" => "",
          "description" => ""
        ),
         array(
            "group" => "Styling",
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Button Rounded - Border Radius", 'modeltheme' ),
            "param_name" => "btn_format_rounded_radius",
            "value" => "",
             "dependency" => array(
               'element' => 'btn_format',
               'value' => array( 'btn-rounded' ),
             ),
            "description" => esc_attr__( "Example: 3px 3px 3px 3px", 'modeltheme' ),
         )
    )
));
}