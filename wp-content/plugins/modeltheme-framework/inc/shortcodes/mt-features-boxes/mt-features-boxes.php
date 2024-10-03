<?php

/**

||-> Shortcode: Icon List Item

*/
function modeltheme_icon_shortcode( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'tabs_item_service_icon_dropdown'      => '',
            'default_skin_background_color'      => '',
            'icon_description'      => '',
            'icon_title'      => '',
            'list_icon_color'      => '',
            'list_icon_size'      => '',
            'tabs_item_service_icon_fa'         => '',
            'tabs_item_service_icon__lineicons'         => '',
            'description_color'         => '',
            'title_color'         => '',
            'use_img'         => '',

        ), $params ) );
    
    $banner_groups = vc_param_group_parse_atts($params['banner_groups']);


    $html = '';
    $html .= '<div class="single_icon_item icon_column row">';
      if ($banner_groups) {
        foreach($banner_groups as $param){

          $image_attributes = wp_get_attachment_image_src( $param['use_img'], 'linify_skill_counter_65x65' );

          $html .= '<div class="col-md-3 single-item-icon">';

            $html .= '<div class="single_icon_item default-skin" style=" background-color: '.$param['default_skin_background_color'].'!important;">';
               $html .= '<a href="'.$param['banner_url'].'" class="relative">';
                  
                  if($param['tabs_item_service_icon_dropdown'] == 'choosed_img'){
                    $html .= '<img src="'.$image_attributes[0].'" alt="" />';
                  }elseif($param['tabs_item_service_icon_dropdown'] == 'linecons'){
                    wp_enqueue_style( 'vc_linecons' );
                    $html .= '<i style="font-size:'.esc_attr($param['list_icon_size']).'px; color:'.esc_attr($param['list_icon_color']).'" class=" '.esc_attr($param['tabs_item_service_icon__lineicons']).'"></i>';
                  }elseif($param['tabs_item_service_icon_dropdown'] == 'choosed_fontawesome'){
                    wp_enqueue_style( 'vc_font_awesome_5' );
                    $html .= '<i style="font-size:'.esc_attr($param['list_icon_size']).'px; color:'.esc_attr($param['list_icon_color']).'" class=" '.esc_attr($param['tabs_item_service_icon_fa']).'"></i>';
                  }

                  $html .= '<div class="icon_with_title_and_subtit">';
                     $html .= '<h3 class="icon_item_name" style=" color: '.$param['title_color'].'!important;">'.$param['icon_title'].'</h3>';
                     $html .= '<p class="icon_item_description" style=" color: '.$param['description_color'].'!important;">'.$param['icon_description'].'</p>';
                  $html .= '</div>';  
                $html .= '</a>';
            $html .= '</div>';
          $html .= '</div>';
                
        }
      }
    $html .= '</div>';

    return $html;
}
add_shortcode('mt_icon_with_description', 'modeltheme_icon_shortcode');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  vc_map( array(
     "name" => esc_attr__("MT - Features Boxes", 'modeltheme'),
     "base" => "mt_icon_with_description",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
          array(
              "group"        => esc_attr__( "Settings", 'modeltheme' ),
              'type' => 'param_group',
              'value' => '',
              'param_name' => 'banner_groups',
              // Note params is mapped inside param-group:
              'params' => array(
                  array(
                      "type" => "colorpicker",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Box background color", 'modeltheme'),
                      "param_name" => "default_skin_background_color"
                  ),
                  array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Icon library', 'modeltheme' ),
                    'value' => array(
                        'Font Awesome 5'  => 'choosed_fontawesome',
                        'Image' => 'choosed_img',
                        'Linecons' => 'linecons',
                    ),
                    'admin_label' => true,
                    'param_name' => 'tabs_item_service_icon_dropdown',
                    'description' => esc_html__( 'Select icon library.', 'modeltheme' ),
                  ),
                  array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'js_composer' ),
                    'param_name' => 'tabs_item_service_icon_fa',
                    'value' => 'fas fa-adjust',
                    // default value to backend editor admin_label
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'iconsPerPage' => 100,
                        // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                    ),
                    'dependency' => array(
                        'element' => 'tabs_item_service_icon_dropdown',
                        'value' => 'choosed_fontawesome',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
                  ),
                  array(
                      'type' => 'iconpicker',
                      'heading' => esc_html__( 'Icon', 'modeltheme' ),
                      'param_name' => 'tabs_item_service_icon__lineicons',
                      'value' => 'vc_li vc_li-heart',
                      // default value to backend editor admin_label
                      'settings' => array(
                          'emptyIcon' => false,
                          // default true, display an "EMPTY" icon?
                          'type' => 'linecons',
                          'iconsPerPage' => 1000,
                          // default 100, how many icons per/page to display
                      ),
                      'dependency' => array(
                          'element' => 'tabs_item_service_icon_dropdown',
                          'value' => 'linecons',
                          
                      ),
                      'description' => esc_html__( 'Select icon from library.', 'modeltheme' ),
                  ),
                  array(
                      "type" => "attach_image",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Banner Image", 'modeltheme'),
                      "param_name" => "use_img",
                      'dependency' => array(
                        'element' => 'tabs_item_service_icon_dropdown',
                        'value' => 'choosed_img',
                      ),
                      "value" => esc_attr__("#", 'modeltheme')
                  ),
                  array(
                      "type" => "colorpicker",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Icon Color", 'modeltheme'),
                      'dependency' => array(
                        'element' => 'tabs_item_service_icon_dropdown',
                        'value' => array('choosed_fontawesome', 'linecons'),
                    ),
                    "param_name" => "list_icon_color"
                  ),
                  array(
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Icon Size (px)", 'modeltheme'),
                      "param_name" => "list_icon_size",
                      "value" => "",
                      "description" => "Default: 18(px)"
                  ),
                  array(
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Title", 'modeltheme'),
                      "param_name" => "icon_title",
                      "value" => esc_attr__("Set additional title", 'modeltheme')
                  ),
                  array(
                      "type" => "colorpicker",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Title Color", 'modeltheme'),
                      "param_name" => "title_color"
                  ),
                  array(
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Subtitle", 'modeltheme'),
                      "param_name" => "icon_description",
                      "value" => esc_attr__("Set additional description", 'modeltheme')
                  ),
                  array(
                      "type" => "colorpicker",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Subtitle Color", 'modeltheme'),
                      "param_name" => "description_color"
                  ),
                  array(
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_attr__("Link", 'modeltheme'),
                      "param_name" => "banner_url",
                      "value" => esc_attr__("#", 'modeltheme')
                  ),
              )
          ),
     )
  ));  
}