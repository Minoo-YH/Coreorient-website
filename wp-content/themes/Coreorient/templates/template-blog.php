<?php
/*
* Template Name: Blog
*/


get_header(); 

global $eaglewp_redux;

$class = "";

if ( eaglewp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "col-md-12";
}elseif ( eaglewp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or eaglewp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "col-md-9";
}
$breadcrumbs_on_off = get_post_meta( get_the_ID(), 'breadcrumbs_on_off', true );
$blog_page_header = get_post_meta( get_the_ID(), 'blog_page_header', true );

$sidebar = $eaglewp_redux['mt_blog_layout_sidebar'];
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo eaglewp_header_title_breadcrumbs(); ?>


<!-- Page content -->
<div class="high-padding">
    <!-- Sticky posts -->
    <?php if ( get_option( 'sticky_posts' ) && eaglewp_redux('mt_enable_sticky') ) { ?>

    <div class="container sticky-posts">
        <h2 class="blog_heading heading-bottom "><?php echo esc_attr(eaglewp_redux('mt_sticky_post_title')); ?></h2>
        <div class="row">
            <?php
            $args_sticky_posts = array(
                'posts_per_page'        => 3,
                'post__in'              => get_option( 'sticky_posts' ),
                'post_type'             => 'post',
                'post_status'           => 'publish' 
            );
            $sticky_posts = get_posts($args_sticky_posts);

            foreach ($sticky_posts as $post) { 
                $excerpt = get_post_field('post_content', $post->ID);
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'eaglewp_post_pic700x450' );
                $author_id = $post->post_author;
            ?>
            <div class="col-md-4 post">
                <div class="sticky_post_text_container">
                    <a href="<?php the_permalink(); ?>" class="relative">
                        <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'eaglewp_related_post_pic500x300' ); 
                        if($thumbnail_src) { ?>
                            <img src="<?php echo esc_url($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title_attribute(); ?>" />
                        <?php }else{ ?>
                            <img src="<?php echo esc_url('http://placehold.it/500x300'); ?>" class="img-responsive" alt="<?php the_title_attribute(); ?>" />
                        <?php } ?>
                    </a>
                    <div class="sticky_post_blog_details">
                        <h4 class="post-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div class="post-author">
                            <?php echo esc_attr('Posted by ','eaglewp'); ?><a href="<?php echo esc_url(get_author_posts_url( $author_id, get_the_author_meta('display_name') )); ?>"><?php echo get_the_author(); ?></a> - <?php echo get_the_date('j M'); ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php } ?>

    <!-- ///////////////////// Stop Sticky Layout ///////////////////// -->


    <!-- ///////////////////// Start Grid/List Layout ///////////////////// -->
    <?php
    wp_reset_postdata();
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'paged'            => $paged,
    );
    $posts = new WP_Query( $args );
    ?>
    <!-- Blog content -->
    <div class="container blog-posts high-padding">
        
        <h2 class="blog_heading heading-bottom ">
            <?php echo eaglewp_redux('mt_blog_post_title'); ?>
        </h2>
        <div class="row">

            <?php if ( eaglewp_redux('mt_blog_layout') != '' && eaglewp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">
                <div class="row">

                <?php if ( $posts->have_posts() ) : ?>
                    <?php /* Start the Loop */ ?>
                    <?php
                    $j = 0;
                    while ( $posts->have_posts() ) : $posts->the_post(); 
                    $j++;

                    $class = "";
                    if ($j%2 == 0) {
                        $class = "even-post clear_both_class";
                    ?>
                        <div class='<?php echo esc_attr($class); ?>'>
                            <?php get_template_part( 'content', 'right' ); ?>
                        </div>
                    <?php }else{ 
                    $class = "odd-post clear_both_class";
                    ?>
                        <div class='<?php echo esc_attr($class); ?>'>
                            <?php get_template_part( 'content', 'left' ); ?>
                        </div>
                    <?php } ?>

                    <?php endwhile; ?>
                    <?php echo '<div class="clearfix"></div>'; ?>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
                
                <div class="clearfix"></div>

                <?php 
                $wp_query = new WP_Query($args);
                global  $wp_query;
                if ($wp_query->max_num_pages != 1) { ?>                
                <div class="modeltheme-pagination-holder col-md-12">           
                    <div class="modeltheme-pagination pagination">           
                        <?php eaglewp_pagination(); ?>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>


            <?php if ( eaglewp_redux('mt_blog_layout') != '' && eaglewp_redux('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

        </div>
    </div>
</div>


<?php
get_footer();
?>