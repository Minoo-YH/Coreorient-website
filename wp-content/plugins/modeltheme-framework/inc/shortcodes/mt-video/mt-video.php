<?php

/**

||-> Shortcode: Video

*/

function modeltheme_shortcode_video($params, $content) {

    extract( shortcode_atts( 
        array(
            'animation'                 => '',
            'source_vimeo'              => '',
            'source_youtube'            => '',
            'video_source'              => '',
            'vimeo_link_id'             => '',
            'youtube_link_id'           => '',
            'button_image'              => '',
            'button_icon'               => '',
            'video_style_variant'       => ''
        ), $params ) );

    $thumb      = wp_get_attachment_image_src($button_image, "full");
    $thumb_src  = $thumb[0];
    $thumb2      = wp_get_attachment_image_src($button_icon, "full");
    $thumb_src2  = $thumb2[0];

    $html = '';

    // custom javascript
    $html .= '<script>
                jQuery(document).ready(function() {
                  jQuery(".popup-vimeo-video").magnificPopup({
                  	type:"iframe",
	              	disableOn: 700,
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false
				});


                  jQuery(".popup-vimeo-youtube").magnificPopup({
                  	type:"iframe",
             		disableOn: 700,
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false});
                });
                
              </script>';

      if ($video_style_variant == "video_style_v1") {

        $html .= '<div class="mt_video text-center '.$video_style_variant.'">';
          $html .= '<div class="wow '.esc_attr($animation).'">';
          if ($video_source == 'source_vimeo') {
            $html .= '<a class="popup-vimeo-video" href="https://vimeo.com/'.$vimeo_link_id.'"><img class="buton_image_class" src="'.esc_attr($thumb_src).'" data-src="'.esc_attr($thumb_src).'" alt=""></a>';
            } elseif ($video_source == 'source_youtube') {
              $html .= '<a class="popup-vimeo-youtube" href="https://www.youtube.com/watch?v='.$youtube_link_id.'"><img class="buton_image_class" src="'.esc_attr($thumb_src).'" data-src="'.esc_attr($thumb_src).'" alt=""></a>';
            }
          $html .= '</div>';
        $html .= '</div>';

        return $html;

      } else if($video_style_variant == "video_style_v2"){

        $html .= '<div class="mt_video text-center '.$video_style_variant.'">';
          $html .= '<div class="wow '.esc_attr($animation).' relative">';
          if ($video_source == 'source_vimeo') {
            $html .= '<img alt="'.esc_attr__('Video', 'modeltheme').'" src="'.esc_attr($thumb_src).'">
                       <a class="popup-vimeo-video popup-play-video" href="https://vimeo.com/'.$vimeo_link_id.'" data-src=""><img class="buton_image_class" alt="'. esc_attr__('Video Button', 'modeltheme').'" src="'.esc_attr($thumb_src2).'"></a>';
            } elseif ($video_source == 'source_youtube') {
              if (!$thumb_src == '') {
                  $html .= '<img alt="'.esc_attr__('Video', 'modeltheme').'" src="'.esc_attr($thumb_src).'">';
              }
                  $html .= '<a class="popup-vimeo-youtube popup-play-video" href="https://www.youtube.com/watch?v='.$youtube_link_id.'" data-src=""><img class="buton_image_class" alt="'. esc_attr__('Video Button', 'modeltheme').'" src="'.esc_attr($thumb_src2).'"></a>';
            }
          $html .= '</div>';
        $html .= '</div>';

        return $html;

      } 

}

add_shortcode('shortcode_video', 'modeltheme_shortcode_video');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("MT - Video", 'modeltheme'),
     "base" => "shortcode_video",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
            "group" => "Options",
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__("Style Variant", 'modeltheme'),
            "param_name" => "video_style_variant",
            "std" => '',
            "description" => "",
            "value" => array(
                esc_attr__('Style 1', 'modeltheme')         => 'video_style_v1',
                esc_attr__('Style 2', 'modeltheme')         => 'video_style_v2',
            )
        ),
        array(
          "group" => "Options",
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose image", 'modeltheme' ),
          "param_name" => "button_image",
          "value" => "",
          "description" => esc_attr__( "Choose image for play button", 'modeltheme' )
        ),
        array(
          "group" => "Options",
          "dependency" => array(
           'element' => 'video_style_variant',
           'value' => array( 'video_style_v2' ),
           ),
          "type" => "attach_images",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Choose icon", 'modeltheme' ),
          "param_name" => "button_icon",
          "value" => "",
          "description" => esc_attr__( "Choose icon for play button", 'modeltheme' )
        ),
        array(
           "group" => "Options",
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Video source"),
           "param_name" => "video_source",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            'Youtube'   => 'source_youtube',
            'Vimeo'     => 'source_vimeo',
            )
        ),
        array(
           "group" => "Options",
           "dependency" => array(
           'element' => 'video_source',
           'value' => array( 'source_vimeo' ),
           ),
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Vimeo id link", 'modeltheme'),
           "param_name" => "vimeo_link_id",
           "value" => esc_attr__("", 'modeltheme'),
           "description" => ""
        ),
        array(
           "group" => "Options",
           "dependency" => array(
           'element' => 'video_source',
           'value' => array( 'source_youtube' ),
           ),
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Youtube id link", 'modeltheme'),
           "param_name" => "youtube_link_id",
           "value" => esc_attr__("", 'modeltheme'),
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
        )));
}

?>