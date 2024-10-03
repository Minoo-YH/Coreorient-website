<header class="header5">
  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
        <div class="row">

          <!-- LOGO -->
          <div class="navbar-header col-md-12">
            <?php if ( !class_exists( 'mega_main_init' ) ) { ?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <?php } ?>

            <div class="logo text-center">
              <a href="<?php echo esc_url(home_url()); ?>">
                <?php if(eaglewp_redux('mt_logo','url')){ ?>
                  <img src="<?php echo esc_url(eaglewp_redux('mt_logo','url')); ?>" alt="<?php echo get_bloginfo(); ?>" />
                <?php }else{ 
                  echo get_bloginfo();
                } ?>
              </a>
            </div>
          </div>


          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-12">
            <?php echo eaglewp_get_nav_menu(); ?>
          </div>
        </div>
    </div>
  </nav>
</header>