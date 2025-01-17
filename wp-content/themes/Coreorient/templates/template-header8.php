<header class="header8">
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
                    <?php echo esc_attr(get_bloginfo()); ?>
                  </a>
              </div>
            <?php } ?>
          </div>

          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-10">
            <?php echo eaglewp_get_nav_menu(); ?>

            <div class="header-nav-actions">

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

              <?php if(eaglewp_redux('mt_header_is_search') == true){ ?>
                <a href="#" class="mt-search-icon">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
              <?php } ?>
              
            </div>

          </div>


        </div>
    </div>
  </nav>
</header>