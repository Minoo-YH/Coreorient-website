<?php

/**

||-> Shortcode: Perspective Slider

*/
function modeltheme_shortcode_perspective_slider($params, $content) {
    extract( 
    	shortcode_atts( 
	        array(
	            'style_mockup'     		=> '',
	            'mockup_title'   		=> '',
	            'mockup_subtitle'   	=> '',
	            'slider_images_small'   => '',
	            'slider_images_big'     => '',
	            'animation'     => ''
	        ), $params 
        )
    );
    

    // SMALL IMAGES -> Mockup 1,2,3
	$images_small = array_map( 'trim', explode( ',', $slider_images_small ) );
    $args_small = array(
        'posts_per_page'   	=> -1,
        'post_type'        	=> 'attachment',
        'post_mime_type' 	=>'image',
    	'post__in' 			=> $images_small
    ); 
    $images_s = get_posts($args_small);
    
    // var_dump($images_s)

    // BIG IMAGES -> Mockup 3
	$images_big = array_map( 'trim', explode( ',', $slider_images_big ) );
    $args_big = array(
        'posts_per_page'   	=> -1,
        'post_type'        	=> 'attachment',
        'post_mime_type' 	=>'image',
    	'post__in' 			=> $images_big
    ); 
    $images_b = get_posts($args_big);



	if ($style_mockup == 'style_mockup_1') {
		$mockup__img = plugin_dir_url( __FILE__ ) . 'style_mockup_1.jpg';
	}elseif($style_mockup == 'style_mockup_2'){
		$mockup__img = plugin_dir_url( __FILE__ ) . 'style_mockup_2.jpg';
	}elseif($style_mockup == 'style_mockup_3'){
		$mockup__img = plugin_dir_url( __FILE__ ) . 'style_mockup_3.jpg';
	}else{
		$mockup__img = plugin_dir_url( __FILE__ ) . 'style_mockup_1.jpg';
	}




    $html = '';
    $html .= '<div id="wrap" class="wrap wow '.$animation.'">
				<div class="mockup '.$style_mockup.'">
					<img class="mockup__img" src="'.$mockup__img.'" />
					<div id="mobile" class="mobile">
						<ul id="slideshow" class="slideshow">';
						    foreach ($images_s as $image_s) {
						        $html .= '<li class="slideshow__item"><img src="' . wp_get_attachment_image_src( $image_s->ID, 'mt_320x480' )[0] . '" alt="Window" /></li>';
						        // $html .= '<li class="slideshow__item"><img src="' . $image_s->guid . '" alt="Window" /></li>';
						    }
				$html .= '</ul>
					</div>';

					if ($style_mockup == 'style_mockup_3') {
						$html .= '<div class="screen">
							<ul id="slideshow-2" class="slideshow">';
							    foreach ($images_b as $image_b) {
							        $html .= '<li class="slideshow__item"><img src="' . wp_get_attachment_image_src( $image_s->ID, 'mt_1250x700' )[0] . '" alt="Window" /></li>';
							        // $html .= '<li class="slideshow__item"><img src="' . $image_b->guid . '" alt="Window" /></li>';
							    }
				  $html .= '</ul>
						</div>';
					}



					$html .= '<header class="mockup-header">
						<h1>'.$mockup_title.'<i>'.$mockup_subtitle.'</i></h1>
					</header>
				</div>
			</div>

				<div class="clearfix"></div>
    ';
	    
    return $html;
}
add_shortcode('perspective_slider', 'modeltheme_shortcode_perspective_slider');




/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

	vc_map( array(
		"name" => esc_attr__("MT - Perspective Mockup Slider (BETA)", 'modeltheme'),
		"base" => "perspective_slider",
		"category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
		"icon" => "smartowl_shortcode",
		"params" => array(
			array(
				"group" => "Options",
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__("Select style type", 'modeltheme'),
				"param_name" => "style_mockup",
				"description" => esc_attr__("Please choose style type", 'modeltheme'),
				"std" => 'Default value',
				"value" => array(
					esc_attr__('Background Mockup 1', 'modeltheme')   => 'style_mockup_1',
					esc_attr__('Background Mockup 2', 'modeltheme')   => 'style_mockup_2',
					esc_attr__('Background Mockup 3', 'modeltheme')   => 'style_mockup_3'
				)
			),
			array(
				"group" => "Options",
				"dependency" => array(
					'element' => 'style_mockup',
					'value' => array( 
						'style_mockup_1', 
						'style_mockup_2', 
						'style_mockup_3'
					),
				),
				"value" => "",
				"type" => "attach_images",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__( "Sliding Images (Small)", 'modeltheme' ),
				"param_name" => "slider_images_small",
				"description" => esc_attr__( "Enter one or multiple images at once. (Recommended resolution: 320×480px)", 'modeltheme' )
			),
			array(
				"group" => "Options",
				"dependency" => array(
					'element' => 'style_mockup',
					'value' => array( 'style_mockup_3' ),
				),
				"type" => "attach_images",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__( "Sliding Images (large)", 'modeltheme' ),
				"param_name" => "slider_images_big",
				"value" => "",
				"description" => esc_attr__( "Enter one or multiple images at once. (Recommended resolution: 1280×800px)", 'modeltheme' )
			),
			array(
				"group" => "Options",
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__("Mockup Title (Heading)", 'modeltheme'),
				"param_name" => "mockup_title",
				"value" => esc_attr__("Connection", 'modeltheme'),
				"description" => ""
			),
			array(
				"group" => "Options",
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_attr__("Mockup Subtitle", 'modeltheme'),
				"param_name" => "mockup_subtitle",
				"value" => esc_attr__("Creative WordPress Theme for Creative Agencies", 'modeltheme'),
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