<header id="masthead-2" class="site-header container" role="banner">
    <div class="site-branding col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?php if ( has_custom_logo()) : ?>
            <div id = "logo">
                <?php the_custom_logo(); ?>
            </div>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        <?php else : ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        <?php endif; ?>
    </div><!-- .site-branding -->
    <div id="search-head" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div id="searchform">
            <form method="get" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>/">
                <div><input type="text" size="18" value="" name="s" id="s" />
                    <button type="submit" class="search-submit"><?php _e('Search', 'kindler'); ?></button>
                </div>
            </form>
        </div>
    </div>
</header><!-- #masthead -->