<div id="footer-sidebar" class="widget-area clear container" role="complementary">
    <?php do_action( 'before_sidebar' ); ?>
    <?php
    if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
        <div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
            dynamic_sidebar( 'sidebar-2');
            ?> </div> <?php
    }

    if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
        <div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
            dynamic_sidebar( 'sidebar-3');
            ?> </div> <?php
    }

    if ( is_active_sidebar( 'sidebar-4' ) ) { ?>
        <div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
            dynamic_sidebar( 'sidebar-4');
            ?> </div> <?php
    }

    if ( is_active_sidebar( 'sidebar-5' ) ) { ?>
        <div class="footer-column col-lg-3 col-md-3 col-sm-6 col-xs-12"> <?php
            dynamic_sidebar( 'sidebar-5');
            ?> </div> <?php
    }
    ?>
</div><!-- #footer-sidebar -->