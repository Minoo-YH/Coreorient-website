<?php 

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**
||-> Shortcode: Events Timeline
*/
function mt_shortcode_jobs($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'           =>'',
            'number'              =>''
        ), $params ) );


    $html = '';
        
    $html .= '<section id="grid" class="mt_jobs row wow '.$animation.' grid clearfix">';
        $args = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'mt_job',
                'post_status'      => 'publish' 
            ); 
        $posts = get_posts($args);

        foreach ($posts as $post) {
            #thumbnail
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'mt_320x480' );
            
            $html.='<article class="single_mt_job col-md-4">
                        <a href="'.get_permalink($post->ID).'" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
                            <figure>';
                                if($thumbnail_src) { 
                                    $html .= '<img class="blogpost01_thumbnail" src="'. $thumbnail_src[0] . '" alt="'. $post->post_title .'" />';
                                }else{
                                    $html .= '<img class="blogpost01_thumbnail" src="http://placehold.it/320x480" alt="'. $post->post_title .'" />'; 
                                }
                        $html.='<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
                                <figcaption>
                                    <h2>'. $post->post_title .'</h2>
                                    <p>'. $post->post_title .'</p>
                                    <button>'.esc_attr__('View Job', 'modeltheme').'</button>
                                </figcaption>
                            </figure>
                        </a>
                    </article>';

        }
    $html .= '</section>';
    return $html;
}
add_shortcode('mt_jobs', 'mt_shortcode_jobs');




/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    //require_once('../vc-shortcodes.inc.arrays.php');
    vc_map( 
        array(
            "name" => esc_attr__("MT - Jobs", 'modeltheme'),
            "base" => "mt_jobs",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                   "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Number of jobs to show", 'modeltheme'),
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
                ),
            )
        )
    );
}
?>