<?php
/*
Plugin Name: Disable Author Pages
Plugin URI: https://www.littlebizzy.com/plugins/disable-author-pages
Description: Disables author pages and links
Version: 2.0.5
Requires PHP: 7.0
Tested up to: 6.7
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Update URI: false
GitHub Plugin URI: littlebizzy/disable-author-pages
Primary Branch: master
Text Domain: disable-author-pages
*/

// prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// override wordpress.org with git updater
add_filter( 'gu_override_dot_org', function( $overrides ) {
    $overrides[] = 'disable-author-pages/disable-author-pages.php';
    return $overrides;
}, 999 );

// Disable author pages by returning a 404 status and letting WordPress handle the template
add_action('template_redirect', function () {
    // Check if the request is not in the admin area and is trying to load an author page
    if (!is_admin() && (is_author() || (isset($_GET['author']) && $_GET['author']))) {
        global $wp_query;
        // Set a 404 status for the request
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
        // Load the 404 template and stop further execution
        include(get_query_template('404'));
        exit;  // Exit to prevent further processing
    }
}, 1);

// Disable author links
add_filter('author_link', '__return_false', 99);
add_filter('the_author_posts_link', function () {
    return ''; // Return an empty string to remove any author link
}, 99);

// Remove only author-specific feed link from the head
remove_action('wp_head', 'wp_author_feed_link');

// Remove all filters from 'author_link' to prevent other plugins or themes from modifying author URLs.
remove_all_filters('author_link');

// remove users (author) sitemap from wordpress core xml sitemaps
add_filter( 'wp_sitemaps_add_provider', function ( $provider, $name ) {
    if ( $name === 'users' ) {
        return false;
    }
    return $provider;
}, 10, 2 );

// block all author archive templates
add_filter( 'template_include', function ( $template ) {
    if ( is_author() ) {
        global $wp_query;
        $wp_query->set_404();
        $wp_query->is_404 = true; // ensure wordpress treats it as a 404
        status_header( 404 );
        nocache_headers();
        return get_query_template( '404' );
    }
    return $template;
} );

// remove only author links from rest api responses
add_filter( 'rest_prepare_post', function ( $response, $post, $request ) {
    $data = $response->get_data();

    if ( isset( $data['_links']['author'] ) ) {
        unset( $data['_links']['author'] ); // remove only the author link
    }

    $response->set_data( $data );
    return $response;
}, 10, 3 );

// Ref: ChatGPT
