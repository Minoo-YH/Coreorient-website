<?php

/**

||-> Shortcode: Skills

*/
function modeltheme_skills_shortcode($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'     => '', 
            'icon'          => '', 
            'title'         => '',
            'skillvalue'    => '',
            'has_border'    => ''
        ), $params ) );
    $skill = '';
    $skill .= '<div class="stats-block statistics '.esc_attr($has_border).' animateIn" data-animate="'.esc_attr($animation).'">';
        $skill .= '<div class="stats-head">';
            $skill .= '<p class="stat-number skill">';
                $skill .= '<i class="'.esc_attr($icon).'"></i>';
                ////////
            $skill .= '</p>';
        $skill .= '</div>';
        $skill .= '<div class="stats-content percentage" data-perc="'.esc_attr($skillvalue).'">';
            $skill .= '<span class="skill-count">'.esc_attr($skillvalue).'</span>';
            $skill .= '<p>'.esc_attr($title).'</p>';
        $skill .= '</div>';
    $skill .= '</div>';
    return $skill;
}
add_shortcode('mt_skill', 'modeltheme_skills_shortcode');








/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  #SHORTCODE: Skill counter shortcode
  vc_map( array(
     "name" => esc_attr__("MT - Skill counter", 'modeltheme'),
     "base" => "mt_skill",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Icon class", 'modeltheme'),
          "param_name" => "icon",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $fa_list
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Title", 'modeltheme'),
           "param_name" => "title",
           "value" => "",
           "description" => ""
        ),
        array(
           "group" => "Options",
           "type" => "textfield",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Skill value", 'modeltheme'),
           "param_name" => "skillvalue",
           "value" => "",
           "description" => ""
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Bordered", 'modeltheme'),
          "param_name" => "has_border",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => array(
              esc_attr__('Bordered', 'modeltheme')  => 'bordered',
              esc_attr__('Without border', 'modeltheme') => 'unbordered',
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
  ));
}