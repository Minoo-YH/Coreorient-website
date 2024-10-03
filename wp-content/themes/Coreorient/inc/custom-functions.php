<?php

function eaglewp_header_title_breadcrumbs(){

    $html = '';
    $html .= '<div class="header-title-breadcrumb relative">';

        //$featured_image = the_post_thumbnail( $page->ID, 'thumbnail' );

        // SINGLE JOB
        if (is_singular('mt_job')) {

            $date_current = time(); // or your date as well
            $date_post = strtotime(get_post_meta( get_the_ID(), 'mt_job_listing_expiry_date', true ));
            $date = $date_post - $date_current;
            $date = floor($date/(60*60*24));
            if ($date >= 0) {
                $date_text = esc_attr('This Job Position Expires in ', 'eaglewp') . esc_attr($date) . esc_attr(' Days', 'eaglewp');
            }else{
                $date_text = esc_attr('Thank you for your interest! We already found the right person!', 'eaglewp');
            }

            if(eaglewp_redux('mt_post_featured_image')){
                
                if(has_post_thumbnail()) {
                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'eaglewp_1150x400' ); 
                    if($thumbnail_src) {
                        $html .= '<img src="'.esc_url($thumbnail_src[0]).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />';
                    }
                }
                $html .= '<div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.get_the_title().'</h1>
                                        <div class="clearfix"></div>
                                        <p class="job_expire_in">'.esc_attr($date_text).'</p>
                                        <div class="clearfix"></div>
                                        <div class="job-type">'.get_the_term_list( get_the_ID(), 'mt_job_type', '', ' ' ).'</div>
                                    </div>
                                </div>
                            </div>';
            }


        // SINGLE POST
        }elseif (is_single()) {
            if(eaglewp_redux('mt_post_featured_image')){
                if(has_post_thumbnail()) {
                    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'eaglewp_1150x400' );
                    if($thumbnail_src) {
                        $html .= '<img src="'.esc_url($thumbnail_src[0]).'" class="img-responsive single-post-featured-img" alt="'.get_the_title().'" />';
                    }
                }
                $html .= '<div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">

                                        <div class="post-category-date">'.get_the_term_list( get_the_ID(), 'category', '', ' ' ).' - '.get_the_date(get_option( 'date_format' )).'</div>
                                        <h1>'.get_the_title().'</h1>
                                        <div class="clearfix"></div>
                                        <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                    </div>
                                </div>
                            </div>';
            }
        }


        // SEARCH RESULTS PAGE
        elseif (is_search()) {
            if(eaglewp_redux('mt_search_posts_header_img', 'url')){
                $html .= '<img src="'.esc_url(eaglewp_redux('mt_search_posts_header_img', 'url')).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                            <div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.esc_attr__( 'Search Results for: ', 'eaglewp' ) . get_search_query().'</h1>
                                        <div class="clearfix"></div>
                                        <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                    </div>
                                </div>
                            </div>';
            }
        }


        // CATEGORY ARCHIVE
        elseif (is_category()) {
            if(eaglewp_redux('mt_categories_posts_header_image', 'url')){
                $html .= '<img src="'.esc_url(eaglewp_redux('mt_categories_posts_header_image', 'url')).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                            <div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.esc_attr__( 'Category: ', 'eaglewp' ).' <span>'.single_cat_title( '', false ).'</span></h1>
                                        <div class="clearfix"></div>
                                        <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                    </div>
                                </div>
                            </div>';
            }
        }


        // TAGS ARCHIVE
        elseif (is_tag()) {
            if(eaglewp_redux('mt_tags_posts_header_image', 'url')){
                $html .= '<img src="'.esc_url(eaglewp_redux('mt_tags_posts_header_image', 'url')).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                            <div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.esc_attr__( 'Tag Archives: ', 'eaglewp' ) . single_tag_title( '', false ).'</h1>
                                        <div class="clearfix"></div>
                                        <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                    </div>
                                </div>
                            </div>';
            }
        }


        // AUTHOR ARCHIVE
        elseif (is_author()) {

            if(eaglewp_redux('mt_author_posts_header_image', 'url')){
                $html .= '<img src="'.esc_url(eaglewp_redux('mt_author_posts_header_image', 'url')).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                            <div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.get_the_archive_title() . '</h1>
                                        <div class="clearfix"></div>
                                        <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                    </div>
                                </div>
                            </div>';
            }
        }


        // archive.php index.php ARCHIVE
        elseif (is_archive()) {
            if(eaglewp_redux('mt_author_posts_header_image', 'url')){
                $html .= '<img src="'.esc_url(eaglewp_redux('mt_author_posts_header_image', 'url')).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                            <div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.get_the_archive_title() . get_the_archive_description().'</h1>
                                        <div class="clearfix"></div>
                                        <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                    </div>
                                </div>
                            </div>';
            }
        }

        // is_home
        elseif (is_home()) {
            if(eaglewp_redux('mt_author_posts_header_image', 'url')){
                $html .= '<img src="'.esc_url(get_template_directory_uri()) . '/images/placeholder_archive.jpg'.'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                            <div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.get_the_archive_title() . get_the_archive_description().'</h1>
                                    </div>
                                </div>
                            </div>';
            }else{
                if(eaglewp_redux('mt_author_posts_header_image', 'url')){
                    $html .= '<img src="'.esc_url(eaglewp_redux('mt_author_posts_header_image', 'url')).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                                <div class="header-title-breadcrumb-overlay text-center">
                                    <div class="container flex">
                                        <div class="header-group">
                                            <h1>'.get_the_archive_title() . get_the_archive_description().'</h1>
                                            <div class="clearfix"></div>
                                            <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                        </div>
                                    </div>
                                </div>';
                }
            }
        }




        // SINGLE PAGE (page.php)
        elseif (is_page()) {

            $breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off', true );
            if($breadcrumbs_on_off == 'yes'){
                $html .= '<img src="'.esc_url(wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ) ).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                            <div class="header-title-breadcrumb-overlay text-center">
                                <div class="container flex">
                                    <div class="header-group">
                                        <h1>'.get_the_title().'</h1>
                                        <div class="clearfix"></div>
                                        <ol class="breadcrumb">'.eaglewp_breadcrumb().'</ol>                    
                                    </div>
                                </div>
                            </div>';
            } else {
                if ( !class_exists('ReduxFrameworkPlugin') ) {
                    $featured_page_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                    if($featured_page_image == false) {
                        $placeholder = get_template_directory_uri() . '/images/placeholder_archive.jpg';
                        $html .= '<img src="'.esc_url($placeholder).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                                    <div class="header-title-breadcrumb-overlay text-center">
                                        <div class="container flex">
                                            <div class="header-group">
                                                <h1>'.get_the_title().'</h1>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>';
                    } else {
                        $html .= '<img src="'.esc_url($featured_page_image).'" class="img-responsive single-post-featured-img" alt="single-post-featured-img" />
                                    <div class="header-title-breadcrumb-overlay text-center">
                                        <div class="container flex">
                                            <div class="header-group">
                                                <h1>'.get_the_title().'</h1>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>';
                    }
                }

            }
        }

    $html .= '</div>';
    $html .= '<div class="clearfix"></div>';

    return $html;
}


