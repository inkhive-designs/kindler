<header id="masthead" class="site-header" role="banner">
    <div id="header-image">
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kindler' ); ?></button>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
        </nav><!-- #site-navigation -->

        <div id="search-head">
            <div id="search-icon">
                <i class="fa fa-search fa-inverse"></i>
            </div>
            <div id="searchform">
                <form method="get" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>/">
                    <div><input type="text" size="18" value="" name="s" id="s" />
                        <button type="submit" class="search-submit"><?php _e('Search', 'kindler'); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <?php if (get_theme_mod('social')) { ?>
            <div id="social-share">
                <i class="fa fa-share-alt fa-inverse" aria-hidden="true"></i>
            </div>
        <?php } ?>
        <?php get_template_part('modules/social/social', 'fa'); ?>
    </div>
    <div class="site-branding">
        <?php if ( has_custom_logo() ) : ?>
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
</header><!-- #masthead -->