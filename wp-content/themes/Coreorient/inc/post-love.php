<?php
/**
DISPLAY FUNCTIONS
*/
#outputs the love it link
function eaglewp_li_love_link($love_text = null, $loved_text = null) {

	global  $user_ID,  $post;

	#only show the link when user is logged in and on a singular page
	$link = '';
	if( is_user_logged_in() ) {

		ob_start();
	
		#retrieve the total love count for this item
		$love_count = eaglewp_li_get_love_count( $post->ID );
		if (empty($love_count)) {
			$love_count = 0;
		}
		
		#our wrapper DIV
		echo '<div class="love-it-wrapper">';
		
			$love_text = is_null( $love_text ) ? '<i class="fa fa-heart-o"></i><br />' : $love_text;
			$loved_text = is_null( $loved_text ) ? '<i class="fa fa-heart-o"></i><br />' : $loved_text;
			
			#only show the Love It link if the user has NOT previously loved this item
			if( ! eaglewp_li_user_has_loved_post( $user_ID, get_the_ID() ) ) {
				echo '<a href="#" class="love-it" data-post-id="' . get_the_ID() . '" data-user-id="' .  esc_attr( $user_ID ) . '">' . esc_html($love_text ). '</a> <span class="love-count">' . esc_html($love_count) . '</span>';
			} else {
				#show a message to users who have already loved this item
				echo '<span class="loved">' . esc_html($loved_text) . '<span class="love-count">' . esc_html($love_count) . '</span></span>';
			}
		
		#close our wrapper DIV
		echo '</div>';

		#append our "Love It" link to the item content.
		$link = ob_get_clean();
	}
	return $link;
}


#adds the Love It link and count to post/page content automatically
function eaglewp_li_display_love_link( $content ) {

	// $types = apply_filters( 'eaglewp_li_display_love_links_on', array() );
	$types = apply_filters( 'eaglewp_li_display_love_links_on', array( 'post' ) );

	if( is_singular( $types ) && is_user_logged_in() ) {
		$content .= eaglewp_li_love_link();
	}
	return $content;
}
add_filter( 'the_content', 'eaglewp_li_display_love_link', 100 );


/**
LOVE FUNCTIONS
*/
#check whether a user has loved an item
function eaglewp_li_user_has_loved_post($user_id, $post_id) {

	#get all item IDs the user has loved
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved) && in_array($post_id, $loved)) {
		return true; #user has loved post
	}
	return false; #user has not loved post
}

#adds the loved ID to the users meta so they can't love it again
function eaglewp_li_store_loved_id_for_user($user_id, $post_id) {
	$loved = get_user_option('li_user_loves', $user_id);
	if(is_array($loved)) {
		$loved[] = $post_id;
	} else {
		$loved = array($post_id);
	}
	update_user_option($user_id, 'li_user_loves', $loved);
}

#increments a love count
function eaglewp_li_mark_post_as_loved($post_id, $user_id) {

	#retrieve the love count for $post_id	
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		$love_count = $love_count + 1;
	else
		$love_count = 1;
	
	if(update_post_meta($post_id, '_li_love_count', $love_count)) {	
		#store this post as loved for $user_id	
		eaglewp_li_store_loved_id_for_user($user_id, $post_id);
		return true;
	}
	return false;
}

#returns a love count for a post
function eaglewp_li_get_love_count($post_id) {
	$love_count = get_post_meta($post_id, '_li_love_count', true);
	if($love_count)
		return $love_count;
	return 0;
}

#processes the ajax request
function eaglewp_li_process_love() {
	if ( isset( $_POST['item_id'] ) && wp_verify_nonce($_POST['love_it_nonce'], 'love-it-nonce') ) {
		if(eaglewp_li_mark_post_as_loved($_POST['item_id'], $_POST['user_id'])) {
			echo esc_attr__('loved','eaglewp');
		} else {
			echo esc_attr__('failed','eaglewp');
		}
	}
	die();
}
add_action('wp_ajax_love_it', 'eaglewp_li_process_love');


/**
SCRIPTS
*/
function eaglewp_li_front_end_js() {
	if(is_user_logged_in()) {
		wp_localize_script( 'love-it', 'love_it_vars', 
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce('love-it-nonce'),
				'already_loved_message' => esc_attr__('You have already loved this item.', 'eaglewp'),
				'error_message' => esc_attr__('Sorry, there was a problem processing your request.', 'eaglewp')
			) 
		);	
	}
}
add_action('wp_enqueue_scripts', 'eaglewp_li_front_end_js');
?>