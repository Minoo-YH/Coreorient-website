<?php 


/**

||-> Shortcode: Portfolio 02

*/

function modeltheme_shortcode_portfolio02($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'     => '',
            'number'        => '',
            'columns'       => ''
        ), $params ) );
    $html = '';
    $html .= '<div class="grid">';

        $args_recentposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'portfolio',
            'post_status'      => 'publish' 
        ); 

        $recentposts = get_posts($args_recentposts);
        foreach ($recentposts as $portfolio) {
        	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $portfolio->ID ),'connection_portfolio01_390x275' );
            $portfolio_link = get_permalink($portfolio->ID);

            $html .= '<figure class="effect-phoebe '.esc_attr($columns).'">';
                    $html .= '<a class="relative" href="'.$portfolio_link.'">';
                            if($thumbnail_src) { 
                                $html .= '<img class="portfolio_imageeee" src="'. $thumbnail_src[0] . '" alt="'. $portfolio->post_title .'" />';
                            }
                            else {
                               $html .= '<img src="http://placehold.it/275x275" alt="'. $portfolio->post_title .'" />'; 
                           }
                        $html .= '<figcaption>';
                            $html .= '<h3 class="portfolio_title">testtest testtest</h3 class="portfolio_title">';
                        $html .= '</figcaption>';
                    $html .= '</a>';
            $html .= '</figure>';

        }
    $html .= '</div>';


    return $html;
}
add_shortcode('shortcode_portfolio02', 'modeltheme_shortcode_portfolio02');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( array(
     "name" => esc_attr__("MT - Portfolio02", 'modeltheme'),
     "base" => "shortcode_portfolio02",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number of posts", 'modeltheme' ),
            "param_name" => "number",
            "value" => "",
            "description" => esc_attr__( "Enter number of portfolio photo to show.", 'modeltheme' )
         ),
         array(
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
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
     )
    ));
}

?>