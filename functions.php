<?php

/**
 * Example functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Example
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function example_theme_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Example, use a find and replace
        * to change 'example-theme' to the name of your theme in all the template files.
        */
    load_theme_textdomain('example-theme', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
    add_theme_support('title-tag');

    /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main Menu', 'example-theme'),

        )
    );

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'example_theme_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'example_theme_setup');





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function example_theme_content_width()
{
    $GLOBALS['content_width'] = apply_filters('example_theme_content_width', 640);
}
add_action('after_setup_theme', 'example_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function example_theme_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'example-theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'example-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'example_theme_widgets_init');


/**
 * Register Taxonomy
 */

add_action('init', 'example_theme_taxonomies_init', 0);
function example_theme_taxonomies_init()
{
    $labels = array(
        'name' => __('Positions', 'example-theme'),
        'singular_name' => __('Position', 'example-theme'),
        'search_items' => __('Search Position', 'example-theme'),
        'all_items' => __('All Position', 'example-theme'),
        'parent_item' => __('Parent Position', 'example-theme'),
        'parent_item_colon' => __('Parent Position:', 'example-theme'),
        'edit_item' => __('Edit Position', 'example-theme'),
        'update_item' => __('Update Position', 'example-theme'),
        'add_new_item' => __('Add New Position', 'example-theme'),
        'new_item_name' => __('New Position Name', 'example-theme'),
        'menu_name' => __('Position', 'example-theme')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'rewrite' => false
    );
    register_taxonomy('positions', array('employees',), $args);

    $labels = array(
        'name' => __('Boards', 'example-theme'),
        'singular_name' => __('Board', 'example-theme'),
        'search_items' => __('Search Board', 'example-theme'),
        'all_items' => __('All Boards', 'example-theme'),
        'parent_item' => __('Parent Board', 'example-theme'),
        'parent_item_colon' => __('Parent Board:', 'example-theme'),
        'edit_item' => __('Edit Board', 'example-theme'),
        'update_item' => __('Update Board', 'example-theme'),
        'add_new_item' => __('Add New Board', 'example-theme'),
        'new_item_name' => __('New Board Name', 'example-theme'),
        'menu_name' => __('Board', 'example-theme')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'rewrite' => false
    );
    register_taxonomy('boards', array('employees',), $args);

    $labels = array(
        'name' => __('Team', 'example-theme'),
        'singular_name' => __('Team', 'example-theme'),
        'search_items' => __('Search Team', 'example-theme'),
        'all_items' => __('All Team', 'example-theme'),
        'parent_item' => __('Parent Team', 'example-theme'),
        'parent_item_colon' => __('Parent Team:', 'example-theme'),
        'edit_item' => __('Edit Team', 'example-theme'),
        'update_item' => __('Update Team', 'example-theme'),
        'add_new_item' => __('Add New Team', 'example-theme'),
        'new_item_name' => __('New Team Name', 'example-theme'),
        'menu_name' => __('Team', 'example-theme')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'rewrite' => false
    );
    register_taxonomy('team', array('employees',), $args);

    $labels = array(
        'name' => __('Types', 'example-theme'),
        'singular_name' => __('Type', 'example-theme'),
        'search_items' => __('Search Type', 'example-theme'),
        'all_items' => __('All Types', 'example-theme'),
        'parent_item' => __('Parent Type', 'example-theme'),
        'parent_item_colon' => __('Parent Type:', 'example-theme'),
        'edit_item' => __('Edit Type', 'example-theme'),
        'update_item' => __('Update Type', 'example-theme'),
        'add_new_item' => __('Add New Type', 'example-theme'),
        'new_item_name' => __('New Type Name', 'example-theme'),
        'menu_name' => __('Type', 'example-theme')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'rewrite' => false
    );
    register_taxonomy('types', array('events',), $args);

    $labels = array(
        'name' => __('Classes', 'example-theme'),
        'singular_name' => __('Class', 'example-theme'),
        'search_items' => __('Search Class', 'example-theme'),
        'all_items' => __('All Classes', 'example-theme'),
        'parent_item' => __('Parent Class', 'example-theme'),
        'parent_item_colon' => __('Parent Class:', 'example-theme'),
        'edit_item' => __('Edit Class', 'example-theme'),
        'update_item' => __('Update Class', 'example-theme'),
        'add_new_item' => __('Add New Class', 'example-theme'),
        'new_item_name' => __('New Class Name', 'example-theme'),
        'menu_name' => __('Class', 'example-theme')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'rewrite' => false
    );
    register_taxonomy('classes', array('resources',), $args);

    $labels = array(
        'name' => __('Kinds', 'example-theme'),
        'singular_name' => __('Kind', 'example-theme'),
        'search_items' => __('Search Kind', 'example-theme'),
        'all_items' => __('All Kinds', 'example-theme'),
        'parent_item' => __('Parent Kind', 'example-theme'),
        'parent_item_colon' => __('Parent Kind:', 'example-theme'),
        'edit_item' => __('Edit Kind', 'example-theme'),
        'update_item' => __('Update Kind', 'example-theme'),
        'add_new_item' => __('Add New Kind', 'example-theme'),
        'new_item_name' => __('New Kind Name', 'example-theme'),
        'menu_name' => __('Kind', 'example-theme')
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'rewrite' => false
    );
    register_taxonomy('kinds', array('books',), $args);
}






/**
 * Enqueue scripts and styles.
 */
function example_theme_scripts()
{
    wp_enqueue_style('example-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('example-theme-style', 'rtl', 'replace');

    wp_enqueue_script('example-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    // Load js bundle.
    $main_asset = include(get_template_directory() . '/assets/js/main.asset.php');

    if ($main_asset) {
        wp_enqueue_script('altum-main', get_template_directory_uri() . '/assets/js/main.js', $main_asset['dependencies'], $main_asset['version'], true);

        // Enqueue localize script.
        wp_localize_script('altum-main', 'altumMainParams', array(
            'rest_url' => untrailingslashit(rest_url('altum')),
            'nonce' => wp_create_nonce('wp_rest'),
            'filterQuery' => filterGetDefaultQueryArgs(),
            'booksQuery' => booksGetDefaultQueryArgs(),

        ));
    }

//    wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/js/layout-mode.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script( 'packery', get_template_directory_uri() . '/js/packery-mode.js', ['jquery'] , _S_VERSION );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.min.js', ['packery'] ,'3.0.6' , true);



    wp_enqueue_script( 'example-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );




    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick/slick.min.js');
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick/slick.css');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');

    global $wp_query;

    wp_localize_script('example-theme-navigation', 'my_ajax_object',
        array('ajax_url' => admin_url('admin-ajax.php'))
    );
}
add_action('wp_enqueue_scripts', 'example_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom W
 */

require get_template_directory() . '/inc/custom-wysiwyg.php';

/**
 * Custom Ajax
 */

require get_template_directory() . '/inc/ajax-my.php';






if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Footer Content',
        'menu_slug' => 'footer-content',
        'position' => '21',
        'icon_url' => 'dashicons-table-row-after',
    ));
}



// Removes from admin menu
add_action('admin_menu', 'my_remove_admin_menus');
function my_remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}

// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support()
{
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}
// Removes from admin bar
function mytheme_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');





function load_custom_wp_admin_style()
{
    wp_register_style('custom_wp_admin_css', get_bloginfo('stylesheet_directory') . '/admin-style.css', false, '1.0.0');
    wp_enqueue_style('custom_wp_admin_css');
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');




// Filter REST API route
add_action('rest_api_init', function () {
    register_rest_route('altum', '/posts', [
        'methods' => 'POST',
        'callback' => 'filterRestGetPosts',
    ]);

    register_rest_route('altum', '/books', [
        'methods' => 'POST',
        'callback' => 'RestGetBooks',
    ]);
});

// FIlter Rest API callback
function filterRestGetPosts(\WP_REST_Request $req)
{
    $args = $req->get_params();
    $filteredPosts = new WP_Query( $args );

    ob_start();

    if ( $filteredPosts->have_posts() ) {
        while ( $filteredPosts->have_posts() ) {
            $filteredPosts->the_post();
            get_template_part( 'template-parts/content' );
        }

        wp_reset_postdata();
    } else {
        ?>
        <p>No posts found</p>
        <?php
    }

    $html = ob_get_clean();

    return new \WP_REST_Response( [
        'data' => $html,
        'found_posts' => $filteredPosts->found_posts,
        'current_page' => $filteredPosts->query_vars['paged'],
        'max_num_pages' => $filteredPosts->max_num_pages,
    ] );
}

// Filter Values
function filterGetFilteredItems()
{
    $tags = get_terms('post_tag', array('hide_empty' => false));

    return array_map(function ($item) {
        return (object) [
            'id' => $item->term_id,
            'name' => $item->name,
            'count' => $item->count,
        ];
    }, $tags);
}

// Filter Query Args
function filterGetDefaultQueryArgs()
{
    return [
        'post_type' => 'post',
        'order' => 'ASC',
        'orderby' => 'date',
        'posts_per_page' => 4,
        'paged' => 1
    ];
}


//BOOKS
// FIlter Rest API callback
function RestGetBooks(\WP_REST_Request $req)
{
    $args = $req->get_params();
    $filteredPosts = new WP_Query( $args );

    ob_start();

    if ( $filteredPosts->have_posts() ) {
        while ( $filteredPosts->have_posts() ) {
            $filteredPosts->the_post();
            get_template_part( 'template-parts/content-books-review' );
        }

        wp_reset_postdata();
    } else {
        ?>
        <p>No posts found</p>
        <?php
    }

    $html = ob_get_clean();

    return new \WP_REST_Response( [
        'data' => $html,
        'found_posts' => $filteredPosts->found_posts,
        'current_page' => $filteredPosts->query_vars['paged'],
        'max_num_pages' => $filteredPosts->max_num_pages,
    ] );
}

function booksGetDefaultQueryArgs()
{
    return [
        'post_type' => 'books',
        'orderby' => 'description',
        'order' => 'ASC',
        'posts_per_page' => 2,
        'paged' => 1,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'kinds',
                'terms' => 'reviews',
                'field' => 'slug',
            )
        ),
    ];
}


// Newsletters Query Args
function newslettersGetQueryArgs($year)
{
    return [
        'post_type' => 'newsletters',
        'orderby' => 'description',
        'order' => 'DESC',
        'post_per_page' => -1,
        'post_status' => 'publish',
        'hide_empty' => true,
        'date_query' => array(array(
            'year' => $year,
        ),),
    ];
}
function newslettersGetQueryArgsmob($year)
{
    return [
        'post_type' => 'newsletters',
        'orderby' => 'description',
        'order' => 'DESC',
        'post_per_page' => 5,
        'post_status' => 'publish',
        'hide_empty' => true,
        'date_query' => array(array(
            'year' => $year,
        ),),
    ];
}