<?php

/**

||-> Shortcode: Services Activities

*/
function modeltheme_service_activity_shortcode ( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'number'             => '',
            'animation'          => '',
            'icon_hover_color'   => '',
            'columns'            => ''
        ), $params ) );

        $args_recenposts = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'service',
                'post_status'      => 'publish' 
                );
        $recentposts = get_posts($args_recenposts);
    $shortcode_content  = "";
    $shortcode_content .= '<div class="activities row wow '.$animation.'">';

     
    $shortcode_content .= '<style>
                .activities-content:hover .shop_feature_icon_v3 i {
                    background: '.$icon_hover_color.' none repeat scroll 0 0;
                }  
              </style>';
        $counter = 0;
        foreach ($recentposts as $post) {
            $counter++;
            // $activities_icon = get_post_meta( $post->ID, 'smartowl_service_badge_icon', true );
            // $activities_badge_background_color = get_post_meta( $post->ID, 'smartowl_service_badge_background_color', true );
            $activities_service = $post->ID;
            $content_post   = get_post($activities_service);
            $content        = $content_post->post_content;
            $content        = apply_filters('the_content', $content);
            $content        = str_replace(']]>', ']]&gt;', $content);
            $activities_service_title = get_the_title($activities_service);
            $read_more_src = get_permalink($post->ID);
            $select_font_meta = get_post_meta( $post->ID, 'smartowl_select_font', true );


            $icon = '';
            if ($select_font_meta == 'font-awesome-icons') {
                $icon = get_post_meta( $post->ID, 'smartowl_font-awesome-icons', true );
            }elseif ($select_font_meta == 'simple-line-icons') {
                $icon = get_post_meta( $post->ID, 'smartowl_font-simple-line-icons', true );
            }

            $shortcode_content .= '<div class="item '.esc_attr($columns).'">';
                $shortcode_content .= '<div class="activities-content row">';
                    $shortcode_content .= '<div class="shop_feature_v3 text-center">';
                        $shortcode_content .= '<div class="shop_feature_icon_v3">';
                                    $shortcode_content .= '<i class="'.$icon.'"></i>';
                        $shortcode_content .= '</div>';
                        $shortcode_content .= '<div class="text-center shop_feature_description_v3">';
                            $shortcode_content .= '<h4 class="shop_feature_heading_v3">'.esc_attr($activities_service_title).'</h4>';
                            $shortcode_content .= '<p class="shop_feature_subheading_v3">'.modeltheme_excerpt_limit($content,7).' ...</p>';
                            $shortcode_content .= '<a href="'.esc_url($read_more_src).'" class="shop_feature_readmore_v3">» More</a>';
                        $shortcode_content .= '</div>';
                    $shortcode_content .= '</div>';
                $shortcode_content .= '</div>';
            $shortcode_content .= '</div>';

            if  ($columns=='vc_col-md-3' AND $counter%4 == 0) {
                $shortcode_content .= '<div style="clear: both;"></div>';
            } elseif ($columns=='vc_col-md-4' AND $counter%3 == 0) {
                $shortcode_content .= '<div style="clear: both;"></div>';
            } elseif ($columns=='vc_col-md-6' AND $counter%2 == 0) {
                $shortcode_content .= '<div style="clear: both;"></div>';
            }

                            
        }
    $shortcode_content .= '</div>';
    return $shortcode_content;
}
add_shortcode('service_activity', 'modeltheme_service_activity_shortcode');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

  vc_map( array(
     "name" => esc_attr__("MT - Services Features", 'modeltheme'),
     "base" => "service_activity",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Number of posts to show", 'modeltheme'),
           "param_name" => "number",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Columns"),
           "param_name" => "columns",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            '2 columns'     => 'vc_col-md-6',
            '3 columns'     => 'vc_col-md-4',
            '4 columns'     => 'vc_col-md-3'
           )
        ),
        array(
            "group" => "Styling",
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__("Icons hover color", 'modeltheme'),
            "param_name" => "icon_hover_color",
            "value" => "",
            "description" => ""
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
  ));

}

?>