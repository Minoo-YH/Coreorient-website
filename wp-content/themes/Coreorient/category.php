<?php
/**
 * The template for displaying categories results pages.
 *
 */

get_header(); 



$class = "";
if ( eaglewp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class = "vc_row";
}elseif ( eaglewp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or eaglewp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class = "vc_col-md-9";
}
$sidebar = eaglewp_redux('mt_blog_layout_sidebar');
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo eaglewp_header_title_breadcrumbs(); ?>


<!-- Page content -->
<div class="high-padding">
    <!-- Blog content -->
    <div class="container blog-posts">
        <div class="col-md-12">

            <?php if ( eaglewp_redux('mt_blog_layout') != '' && eaglewp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

            <div class="<?php echo esc_attr($class); ?> main-content">
            <?php if ( have_posts() ) : ?>
            <div class="vc_row">
                <?php /* Start the Loop */ ?>
                <?php
                $j = 0;
                while ( have_posts() ) : the_post(); 
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

                <div class="clearfix"></div>

                <div class="modeltheme-pagination-holder col-md-12">             
                    <div class="modeltheme-pagination pagination">             
                        <?php eaglewp_pagination(); ?>
                    </div>
                </div>
            </div>
            
            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>
            </div>

            <?php if ( eaglewp_redux('mt_blog_layout') != '' && eaglewp_redux('mt_blog_layout') == 'mt_blog_right_sidebar') { ?>
                <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
            <?php } ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>