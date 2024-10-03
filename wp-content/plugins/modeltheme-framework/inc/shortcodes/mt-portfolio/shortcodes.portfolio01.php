<?php 


/**

||-> Shortcode: Portfolio 01

*/
function modeltheme_shortcode_portfolio01($params) {
    extract( shortcode_atts( 
        array(
            'animation'     => '',
            'texts_color'     => '',
            'number'        => ''
        ), $params ) );



    // ENQUEUE INLINE STYLE
    wp_enqueue_style(
       'modeltheme-custom-inline-style',
        site_url() . '/wp-content/plugins/modeltheme-framework/css/mt-custom-editor-style.css'
    );
    $inline_style = '';
    $inline_style .= '.portfolio-bottom-description label, 
                      .portfolio-bottom-description i {
                          color: '.$texts_color.' !important;
                          font-weight: 400;
                          margin-right: 5px;
                      }';
    wp_add_inline_style( 'modeltheme-custom-inline-style', $inline_style );





    $posts_calendar = '';
    $posts_calendar .= '<div class="mt--portfolio mt-portfolio01">';

    $args_recenposts = array(
        'posts_per_page'   => $number,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'portfolio',
        'post_status'      => 'publish' 
    ); 

    $recentposts = get_posts($args_recenposts);
    foreach ($recentposts as $post) {
        #Content
        $content_post = get_post($post->ID);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        #Author
        $post_author_id = get_post_field( 'post_author', $post->ID );
        $user_info = get_userdata($post_author_id);
    	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'connection_1420x140' );


        $posts_calendar .= '

        <article class="single-portfolio id-'.$post->ID.'">
            <form method="GET" class="form_portfolio">
                <input type="hidden" value="'.$post->ID.'" name="post_id" />

    	        <div class="single-portfolio-holder">
                    <div class="col-md-12 get-portfolio-details">';



    					// if($thumbnail_src) { 
    					// 	$posts_calendar .= '<img class="thumbnail" src="'. $thumbnail_src[0] . '" alt="" />';
    					// }



    	$posts_calendar .= '<div class="portfolio-name">
                            <h4>'. $post->post_title .'<i class="icon-plus"></i></h4>
    	                </div>

    	            </div>
    	        </div>

                <div class="clearfix"></div>
                <div class="container ajax-result result-'.$post->ID.'"></div>
            </form>

        </article>';


    }
    $posts_calendar .= '</div>';


    return $posts_calendar;
}
add_shortcode('shortcode_portfolio01', 'modeltheme_shortcode_portfolio01');
add_action('wp_enqueue_scripts', 'modeltheme_shortcode_portfolio01' );


if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    //require_once('../vc-shortcodes.inc.arrays.php');

    vc_map( 
        array(
            "name" => esc_attr__("MT - Portfolio", 'modeltheme'),
            "base" => "shortcode_portfolio01",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                   "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Number of portfolios to show", 'modeltheme'),
                   "param_name" => "number",
                   "value" => "5",
                   "description" => ""
                ),
                array(
                   "group" => "Styling",
                   "type" => "colorpicker",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Texts color", 'modeltheme'),
                   "param_name" => "texts_color",
                   "value" => "",
                   "description" => "Default: #00AFEF"
                ),
            )
        )
    );
}



// AJAX FUNCTION FOR Portfolio01 Shortcode
function mt_portfolio01() {

    $post_id = $_GET['post_id'];
    $content_post = get_post($post_id);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ),'full' );

    $html = '';
    $html .= '
    <div class="portfolio-post-40 mt-ajax-content">

        <div class="close-ajax-content">
            <i class="icon-close"></i>
        </div>

        <!-- <h1>'.get_the_title($post_id).'</h1> -->
        <div class="row">
            <div class="col-md-12">

                <div class="post-thumbnails col-md-12">';

                    if($thumbnail_src) { 
                        $html .= '<img class="portfolio-single-pic thumbnail" src="'. $thumbnail_src[0] . '" alt="" />';
                    }

                    global $dynamic_featured_image;
                    $featured_images = $dynamic_featured_image->get_featured_images( $post_id );

                    //Loop through the image to display your image
                    if( !is_null($featured_images) ){

                        $links = array();

                        foreach($featured_images as $images){
                            $thumb = $images['thumb'];
                            $fullImage = $images['full'];

                            $links[] = "<img class='portfolio-single-pic' src='{$fullImage}' />";
                        }

                        $html .= "<div class='dfiImages'>";
                        foreach($links as $link){
                          $html .= $link;
                        }                
                        $html .= "</div>";
                     } 

                $html .= '</div>



                <div class="clearfix"></div>
                <div class="portfolio-bottom-icons">
                    <ul class="text-center">
                        <a href="#">
                            <i class="icon-share"></i> <br />
                            <h4>'.esc_attr__('Share','modeltheme').'</h4>
                        </a>
                        <a href="#" class="print-portfolio" onclick="window.print();">
                            <i class="icon-printer"></i> <br />
                            <h4>'.esc_attr__('Print page','modeltheme').'</h4>
                        </a>
                    </ul>
                </div>


                <div class="clearfix"></div>
                <div class="portfolio-bottom-description">
                    <div class="col-md-8">
                        <h3 class="post-name">'.get_the_title($post_id).'</h3>
                        '.$content.'
                    </div>
                    <div class="col-md-4">
                        <h3 class="post-name">'.esc_attr__('Project Details ','modeltheme').'</h3>
                        <p><i class="icon-calendar"></i> <label>'.esc_html__('Completed:','modeltheme').'</label>'.get_the_date('F j, Y', $post_id).'</p>
                        <p>
                            <i class="icon-user"></i>
                            <label>'.esc_html__('Client:','modeltheme').'</label> '.get_post_meta( $post_id, 'smartowl_client_name', true ).'
                        </p>
                        <p>
                            <i class="icon-tag"></i>
                            '.get_the_term_list( $post_id, 'portfolios', '<label>Category:</label>', ', ' ).'
                        </p>
                        <p>
                            <i class="icon-bulb"></i>
                            '.get_the_term_list( $post_id, 'portfolioskill', '<label>Skill:</label>', ', ' ).'
                        </p>
                        <p><i class="icon-link"></i> <label>'.esc_html__('Live demo:','modeltheme').'</label> <a href="'.get_permalink($post_id).'">View Demo</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>';

    echo $html;

    die();
}
// Add the ajax hooks for admin
add_action( 'wp_ajax_mt_portfolio01', 'mt_portfolio01' );
// Add the ajax hooks for front end
add_action( 'wp_ajax_nopriv_mt_portfolio01', 'mt_portfolio01' );

?>