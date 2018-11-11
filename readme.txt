=== Disable Author Pages ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: disable, remove, author, pages, archives
Requires at least: 4.4
Tested up to: 5.0
Stable tag: 1.1.0
Multisite support: No
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DATPGS

Completely disables author archives which then become 404 errors, converts author links to homepage links, and works with or without fancy permalinks.

== Description ==

Completely disables author archives which then become 404 errors, converts author links to homepage links, and works with or without fancy permalinks.

* [**Join our FREE Facebook group for support**](https://www.facebook.com/groups/littlebizzy/)
* [**Worth a 5-star review? Thank you!**](https://wordpress.org/support/plugin/disable-author-pages-littlebizzy/reviews/?rate=5#new-post)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/disable-author-pages)
* [Plugin GitHub](https://github.com/littlebizzy/disable-author-pages)

#### Current Features ####

The vast majority of WordPress (and esp. WooCommerce) websites have no need for author pages, otherwise known as author archives. This is because by default, the author pages in WordPress simply show an "archive" of all the blog posts that the author has written for that blog or site. In otherwords, its just duplicate content and has no value. This can not only get you penalized in Google search results (SEO issues) but also confuse users who click on the author link expecting some information about the author himself (or herself). If your theme has custom author templates with information about that author such as biography, social media profile links, etc they may be worth keeping but otherwise, it's usually better to disable them.

* disables all `/author/...` and `/?author=123` permalinks/archives
* generates 404 errors in their place
* no 301 redirects, to avoid the plugin doing more than it's description
* recommended to use with our 404 To Homepage free plugin
* works with pretty permalinks or the default dynamic author id query links
* converts any author links in your template to homepage links

In future versions, we will try to convert author links to be null (strip out hyperlink).

And better support for turning /?author=1 to be 404 errors (forcing it) while avoding redirecting to nice authornames too to prevent hackers from discovering admin usernames etc.

#### Compatibility ####

This plugin has been designed for use on [SlickStack](https://slickstack.io) web servers with PHP 7.2 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and usability reasons, we highly recommend avoiding WordPress Multisite for the vast majority of projects.

Any of our WordPress plugins may also be loaded as "Must-Use" plugins by using our free [Autoloader](https://github.com/littlebizzy/autoloader) script in the `mu-plugins` directory.

#### Defined Constants ####

    /* Plugin Meta */
    define('DISABLE_NAG_NOTICES', true);

#### Plugin Features ####

* Prefix: DATPGS
* Parent Plugin: [**SEO Genius**](https://www.littlebizzy.com/plugins/seo-genius)
* Disable Nag Notices: [Yes](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices#Disable_Nag_Notices)
* Settings Page: No
* PHP Namespaces: No
* Object-Oriented Code: No
* Includes Media (images, icons, etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * WP Options Table: Yes
  * Other Tables: No
  * Creates New Tables: No
  * Creates New WP Cron Jobs: No
* Database Queries: Backend Only (Options API)
* Must-Use Support: [Yes](https://github.com/littlebizzy/autoloader)
* Multisite Support: No
* Uninstalls Data: Yes

#### Special Thanks ####

[Alex Georgiou](https://www.alexgeorgiou.gr), [Automattic](https://automattic.com), [Brad Touesnard](https://bradt.ca), [Daniel Auener](http://www.danielauener.com), [Delicious Brains](https://deliciousbrains.com), [Greg Rickaby](https://gregrickaby.com), [Matt Mullenweg](https://ma.tt), [Mika Epstein](https://halfelf.org), [Mike Garrett](https://mikengarrett.com), [Samuel Wood](http://ottopress.com), [Scott Reilly](http://coffee2code.com), [Jan Dembowski](https://profiles.wordpress.org/jdembowski), [Jeff Starr](https://perishablepress.com), [Jeff Chandler](https://jeffc.me), [Jeff Matson](https://jeffmatson.net), [Jeremy Wagner](https://jeremywagner.me), [John James Jacoby](https://jjj.blog), [Leland Fiegel](https://leland.me), [Luke Cavanagh](https://github.com/lukecav), [Mike Jolley](https://mikejolley.com), [Pau Iglesias](https://pauiglesias.com), [Paul Irish](https://www.paulirish.com), [Rahul Bansal](https://profiles.wordpress.org/rahul286), [Roots](https://roots.io), [rtCamp](https://rtcamp.com), [Ryan Hellyer](https://geek.hellyer.kiwi), [WP Chat](https://wpchat.com), [WP Tavern](https://wptavern.com)

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep these conditions in mind, and refrain from slandering, threatening, or harassing our team members in order to get a feature added, or to otherwise get "free" support. The only place you should be contacting us is in our free [**Facebook group**](https://www.facebook.com/groups/littlebizzy/) which has been setup for this purpose, or via GitHub if you are an experienced developer. Thank you!

#### Our Philosophy ####

> "Decisions, not options." -- WordPress.org

> "Everything should be made as simple as possible, but not simpler." -- Albert Einstein, et al

> "Write programs that do one thing and do it well... write programs to work together." -- Doug McIlroy

> "The innovation that this industry talks about so much is bullshit. Anybody can innovate... 99% of it is 'Get the work done.' The real work is in the details." -- Linus Torvalds

#### Search Keywords ####

disable, disable author archives, disable author pages, remove, remove author archives, remove author pages

== Installation ==

1. Upload to `/wp-content/plugins/disable-author-pages-littlebizzy/`
2. Activate via WP Admin > Plugins
3. Test plugin is working:

After plugin activation, purge all caches. Then, load the URI of any given author that exists on your site, and it should result in a 404 Not Found error being generated. If you are using our 404 To Homepage plugin, it should also 301 redirect to the homepage immediately.

== Frequently Asked Questions ==

= How can I change this plugin's settings? =

There is no settings page to maintain speed and simplicity.

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Instead, join our Facebook group.

== Changelog ==

= 1.1.0 =
* tested with WP 5.0
* updated plugin meta

= 1.0.5 =
* updated plugin meta

= 1.0.4 =
* added warning for Multisite installations
* updated recommended plugins

= 1.0.3 =
* tested with WP 4.9
* added support for `DISABLE_NAG_NOTICES`

= 1.0.2 =
* added recommended plugins notice
* added rating request notice
* updated plugin meta

= 1.0.1 =
* tested with WP 4.8

= 1.0.0 =
* initial release
* tested with PHP 7.0
