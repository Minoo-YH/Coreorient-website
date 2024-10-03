<?php 

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');


/**

||-> Shortcode: Events Timeline

*/
function modeltheme_shortcode_events($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'    => '',
            'animation'    => ''
        ), $params ) );


    $args_recenposts = array(
        'posts_per_page'   => $number,
        'post_type'        => 'mt_event',
        'order'            => 'ASC',
        'orderby'          => 'meta_value_num',
        'meta_query' => array(
            array(
                'key' => 'smartowl_event_date',
                'compare' => '<=',
                'value' => time(), // Current timestamp.

            ),
        ),
        'post_status'      => 'publish' 
    ); 
    $recentposts = get_posts($args_recenposts);

    $i = 0;
    $j = 0;
    $html = '';

    $html .= '<div class="mt--events mt-horizontal-timeline wow '.$animation.'">';
        $html .= '<div class="timeline">';
            $html .= '<div class="events-wrapper">';
                $html .= '<div class="events">';
                    $html .= '<ol>';

                    foreach ($recentposts as $post) {

                    

                        $i++;
                        if ($i == 1) {
                            $selected = 'selected';
                        }else{
                            $selected = '';
                        }
                        $date = get_post_meta( $post->ID, 'smartowl_event_date', true );

                        $html .= '<li class="id-'.$post->ID.'"><a href="#0" data-date="'.date("d/m/Y", strtotime($date)).'" class="'.$selected.'">'.date("d M", strtotime($date)).'</a></li>';
                    }
                    $html .= '</ol>';

                    $html .= '<span class="filling-line" aria-hidden="true"></span>';
                $html .= '</div>';
            $html .= '</div>';
                
            $html .= '<ul class="mt-timeline-navigation">';
                $html .= '<li><a href="#0" class="prev inactive">Prev</a></li>';
                $html .= '<li><a href="#0" class="next">Next</a></li>';
            $html .= '</ul>';
        $html .= '</div>';




        $html .= '<div class="events-content">';
            $html .= '<ol>';

            foreach ($recentposts as $post) {

                $j++;
                if ($j == 1) {
                    $selected = 'selected';
                }else{
                    $selected = '';
                }

                #Content
                $content_post = get_post($post->ID);
                $content = $content_post->post_content;
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]&gt;', $content);
                $date = get_post_meta( $post->ID, 'smartowl_event_date', true );
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'connection_portfolio01_390x275' );

                $html .= '<li class="'.$selected.'" data-date="'.date("d/m/Y", strtotime($date)).'">';
                    $html .= '<div class="col-md-5 timeline_image_holder">';
                        if($thumbnail_src) { 
                            $html .= '<img src="'. $thumbnail_src[0] . '" alt="'. $post->post_title .'" />';
                        }else{ 
                            $html .= '<img src="http://placehold.it/390x275" alt="'. $post->post_title .'" />'; 
                        }
                    $html .= '</div>';
                    $html .= '<div class="col-md-7 timeline_text_holder">';
                        $html .= '<em>'.date("F j, Y", strtotime($date)).'</em>';
                        $html .= '<h3>'.$post->post_title.'</h3>';
                        //$html .= '<em>'.get_the_date( 'F j, Y', $post->ID ).'</em>';
                        $html .= '<p>'.modeltheme_excerpt_limit($content, 25).'</p>';
                    $html .= '</div>';
                $html .= '</li>';

            }
            $html .= '</ol>';
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}
add_shortcode('shortcode_events_timeline', 'modeltheme_shortcode_events');




/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    vc_map( 
        array(
            "name" => esc_attr__("MT - Events Timeline", 'modeltheme'),
            "base" => "shortcode_events_timeline",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                   "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Number of events to show", 'modeltheme'),
                   "param_name" => "number",
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
        )
    );
}
?>