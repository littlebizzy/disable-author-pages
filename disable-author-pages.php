<?php
/*
Plugin Name: Disable Author Pages
Plugin URI: https://www.littlebizzy.com/plugins/disable-author-pages
Description: Disables author pages and links
Version: 3.0.0
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

// redirect all author archive pages to homepage with a 301 status
add_action( 'template_redirect', function () {
    if ( ! is_admin() && is_author() ) {
        wp_safe_redirect( home_url(), 301 );
        exit;
    }
}, 1 );

// disable author links across wordpress
add_filter( 'author_link', '__return_false', 99 );
add_filter( 'get_author_posts_url', '__return_false', 99 );
add_filter( 'the_author_posts_link', '__return_empty_string', 99 );

// remove author-specific feed link from the head
remove_action( 'wp_head', 'wp_author_feed_link' );

// ensure no plugin or theme modifies author urls
remove_all_filters( 'author_link' );
remove_all_filters( 'get_author_posts_url' );

// remove users (author) sitemap from wordpress core xml sitemaps
add_filter( 'wp_sitemaps_add_provider', function ( $provider, $name ) {
    if ( $name === 'users' ) {
        return false;
    }
    return $provider;
}, 10, 2 );

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
