<?php
/**
 * @package ModelTheme
 */

$prev_post = get_previous_post();
$next_post = get_next_post();

$media_id = get_post_thumbnail_id( get_the_ID() );
if(!isset($media_id)){
    $media_id = '';
}

$post_likes = get_post_meta( get_the_ID(), '_li_love_count', true );
$portfolio_subtitle = get_post_meta( get_the_ID(), 'mt_portfolio_subtitle', true );
$project_link = get_post_meta( get_the_ID(), 'mt_project_link', true );
?>

<div class="clearfix"></div>


<article id="post-<?php the_ID(); ?>" <?php post_class('post high-padding'); ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-content">
                <div class="article-content row">
                    <div class="col-md-12">
                        <?php
                            if(has_post_thumbnail()){
                                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'eaglewp_1150x400' );
                                the_post_thumbnail('eaglewp_1150x400');
                            }
                        ?>

                    
                        <?php
                            if(has_post_thumbnail()){
                                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'full' );
                                    if($thumbnail_src) {
                                        echo '<img src="'.esc_url($thumbnail_src[0]).'" class="img-responsive portfolio-single-pic" alt="'.get_the_title().' />';
                                }
                            }

                            global  $dynamic_featured_image;
                            $featured_images = $dynamic_featured_image->get_featured_images( get_the_ID() );

                            //Loop through the image to display your image
                            if( !is_null($featured_images) ){

                                $links = array();

                                foreach($featured_images as $images){
                                    $thumb = $images['thumb'];
                                    $fullImage = $images['full'];

                                    $links[] = '<img class="portfolio-single-pic img-responsive" src="'.esc_url($fullImage).'" />';
                                }

                                echo "<div class='extra_thumbnails'>";
                                foreach($links as $link){
                                    echo  wp_kses_post($link);
                                }                
                                echo "</div>";
                            } 
                        ?>
                    </div>


                    <div class="clearfix"></div>
                    <div class="portfolio-bottom-icons clearfix">
                        <ul class="text-center">
                            <h4 class="single-post-love"><?php echo eaglewp_li_love_link($love_text = null, $loved_text = null); ?></h4>
                        </ul>
                    </div>


                    <div class="clearfix"></div>
                    <div class="portfolio-bottom-description">
                        <div class="col-md-8">
                            <h3 class="post-name"><?php echo get_the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                        <div class="col-md-4">
                            <h3 class="post-name"><?php echo esc_html_e('Project Details ','eaglewp'); ?></h3>
                            <p><i class="icon-calendar"></i> <label><?php echo esc_html__('Completed:','eaglewp'); ?></label><?php echo get_the_date(get_option( 'date_format' )); ?></p>
                            <p>
                                <i class="icon-user"></i>
                                <label><?php echo esc_html__('Client:','eaglewp'); ?></label> <?php echo get_post_meta( get_the_ID(), 'smartowl_client_name', true ); ?>
                            </p>
                            <p>
                                <i class="icon-tag"></i>
                                <?php echo get_the_term_list( get_the_ID(), 'portfolios', '<label>Category:</label>', ', ' ); ?>
                            </p>
                            <p>
                                <i class="icon-bulb"></i>
                                <?php echo get_the_term_list( get_the_ID(), 'portfolioskill', '<label>Skill:</label>', ', ' ); ?>
                            </p>
                            <p><i class="icon-link"></i> <label><?php echo esc_html__('Live demo:','eaglewp'); ?></label> <a href="<?php echo esc_url($project_link); ?>">View Demo</a></p>
                        </div>
                    </div>

                    <?php if ( eaglewp_redux('mt_enable_post_navigation') ) { ?>
                        <div class="prev-next-post">
                            <?php if($prev_post){ ?>
                            <div class="vc_col-md-6 prev-post text-left">
                                <a href="<?php echo esc_url(get_permalink( $prev_post->ID ) ); ?>">
                                    <i class="icon-arrow-left-circle"></i>
                                </a>
                            </div>
                            <?php } ?>
                            <?php if($next_post){ ?>
                            <div class="vc_col-md-6 next-post text-right">
                                <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
                                    <i class="icon-arrow-right-circle"></i>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</article>