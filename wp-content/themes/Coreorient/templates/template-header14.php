<?php
  #Redux global variable
  global $eaglewp_redux;
 
?>


<header class="header14">

  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="col-md-12">
        <div class="row">

          <!-- LOGO -->
          <div class="navbar-header col-md-2">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php if(eaglewp_redux('mt_logo','url')){ ?>
              <div class="logo">
                  <a href="<?php echo esc_url(home_url()); ?>">
                      <img src="<?php echo esc_url(eaglewp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                  </a>
              </div>
            <?php }else{ ?>
              <div class="logo no-logo">
                  <a href="<?php echo esc_url(home_url()); ?>">
                    <?php echo eaglewp_get_nav_menu(); ?>
                  </a>
              </div>
            <?php } ?>
          </div>

          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-10">
            <?php echo eaglewp_get_nav_menu(); ?>

            <div class="col-md-5 col-sm-12 header-nav-actions">
              <?php if ( eaglewp_redux('eaglewp_header_order_tracking_link') != '' || eaglewp_redux('eaglewp_header_courier_cost_link') != ''){ ?>

                <?php if (isset($eaglewp_redux['eaglewp_header_order_tracking_link']) && $eaglewp_redux['eaglewp_header_order_tracking_link'] != '') { ?>
                  <a class="col-md-3 tracking-order" href="<?php echo esc_url($eaglewp_redux['eaglewp_header_order_tracking_link']); ?>">
                    <?php echo apply_filters('eagle_header_tracking', esc_html_e('Tracking Order', 'eaglewp')); ?>
                  </a>
                <?php } ?>
                 <?php if (isset($eaglewp_redux['eaglewp_header_courier_cost_link']) && $eaglewp_redux['eaglewp_header_courier_cost_link'] != '') { ?>
                  <a class="col-md-3 courier-order" href="<?php echo esc_url($eaglewp_redux['eaglewp_header_courier_cost_link']); ?>">
                    <?php echo apply_filters('eagle_header_courier', esc_html_e('Courier Cost', 'eaglewp')); ?>
                  </a>
                <?php } ?>
              <?php } ?>


               <?php if(eaglewp_redux('mt_header_is_search') == true){ ?>
                <a href="#" class="col-md-3 mt-search-icon">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
              <?php } ?>

              <?php if(eaglewp_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
                <!-- MT BURGER -->
                <div id="mt-nav-burger">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              <?php } ?>

              
            </div>

          </div>


        </div>
    </div>
  </nav>
</header>
