# Disable Author Pages

Disables author pages and links

## Changelog

### 2.0.5
- removed redundant `$_GET['author']` check and now handled by `is_author()`
- now using `is_author()` instead of `basename($template)` for template blocking
- added another `add_filter` and `remove_all_filters` instances
- added `Tested up to` header
- added `Update URI` header
- added `Text Domain` header
- various code cleanup and better formatting

### 2.0.4
- added `Requires PHP` header

### 2.0.3
- improved `gu_override_dot_org` snippet

### 2.0.2
- fixed `gu_override_dot_org` snippet

### 2.0.1
- ensure `404.php` template used for any 404 errors

### 2.0.0
- completely refactored to WordPress standards
- more robust 404 error on author pages now including author feeds and any author numeration attempts 
- author links now disabled instead of converting them to homepage links
- author feed links now removed from header
- author sitemaps now disabled in WP Core XML sitemaps
- direct access to author.php now disabled
- supports PHP 7.0 to 8.3
- supports Multisite

### 1.3.0
- tested with WP 6.5
- forced version update

### 1.2.1
- added disable wordpress.org snippet

### 1.2.0
- support for Git Updater
- removed all admin notices
- simpler plugin structure

### 1.1.0
- tested with WP 5.0
- updated plugin meta

### 1.0.5
- updated plugin meta

### 1.0.4
- added warning for Multisite installations
- updated recommended plugins

### 1.0.3
- tested with WP 4.9
- added support for `DISABLE_NAG_NOTICES`

### 1.0.2
- added recommended plugins notice
- added rating request notice
- updated plugin meta

### 1.0.1
- tested with WP 4.8

### 1.0.0
- initial release
- tested with PHP 7.0
