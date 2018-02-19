<?php
/**
 * kindler Theme Customizer.
 *
 * @package kindler
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kindler_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'header_textcolor' )->priority  = 10;
	$wp_customize->get_control( 'header_textcolor' )->label		= 'Site Description Color';
	
	$wp_customize->add_setting('title_color', array(
		'default'		=>	'#ffffff',
		'sanitize_callback'	=>	'sanitize_hex_color',
		'transport'		=>	'postMessage',
		)
	); 
		
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
		$wp_customize, 'title_color', array(
			'label'		=> 'Site Title Color',
			'section'	=> 'colors',
			'settings'	=> 'title_color',
			'priority'	=> 1
			)
		)
	);
	
	$wp_customize-> add_section(
		'kindler_layout',
		array(
			'title'		=> __('Layout Settings', 'kindler'),
			'priority'	=> 5,
		)
	);
	
	$wp_customize-> add_setting(
		'kindler_featured_thumb',
		array(
			'default'			=> true,
			'sanitize_callback'	=> 'kindler_sanitize_checkbox',
		)
	);
	
	$wp_customize-> add_control(
		'kindler_featured_thumb',
		array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Show Featured Image in the Posts', 'kindler'),
    	'section'	=> 'kindler_layout',
    	)
	);
	
	$wp_customize-> add_setting(
		'kindler-sidebar',
		array(
			'default'			=> 'right',
			'sanitize_callback'	=> 'kindler_sanitize_select'
			
		)
	);
	
	$wp_customize->add_control(
	    'kindler-sidebar',
	    array(
	        'type' => 'radio',
	        'label' => __('Sidebar Layout', 'kindler'),
	        'description'	=> __('Select the sidebar orientation for the site', 'kindler'),
	        'section' => 'kindler_layout',
	        'choices' => array(
	            'left' => 'Left',
	            'right' => 'Right',
	        ),
	    )
	);

$wp_customize-> add_section(
    'kindler_social',
    array(
    	'title'			=> __('Social Settings', 'kindler'),
    	'description'	=> __('Manage the Social Icon Setings of your site.', 'kindler'),
    	'priority'		=> 10,
    	)
    );
    
    $wp_customize-> add_setting(
    'social',
    array(
    	'default'			=> false,
    	'sanitize_callback'	=> 'kindler_sanitize_checkbox',
    	)
    );
    
    $wp_customize-> add_control(
    'social',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Enable Social Icons', 'kindler'),
    	'section'	=> 'kindler_social',
    	'priority'	=> 1,
    	)
    );

    $wp_customize-> add_setting(
    'facebook',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'facebook',
    array(
    	'label'		=> __('Facebook URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 3
    	)
    );
    
    $wp_customize-> add_setting(
    'twitter',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'twitter',
    array(
    	'label'		=> __('Twitter URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 4
    	)
    );
    
    $wp_customize-> add_setting(
    'google-plus',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'google-plus',
    array(
    	'label'		=> __('Google Plus URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 5
    	)
    );
    
    $wp_customize-> add_setting(
    'instagram',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'instagram',
    array(
    	'label'		=> __('Instagram URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 6
    	)
    );
    
    $wp_customize-> add_setting(
    'pinterest-p',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'pinterest-p',
    array(
    	'label'		=> __('Pinterest URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 7
    	)
    );
    
    $wp_customize-> add_setting(
    'youtube',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'youtube',
    array(
    	'label'		=> __('Youtube URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 8
    	)
    );
    
    $wp_customize-> add_setting(
    'linkedin',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'linkedin',
    array(
    	'label'		=> __('Linked-In URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 9
    	)
    );

    
    $wp_customize-> add_setting(
    'vimeo',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'vimeo',
    array(
    	'label'		=> __('Vimeo URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 10
    	)
    );
    
    $wp_customize-> add_setting(
    'envelope-o',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'sanitize_email',
    	)
    );
    
    $wp_customize-> add_control(
    'envelope-o',
    array(
    	'label'		=> __('Your E-Mail Info','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'email',
        'priority'   => 11
    	)
    );
    
    $wp_customize-> add_setting(
    'tumblr',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'tumblr',
    array(
    	'label'		=> __('Tumblr URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 12
    	)
    );
    
    $wp_customize-> add_setting(
    'stumbleupon',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'stumbleupon',
    array(
    	'label'		=> __('StumbleUpon URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 13
    	)
    );
    
    $wp_customize-> add_setting(
    'reddit-alien',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'reddit-alien',
    array(
    	'label'		=> __('Reddit URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 14
    	)
    );
    
    $wp_customize-> add_setting(
    'vine',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'vine',
    array(
    	'label'		=> __('Vine URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 15
    	)
    );
    
    $wp_customize-> add_setting(
    'soundcloud',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'soundcloud',
    array(
    	'label'		=> __('SoundCloud URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 16
    	)
    );
    
    $wp_customize-> add_setting(
    'yelp',
    array(
    	'default'	=> '',
    	'sanitize_callback' => 'esc_url_raw',
    	)
    );
    
    $wp_customize-> add_control(
    'yelp',
    array(
    	'label'		=> __('Yelp URL','kindler'),
    	'section'	=> 'kindler_social',
    	'type'		=> 'text',
        'priority'   => 17
    	)
    );
    
    /*---- Showcase Area Settings ----*/

	$wp_customize->add_panel(
    'kindler-showcase', 
    	array(
		    'priority'       => 12,
		    'capability'     => 'edit_theme_options',
		    'theme_supports' => '',
		    'title'          => __('Showcase Area Settings', 'kindler'),
		)
	);
	
	$wp_customize-> add_section(
    'kindler-showcase-enable',
    array(
    	'title'			=> __('Showcase Area','kindler'),
    	'priority'		=> 1,
    	'panel'			=> 'kindler-showcase',
    	)
    );
    
    $wp_customize->add_setting(
	    'kindler-showcase-blog',
	    array(
	        'default' => false,
	        'sanitize_callback'	=> 'kindler_sanitize_checkbox',
	    )
	);
 
	$wp_customize->add_control(
	    'kindler-showcase-blog',
	    array(
	        'type' => 'checkbox',
	        'label' => __('Enable Showcase Area on the Blog Page','kindler'),
	        'section' => 'kindler-showcase-enable',
	    )	    
	);
	
	$wp_customize->add_setting(
		'kindler-showcase-title',
		array(
			'default'	=> '',
			'sanitize_callback'	=> 'kindler_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		'kindler-showcase-title',
		array(
			'type'	=> 'text',
			'label'	=> __('Title for the Showcase Area', 'kindler'),
			'section'	=> 'kindler-showcase-enable',
			'active_callback'	=> 'kindler_fa_enable'
		)
	);
    
    $wp_customize->add_section(
	    'kindler-showcase-1',
	    array(
		    'title'		=> __('Showcase Item 1','kindler'),
		    'priority'	=> 1,
		    'panel'		=> 'kindler-showcase',
		    'active_callback'	=> 'kindler_fa_enable'
	    )
    );
    
    $wp_customize->add_setting( 
    'kindler-s-img-1', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'kindler-s-img-1',
	        array(
	            'label' => __('Image Upload','kindler'),
	            'section' => 'kindler-showcase-1',
	            'settings' => 'kindler-s-img-1',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'kindler-s-title-1', array(
			'sanitize_callback'	=> 'kindler_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'kindler-s-title-1', array(
		'label'		=> __('Description','kindler'),
		'section'	=> 'kindler-showcase-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'kindler-s-url-1', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'kindler-s-url-1', array(
		'label'		=> __('URL','kindler'),
		'section'	=> 'kindler-showcase-1',
		'type'		=> 'text',
		)
	);
	
	$wp_customize->add_section(
	    'kindler-showcase-2',
	    array(
		    'title'		=> __('Showcase Item 2','kindler'),
		    'priority'	=> 2,
		    'panel'		=> 'kindler-showcase',
		    'active_callback'	=> 'kindler_fa_enable'
	    )
    );
    
    $wp_customize->add_setting( 
    'kindler-s-img-2', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'kindler-s-img-2',
	        array(
	            'label' => __('Image Upload','kindler'),
	            'section' => 'kindler-showcase-2',
	            'settings' => 'kindler-s-img-2',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'kindler-s-title-2', array(
			'sanitize_callback'	=> 'kindler_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'kindler-s-title-2', array(
		'label'		=> __('Description','kindler'),
		'section'	=> 'kindler-showcase-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'kindler-s-url-2', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'kindler-s-url-2', array(
		'label'		=> __('URL','kindler'),
		'section'	=> 'kindler-showcase-2',
		'type'		=> 'text',
		)
	);
	
	$wp_customize->add_section(
	    'kindler-showcase-3',
	    array(
		    'title'		=> __('Showcase Item 3','kindler'),
		    'priority'	=> 2,
		    'panel'		=> 'kindler-showcase',
		    'active_callback'	=> 'kindler_fa_enable'
	    )
    );
    
    $wp_customize->add_setting( 
    'kindler-s-img-3', array(
    	'sanitize_callback'	=> 'esc_url_raw',
    	)
     );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'kindler-s-img-3',
	        array(
	            'label' => __('Image Upload','kindler'),
	            'section' => 'kindler-showcase-3',
	            'settings' => 'kindler-s-img-3',
	        )
	    )
	);
	
	$wp_customize-> add_setting( 
	'kindler-s-title-3', array(
			'sanitize_callback'	=> 'kindler_sanitize_text',
			 )
	);
	
	$wp_customize-> add_control(
	'kindler-s-title-3', array(
		'label'		=> __('Description','kindler'),
		'section'	=> 'kindler-showcase-3',
		'type'		=> 'text',
		)
	);
	
	$wp_customize-> add_setting( 
	'kindler-s-url-3', array(
			'sanitize_callback'	=> 'esc_url_raw',
			 )
	);
	
	$wp_customize-> add_control(
	'kindler-s-url-3', array(
		'label'		=> __('URL','kindler'),
		'section'	=> 'kindler-showcase-3',
		'type'		=> 'text',
		)
	);
	
	function kindler_fa_enable() {
	    if ( get_theme_mod( 'kindler-showcase-blog', false ) ) {
		    return true;
	    } else {
		    return false;
	    }
    }
    
    //---- Featured Posts Area ----//
    
 
	if ( ! class_exists( 'WP_Customize_Control' ) )
	    return NULL;
	/*
	** Customizer Controls 
	*/
	if (class_exists('WP_Customize_Control')) {
		class Kindler_WP_Customize_Category_Control extends WP_Customize_Control {
	        /**
	         * Render the control's content.
	         */
	        public function render_content() {
	            $dropdown = wp_dropdown_categories(
	                array(
	                    'name'              => '_customize-dropdown-categories-' . $this->id,
	                    'echo'              => 0,
	                    'show_option_none'  => __( '&mdash; Select &mdash;', 'kindler' ),
	                    'option_none_value' => '0',
	                    'selected'          => $this->value(),
	                )
	            );
	 
	            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
	 
	            printf(
	                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
	                $this->label,
	                $dropdown
	            );
	        }
	    }
	} 
	
	function kindler_fp_enable() {
	    if ( get_theme_mod( 'kindler-fp-enable', false ) ) {
		    return true;
	    } else {
		    return false;
	    }
    }

    
    $wp_customize->add_section(
	    'kindler-fp',
	    array(
		    'title'	=> __('Featured Posts Settings', 'kindler'),
		    'priority'	=> 13
	    )
    );
    
     $wp_customize->add_setting(
	    'kindler-fp-enable',
	    array(
	        'default' => false,
	        'sanitize_callback'	=> 'kindler_sanitize_checkbox',
	    )
	);
 
	$wp_customize->add_control(
	    'kindler-fp-enable',
	    array(
	        'type' => 'checkbox',
	        'label' => __('Enable Featured Posts on the Home Page','kindler'),
	        'section' => 'kindler-fp',
	    )	    
	);
	
	$wp_customize->add_setting(
		'kindler-fp-title',
		array(
			'default'	=> '',
			'sanitize_callback'	=> 'kindler_sanitize_text'
		)
	);
	
	$wp_customize->add_control(
		'kindler-fp-title',
		array(
			'type'	=> 'text',
			'label'	=> __('Title for the Featured Posts Area', 'kindler'),
			'section'	=> 'kindler-fp-enable',
			'active_callback'	=> 'kindler_fp_enable'
		)
	);
	
	$wp_customize-> add_setting(
	    'kindler_category_select',
		array(
			'sanitize_callback'	=> ''
		)
    );
    
    $wp_customize->add_control(
	    new Kindler_WP_Customize_Category_Control(
		    $wp_customize,
                'kindler_category_select', 
                array(
	                'label'		=> __('Select a Category for Featured Posts','kindler'),
                	'section' 	=> 'kindler-fp',
                	'settings'	=> 'kindler_category_select',
                	'active_callback'	=> 'kindler_fp_enable'
            )
	    )
    );
	
	//---- Pro Settings ----//
	
	class Kindler_Review_Control extends WP_Customize_Control {
		
		public $type = 'kindler-options';
		 
	    public function render_content() {
	        ?>
			<li><h2 class="dvt-title"><?php _e('It is your support, that keeps people me doing what we love, creating awesome WordPress Themes. Kindly consider showing your support by reviewing the theme on WordPress.org.', 'kindler'); ?></h2><a class="button kindler_rev" href="https://www.wordpress.org/themes/kindler" target="_blank" title="<?php esc_attr_e('Rate Kindler Theme', 'kindler'); ?>"><?php printf('Rate Kindler Theme', 'kindler'); ?></a></li>
			<br>
			
			<li><h2 class="dvt-title"><?php _e('Visit my site and enjoy more awesome WordPress stuff created by me.', 'kindler'); ?></h2><a class="button divjot" href="https://www.wordpress.org/themes/kindler" target="_blank" title="<?php esc_attr_e('Rate Kindler Theme', 'kindler'); ?>"><?php printf('Visit Divjot.Co', 'kindler'); ?></a></li>
			<br>
			
<!-- 			<li><h2 class="pro-title"><?php _e('Upgrade to Kindler Plus and take your Website to the next level.', 'kindler'); ?></h2><a class="button kindler_pro" href="http://www.divjot.co/product/kindler-plus" target="_blank" title="<?php esc_attr_e('Kindler Plus', 'kindler'); ?>"><?php printf('Check out Kindler Plus', 'kindler'); ?></a></li> -->
			
			
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				
				<script>window.twttr = (function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0],
				    t = window.twttr || {};
				  if (d.getElementById(id)) return t;
				  js = d.createElement(s);
				  js.id = id;
				  js.src = "https://platform.twitter.com/widgets.js";
				  fjs.parentNode.insertBefore(js, fjs);
				
				  t._e = [];
				  t.ready = function(f) {
				    t._e.push(f);
				  };
				
				  return t;
				}(document, "script", "twitter-wjs"));</script>
			
					
	        <?php
	    }
	}
	
	$wp_customize-> add_section(
    'kindler_pro',
    array(
    	'title'			=> __('Theme Links','kindler'),
    	'priority'		=> 1,
    	)
    );
    
    $wp_customize-> add_setting(
	    'kindler_review',
		array(
			'sanitize_callback'	=> 'esc_url_raw'
		)
    );
    
    $wp_customize->add_control(
	    new Kindler_Review_Control(
		    $wp_customize,
                'kindler_review', array(
                'section' => 'kindler_pro',
                'type' => 'kindler-options',
            )
	    )
    );
    
    class MyCustom_Customize_Control extends WP_Customize_Control {    
	    public function render_content() {
	        ?>
	        <label>
						<input type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
						<?php echo esc_html( $this->label ); ?>
						<?php if ( ! empty( $this->description ) ) : ?>
							<span class="description customize-control-description"><?php echo $this->description; ?></span>
						<?php endif; ?>
					</label>
					
					<script>
					jQuery(function($){
						/* $('#customize-control-pro_hide' ).show(); */
						/*
wp.customize( 'pro_hide', function( value ) {
							value.bind( function( to ) {
*/
								$( '#customize-control-pro_hide' ).hide();
								$( '#accordion-section-kindler_pro #accordion-section-title' ).css({"color":"#fff"});
							/*
} );
						} );
*/						
					});
					</script>

					
	        <?php
	    }
	}
    
    $wp_customize->add_setting(
	'pro_hide',
	array(
		'default'			=> false,
		'sanitize_callback'	=> 'kindler_sanitize_checkbox',
		)
	);
 
	$wp_customize-> add_control( new MyCustom_Customize_Control( $wp_customize,
    'pro_hide',
    array(
    	'type'		=> 'checkbox',
    	'label'		=> __('Hide this section forever.','kindler'),
    	'section'	=> 'kindler_pro',
    	'priority'	=> 1,
    	)
    ));
    
    function kindler_sanitize_text( $t ) {
    	return wp_kses_post( force_balance_tags( $t ) );
    }
    
    function kindler_sanitize_checkbox( $i ) {
	    if ( $i == 1 ) {
	        return 1;
	    } 
	    else {
	        return '';
	    }
	 }
	 
	function kindler_sanitize_select( $input ) {
	    $valid = array(
	        'left'  => 'Left',
	        'right' => 'Right',
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	if ( $wp_customize->is_preview() ) {
	    add_action( 'wp_footer', 'kindler_customize_preview', 21);
	}
	
	function kindler_customize_preview() {
    ?>
	    <script type="text/javascript">
	        ( function( jQuery ) {
	            wp.customize('header_textcolor',function( value ) {
	                value.bind(function(to) {
	                    jQuery('.site-description').css('color', to );
	                });
	            });
	             wp.customize('title_color',function( value ) {
	                value.bind(function(to) {
	                    jQuery('.site-title a').css('color', to );
	                });
	            });
	        } )( jQuery )
	    </script>
	    <?php
	}  // End function kindler_customize_preview()
 }   
add_action( 'customize_register', 'kindler_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kindler_customize_preview_js() {
	wp_enqueue_script( 'kindler_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'kindler_customize_preview_js' );
