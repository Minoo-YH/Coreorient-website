<header class="header13">
  <!-- BOTTOM BAR -->
  <div id="modeltheme-main-head">
    <nav class="navbar navbar-default">
      <div class="container">


         <?php if ( !class_exists( 'mega_main_init' ) ) { ?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <?php } ?>

        <div id="navbar" class="navbar-collapse collapse col-md-12">
          <?php echo eaglewp_get_nav_menu(); ?>
        </div>
      </div>
    </nav>
  </div>
</header>