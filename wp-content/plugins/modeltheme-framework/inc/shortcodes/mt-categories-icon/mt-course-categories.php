<?php 
require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

function mt_affiliate_course_categ($params,  $content = NULL) {
    extract( shortcode_atts( 
        array(
          'number_columns'     => ''
        ), $params ) );

    $html = '';
      $html .= '<div class="course-categories-wrapper row">';
        $html .= '<div class="mt-categories-content mt_'.esc_attr($number_columns).'">';       
            $html .= do_shortcode($content);
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}
add_shortcode('mt_affiliate_course_categ_short', 'mt_affiliate_course_categ');
/**
||-> Shortcode: Child Shortcode v1
*/
function mt_affiliate_course_categ_items($params, $content = NULL) {

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
        if ($banner_groups) {
          foreach($banner_groups as $param){

            $image_attributes = wp_get_attachment_image_src( $param['use_img'], 'linify_skill_counter_65x65' );

            $html .= '<div class="single-item-icon">';
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
                       $html .= '<div class="icon_item_name" style=" color: '.$param['title_color'].'!important;">'.$param['icon_title'].'</div>';
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
add_shortcode('mt_affiliate_course_categ_short_item', 'mt_affiliate_course_categ_items');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

  require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  vc_map( array(
      "name" => esc_attr__("MT - Featured Boxed2", 'modeltheme'),
      "base" => "mt_affiliate_course_categ_short",
      "as_parent" => array('only' => 'mt_affiliate_course_categ_short_item'), 
      "content_element" => true,
      "show_c_on_create" => true,
     "icon" => "smartowl_shortcode",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
      "is_container" => true,
      "params" => array(
          array(
              "group" => "Options",
              "type" => "dropdown",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Number of columns",'modeltheme'),
              "param_name" => "number_columns",
              "std" => '',
              "value" => array(
                  esc_attr__('2 Columns', 'modeltheme')  => 'col-md-6',
                  esc_attr__('3 Columns', 'modeltheme')  => 'col-md-4',
                  esc_attr__('4 Columns', 'modeltheme')  => 'col-md-3',
              )
          ),  
      ),
      "js_view" => 'VcColumnView'
  ) );
  vc_map( array(
      "name" => esc_attr__("Single Featured Boxed", 'modeltheme'),
      "base" => "mt_affiliate_course_categ_short_item",
      "content_element" => true,
      "as_child" => array('only' => 'mt_affiliate_course_categ_short'),
      "params" => array(
        array(
            "group"        => esc_attr__( "Settings", 'modeltheme' ),
            'type' => 'param_group',
            'value' => '',
            'param_name' => 'banner_groups',
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
          )     
        )
  ) );
  //Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
      class WPBakeryShortCode_mt_affiliate_course_categ_short extends WPBakeryShortCodesContainer {
      }
  }
  if ( class_exists( 'WPBakeryShortCode' ) ) {
      class WPBakeryShortCode_mt_affiliate_course_categ_short_item extends WPBakeryShortCode {
      }
  }
}