function eaglewp_sharer($tooltip_placement){

	$html = '';
	$html .= '<div class="article-social">
                <ul class="social-sharer">
                    <li class="facebook">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on Facebook','eaglewp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.facebook.com/share.php?u='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="twitter">
                        <a data-toggle="tooltip" title="'.esc_attr__('Tweet on Twitter','eaglewp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://twitter.com/home?status='.get_the_title().'+'.get_permalink().'"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="pinterest">
                        <a data-toggle="tooltip" title="'.esc_attr__('Pin on Pinterest','eaglewp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://pinterest.com/pin/create/bookmarklet/?media='.get_permalink().'&url='.get_permalink().'&is_video=false&description='.get_permalink().'"><i class="icon-social-pinterest"></i></a>
                    </li>
                    <li class="linkedin">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on LinkedIn','eaglewp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'&amp;source='.get_permalink().'"><i class="icon-social-linkedin"></i></a>
                    </li>
                    <li class="reddit">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on Reddit','eaglewp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.reddit.com/submit?url='.get_permalink().'&amp;title='.get_the_title().'"><i class="icon-social-reddit"></i></a>
                    </li>
                    <li class="tumblr">
                        <a data-toggle="tooltip" title="'.esc_attr__('Share on Tumblr','eaglewp').'" data-placement="'.esc_attr($tooltip_placement).'" href="http://www.tumblr.com/share?v=3&amp;u='.get_permalink().'&amp;t='.get_the_title().'"><i class="icon-social-tumblr"></i></a>
                    </li>
                </ul>
            </div>';

	return $html;
}

if ( function_exists('modeltheme_framework')) {

    function eaglewp_dfi_ids($postID){
        global  $dynamic_featured_image;
        $featured_images = $dynamic_featured_image->get_featured_images( $postID );

        //Loop through the image to display your image
        if( !is_null($featured_images) ){

            $medias = array();

            foreach($featured_images as $images){
                $attachment_id = $images['attachment_id'];
                $medias[] = $attachment_id;
            }

            $ids = '';
            $len = count($medias);
            $i = 0;
            foreach($medias as $media){

                if ($i == $len - 1) {
                    $ids .= $media;
                }else{
                    $ids .= $media . ',';
                }

                $i++;

            }
        } 

        return $ids;
    }
}



?>