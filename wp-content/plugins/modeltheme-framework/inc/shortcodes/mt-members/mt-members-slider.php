<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');


/**

||-> Shortcode: Members Slider

*/

function mt_shortcode_members01($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'=>'',
            'number'=>''
        ), $params ) );


    $html = '';

    $html .= '<div class="vc_row">';
        $html .= '<div class="members-container owl-carousel owl-theme animateIn wow '.$animation.'">';
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
                $member_title = get_the_title( $member->ID );

                $testimonial_id = $member->ID;
                $content_post   = get_post($member);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                #thumbnail
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $member->ID ),'connection_530x600' );
                
                $html.='
                    <div class="item vc_col-md-12 relative">
                        <div class="flex">
                            <div class="vc_col-md-6 vc_col-sm-12 vc_col-xs-12">
                                <div class="memeber01-img-holder">';
                                        if($thumbnail_src) { 
                                            $html .= '<img src="'. $thumbnail_src[0] . '" alt="'. $member->post_title .'" />';
                                        }else{ 
                                            $html .= '<img src="http://placehold.it/700x700" alt="'. $member->post_title .'" />'; 
                                        }
                                $html.='</div>
                            </div>
                            <div class="vc_col-md-6 vc_col-sm-12 vc_col-xs-12 flex">
                                <div class="member01-content">
                                    <div class="member01-content-inside">
                                        <h3 class="member01_position">'.$metabox_member_position.'</h3>
                                        <h2 class="member01_name">'.$member_title.'</h2>
                                        <h4 class="member01_description">'.$content.'<h4>
                                        <p class="member01_email"><i class="fa fa-envelope-o"></i>'.$metabox_member_email.'</p>
                                        <p class="member01_phone"><i class="fa fa-phone"></i>'.$metabox_member_phone.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

            }
    $html .= '</div>
        </div>';
    return $html;
}
add_shortcode('mt_members_slider', 'mt_shortcode_members01');





/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    
    vc_map( array(
        "name" => esc_attr__("MT - Members Slider", 'modeltheme'),
        "base" => "mt_members_slider",
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