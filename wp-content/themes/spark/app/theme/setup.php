<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;


/**
 * Theme assets
 */

add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style('sage/main.css', asset_path(mix('/css/main.css')), false, null);

	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', [], null, false);
		wp_enqueue_style('sage/font-awesome.css', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', false, null);
	}

	wp_enqueue_script('sage/main.js', asset_path(mix('/js/main.js')), [], null, true);

	if (is_single() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}, 99);


/**
 * Theme setup
 */

add_action('after_setup_theme', function () {

    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */

    add_theme_support('soil-clean-up');
    add_theme_support('soil-disable-asset-versioning');
    //add_theme_support('soil-js-to-footer');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /** WooCommerce Support */
    //add_theme_support( 'woocommerce' );
    //add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    //add_theme_support( 'wc-product-gallery-slider' );

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */

    add_theme_support('title-tag');


    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */

    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);


    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */

    add_theme_support('post-thumbnails');


    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */

    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);


    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */

    add_theme_support('customize-selective-refresh-widgets');


    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */

    add_editor_style(asset_path(mix('/css/main.css')));


}, 20);

/**
 * Register sidebars
 */

add_action('widgets_init', function () {

    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];

    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);

});


/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */

add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});


/**
 * Setup Sage options
 */

add_action('after_setup_theme', function () {

    /**
     * Add JsonManifest to Sage container
     */

    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });


    /**
     * Add Blade to Sage container
     */

    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });


    /**
     * Create @asset() Blade directive
     */

    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });

});


/**
 * Define static upload image sizes
 */

add_image_size('thumbnail', 300, 300, false);
add_image_size('medium', 480, 480, false);
add_image_size('medium_large', 768, 768, false);
add_image_size('large', 1280, 1280, false);


/**
 * WordPress Admin stylesheet
 */

add_action('admin_enqueue_scripts', function () {
	wp_register_style('custom_admin_styles', asset_path(mix('/css/admin.css')), false, '1.0.0');
	wp_enqueue_style('custom_admin_styles');
});
