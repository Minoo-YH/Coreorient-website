<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');


/**

||-> Shortcode: Members Slider

*/

function modeltheme_shortcode_members_fancy_slider($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation' =>'',
            'number'    =>'',
            'color_member'     =>''
        ), $params ) );


    $html = '';
    $html .= '<style type="text/css" scoped>
                .navbutton--next svg polyline {
                  stroke: '.$color_member.' !important;
                }
                .navbutton--prev svg polyline {
                  stroke: '.$color_member.' !important;
                }
              </style>';
    $html .= '<div class="deco deco--title"></div>
            <div id="mt-members-slideshow" class="mt-members-slideshow">';

    $args_members = array(
        'posts_per_page'   => $number,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'member',
        'post_status'      => 'publish' 
    ); 
    $members = get_posts($args_members);
        
    foreach ($members as $member) {

        #metaboxes
        $metabox_member_position = get_post_meta( $member->ID, 'smartowl_member_position', true );
        $metabox_member_email = get_post_meta( $member->ID, 'smartowl_member_email', true );
        $metabox_member_phone = get_post_meta( $member->ID, 'smartowl_member_phone', true );

        $testimonial_id = $member->ID;
        $content_post   = get_post($member);
        $content        = $content_post->post_content;
        $content        = apply_filters('the_content', $content);
        $content        = str_replace(']]>', ']]&gt;', $content);
        #thumbnail
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $member->ID ),'full' );

        $html .='

                <div class="slide">
                    <h2 class="slide__title slide__title--preview">'. $member->post_title .' - <span class="slide__price" style="color: '.$color_member.'">'.$metabox_member_position.'</span></h2>
                    <div class="slide__item">
                        <div class="slide__inner">
                            <img class="slide__img slide__img--small" src="'. $thumbnail_src[0] . '" alt="'. $member->post_title .'" />
                            <button class="action action--open" style="background: '.$color_member.'" aria-label="View details"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="slide__content">
                        <div class="slide__content-scroller">
                            <img class="slide__img slide__img--large" src="'. $thumbnail_src[0] . '" alt="'. $member->post_title .'" />
                            <div class="slide__details">
                                <h2 class="slide__title slide__title--main">'. $member->post_title .' - <span class="slide__price" style="color: '.$color_member.'">'.$metabox_member_position.'</span></h2>
                                <p class="slide__description">'.$content.'</p>
                            </div>
                        </div>
                    </div>
                </div>

                      ';

    }
    $html .='<button class="action action--close" aria-label="Close"><i class="icon-close"></i></button>';
    $html .='</div>';

    return $html;
}
add_shortcode('mt_members_fancy_slider', 'modeltheme_shortcode_members_fancy_slider');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    
    vc_map( array(
        "name" => esc_attr__("MT - Members Fancy Slider", 'modeltheme'),
        "base" => "mt_members_fancy_slider",
        "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
        "icon" => "smartowl_shortcode",
        "params" => array(
            array(
                "group" => "Options",
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_attr__( "Number of members", 'modeltheme' ),
                "param_name" => "number",
                "value" => "",
                "description" => esc_attr__( "Enter number of members to show.", 'modeltheme' )
            ),
            array(
              "group" => "Styling",
              "type" => "colorpicker",
              "class" => "",
              "heading" => esc_attr__( "Choose color", 'modeltheme' ),
              "param_name" => "color_member",
              "value" => "", //Default color
              "description" => esc_attr__( "Choose color", 'modeltheme' )
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
            ),
        )
    ));
}






?>