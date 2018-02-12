<?php
/*
Plugin Name: Disable Author Pages
Plugin URI: https://www.littlebizzy.com/plugins/disable-author-pages
Description: Completely disables author archives which then become 404 errors, converts author links to homepage links, and works with or without fancy permalinks.
Version: 1.0.4
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Prefix: DATPGS
*/

// Admin Notices module
require_once dirname(__FILE__).'/admin-notices.php';
DATPGS_Admin_Notices::instance(__FILE__);


/**
 * Define main plugin class
 */
class LB_Disable_Author_Pages {

	/**
	 * A reference to an instance of this class.
	 *
	 * @since 1.0.0
	 * @var   object
	 */
	private static $instance = null;

	/**
	 * Initalize plugin actions
	 *
	 * @return void
	 */
	public function init() {

		// Set 404 page for author archives
		add_action( 'template_redirect', array( $this, 'disable_author_pages' ), 0 );

		// Replace author link URL with home URL for get_author_posts_url (for manually builded links)
		add_filter( 'author_link', array( $this, 'disable_author_link_url' ), 99 );
		// Totally replace author link tag (for kinks, generated with get_the_author_posts_link() fucntion)
		add_filter( 'the_author_posts_link', array( $this, 'disable_author_link_tag' ), 99 );
	}

	/**
	 * Set 404 page for author archive pages on template redirect.
	 *
	 * @return void
	 */
	public function disable_author_pages() {

		if ( $this->is_author() ) {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
		}

	}

	/**
	 * Stnadard WP is_author() function with additional check for non-ID author parameters in pain query.
	 *
	 * @return boolean
	 */
	public function is_author() {

		if ( ! empty( $_GET['author'] ) ) {
			return true;
		} else {
			return is_author();
		}

	}

	/**
	 * Return home URL instead of author archive URL in get_author_posts_url function.
	 *
	 * @param  string $url Default author archive URL.
	 * @return string      Home URL.
	 */
	public function disable_author_link_url( $url ) {

		/**
		 * Alow rewrite URL, which replaces author link form theme or 3rd party plugin.
		 *
		 * @var string
		 */
		return apply_filters( 'lb_replace_author_link_url', esc_url( home_url( '/' ) ) );

	}

	/**
	 * Return clean Author name instead of link tag for author links builded with get_the_author_posts_link() fucntion.
	 *
	 * @param  string $link Author posts link.
	 * @return string       Clean author name.
	 */
	public function disable_author_link_tag( $link ) {

		/**
		 * Allow rewrite author name output format in theme or 3rd party plugin. %s will be replaces with author name.
		 *
		 * @var string
		 */
		$format = apply_filters( 'lb_clean_author_name_format', '%s' );

		return sprintf( $format, get_the_author() );
	}

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}

/**
 * Returns instance of LB_Disable_Author_Pages class
 *
 * @return object
 */
function lb_disable_author_pages() {
	return LB_Disable_Author_Pages::get_instance();
}

// Initalize plugin on 'init' hook (plugin nothing to do earlier)
add_action( 'init', array( lb_disable_author_pages(), 'init' ) );
