<?php

/**
 * @file
 * Drupal site-specific configuration file.
 *
 * IMPORTANT NOTE:
 * This file may have been set to read-only by the Drupal installation program.
 * If you make changes to this file, be sure to protect it again after making
 * your modifications. Failure to remove write permissions to this file is a
 * security risk.
 *
 * The configuration file to be loaded is based upon the rules below. However
 * if the multisite aliasing file named sites/sites.php is present, it will be
 * loaded, and the aliases in the array $sites will override the default
 * directory rules below. See sites/example.sites.php for more information about
 * aliases.
 *
 * The configuration directory will be discovered by stripping the website's
 * hostname from left to right and pathname from right to left. The first
 * configuration file found will be used and any others will be ignored. If no
 * other configuration file is found then the default configuration file at
 * 'sites/default' will be used.
 *
 * For example, for a fictitious site installed at
 * http://www.drupal.org:8080/mysite/test/, the 'settings.php' file is searched
 * for in the following directories:
 *
 * - sites/8080.www.drupal.org.mysite.test
 * - sites/www.drupal.org.mysite.test
 * - sites/drupal.org.mysite.test
 * - sites/org.mysite.test
 *
 * - sites/8080.www.drupal.org.mysite
 * - sites/www.drupal.org.mysite
 * - sites/drupal.org.mysite
 * - sites/org.mysite
 *
 * - sites/8080.www.drupal.org
 * - sites/www.drupal.org
 * - sites/drupal.org
 * - sites/org
 *
 * - sites/default
 *
 * Note that if you are installing on a non-standard port number, prefix the
 * hostname with that number. For example,
 * http://www.drupal.org:8080/mysite/test/ could be loaded from
 * sites/8080.www.drupal.org.mysite.test/.
 *
 * @see example.sites.php
 * @see conf_path()
 */

/**
 * Make sure we have a multisite identifier so we can use it to segregate
 * file directories.
 */
defined('MULTISITE_IDENTIFIER') || define('MULTISITE_IDENTIFIER', 'default');

/**
 * Access control for update.php script.
 *
 * If you are updating your Drupal installation using the update.php script but
 * are not logged in using either an account with the "Administer software
 * updates" permission or the site maintenance account (the account that was
 * created during installation), you will need to modify the access check
 * statement below. Change the FALSE to a TRUE to disable the access check.
 * After finishing the upgrade, be sure to open this file again and change the
 * TRUE back to a FALSE!
 */
$update_free_access = FALSE;

/**
 * Base URL (optional).
 *
 * If Drupal is generating incorrect URLs on your site, which could
 * be in HTML headers (links to CSS and JS files) or visible links on pages
 * (such as in menus), uncomment the Base URL statement below (remove the
 * leading hash sign) and fill in the absolute URL to your Drupal installation.
 *
 * You might also want to force users to use a given domain.
 * See the .htaccess file for more information.
 *
 * Examples:
 *   $base_url = 'http://www.example.com';
 *   $base_url = 'http://www.example.com:8888';
 *   $base_url = 'http://www.example.com/drupal';
 *   $base_url = 'https://www.example.com:8888/drupal';
 *
 * It is not allowed to have a trailing slash; Drupal will add it
 * for you.
 */
# $base_url = 'http://www.example.com';  // NO trailing slash!

/**
 * PHP settings:
 *
 * To see what PHP settings are possible, including whether they can be set at
 * runtime (by using ini_set()), read the PHP documentation:
 * http://www.php.net/manual/en/ini.list.php
 * See drupal_environment_initialize() in includes/bootstrap.inc for required
 * runtime settings and the .htaccess file for non-runtime settings. Settings
 * defined there should not be duplicated here so as to avoid conflict issues.
 */

/**
 * Some distributions of Linux (most notably Debian) ship their PHP
 * installations with garbage collection (gc) disabled. Since Drupal depends on
 * PHP's garbage collection for clearing sessions, ensure that garbage
 * collection occurs by using the most common settings.
 */
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

/**
 * Set session lifetime (in seconds), i.e. the time from the user's last visit
 * to the active session may be deleted by the session garbage collector. When
 * a session is deleted, authenticated users are logged out, and the contents
 * of the user's $_SESSION variable is discarded.
 */
ini_set('session.gc_maxlifetime', 200000);

/**
 * Set session cookie lifetime (in seconds), i.e. the time from the session is
 * created to the cookie expires, i.e. when the browser is expected to discard
 * the cookie. The value 0 means "until the browser is closed".
 */
ini_set('session.cookie_lifetime', 2000000);

/**
 * If you encounter a situation where users post a large amount of text, and
 * the result is stripped out upon viewing but can still be edited, Drupal's
 * output filter may not have sufficient memory to process it.  If you
 * experience this issue, you may wish to uncomment the following two lines
 * and increase the limits of these variables.  For more information, see
 * http://php.net/manual/en/pcre.configuration.php.
 */
# ini_set('pcre.backtrack_limit', 200000);
# ini_set('pcre.recursion_limit', 200000);

/**
 * Drupal automatically generates a unique session cookie name for each site
 * based on its full domain name. If you have multiple domains pointing at the
 * same Drupal site, you can either redirect them all to a single domain (see
 * comment in .htaccess), or uncomment the line below and specify their shared
 * base domain. Doing so assures that users remain logged in as they cross
 * between your various domains. Make sure to always start the $cookie_domain
 * with a leading dot, as per RFC 2109.
 */
$cookie_domain = '.' . $_SERVER['HTTP_HOST'];

/**
 * Variable overrides:
 *
 * To override specific entries in the 'variable' table for this site,
 * set them here. You usually don't need to use this feature. This is
 * useful in a configuration file for a vhost or directory, rather than
 * the default settings.php. Any configuration setting from the 'variable'
 * table can be given a new value. Note that any values you provide in
 * these variable overrides will not be modifiable from the Drupal
 * administration interface.
 *
 * The following overrides are examples:
 * - site_name: Defines the site's name.
 * - theme_default: Defines the default theme for this site.
 * - anonymous: Defines the human-readable name of anonymous users.
 * Remove the leading hash signs to enable.
 */
# $conf['site_name'] = 'My Drupal site';
# $conf['theme_default'] = 'garland';
# $conf['anonymous'] = 'Visitor';

/**
 * A custom theme can be set for the offline page. This applies when the site
 * is explicitly set to maintenance mode through the administration page or when
 * the database is inactive due to an error. It can be set through the
 * 'maintenance_theme' key. The template file should also be copied into the
 * theme. It is located inside 'modules/system/maintenance-page.tpl.php'.
 * Note: This setting does not apply to installation and update pages.
 */
# $conf['maintenance_theme'] = 'bartik';

/**
 * Reverse Proxy Configuration:
 *
 * Reverse proxy servers are often used to enhance the performance
 * of heavily visited sites and may also provide other site caching,
 * security, or encryption benefits. In an environment where Drupal
 * is behind a reverse proxy, the real IP address of the client should
 * be determined such that the correct client IP address is available
 * to Drupal's logging, statistics, and access management systems. In
 * the most simple scenario, the proxy server will add an
 * X-Forwarded-For header to the request that contains the client IP
 * address. However, HTTP headers are vulnerable to spoofing, where a
 * malicious client could bypass restrictions by setting the
 * X-Forwarded-For header directly. Therefore, Drupal's proxy
 * configuration requires the IP addresses of all remote proxies to be
 * specified in $conf['reverse_proxy_addresses'] to work correctly.
 *
 * Enable this setting to get Drupal to determine the client IP from
 * the X-Forwarded-For header (or $conf['reverse_proxy_header'] if set).
 * If you are unsure about this setting, do not have a reverse proxy,
 * or Drupal operates in a shared hosting environment, this setting
 * should remain commented out.
 *
 * In order for this setting to be used you must specify every possible
 * reverse proxy IP address in $conf['reverse_proxy_addresses'].
 * If a complete list of reverse proxies is not available in your
 * environment (for example, if you use a CDN) you may set the
 * $_SERVER['REMOTE_ADDR'] variable directly in settings.php.
 * Be aware, however, that it is likely that this would allow IP
 * address spoofing unless more advanced precautions are taken.
 */
# $conf['reverse_proxy'] = TRUE;

/**
 * Specify every reverse proxy IP address in your environment.
 * This setting is required if $conf['reverse_proxy'] is TRUE.
 */
# $conf['reverse_proxy_addresses'] = array('a.b.c.d', ...);

/**
 * Set this value if your proxy server sends the client IP in a header
 * other than X-Forwarded-For.
 */
# $conf['reverse_proxy_header'] = 'HTTP_X_CLUSTER_CLIENT_IP';

/**
 * Page caching:
 *
 * By default, Drupal sends a "Vary: Cookie" HTTP header for anonymous page
 * views. This tells a HTTP proxy that it may return a page from its local
 * cache without contacting the web server, if the user sends the same Cookie
 * header as the user who originally requested the cached page. Without "Vary:
 * Cookie", authenticated users would also be served the anonymous page from
 * the cache. If the site has mostly anonymous users except a few known
 * editors/administrators, the Vary header can be omitted. This allows for
 * better caching in HTTP proxies (including reverse proxies), i.e. even if
 * clients send different cookies, they still get content served from the cache.
 * However, authenticated users should access the site directly (i.e. not use an
 * HTTP proxy, and bypass the reverse proxy if one is used) in order to avoid
 * getting cached pages from the proxy.
 */
# $conf['omit_vary_cookie'] = TRUE;

/**
 * CSS/JS aggregated file gzip compression:
 *
 * By default, when CSS or JS aggregation and clean URLs are enabled Drupal will
 * store a gzip compressed (.gz) copy of the aggregated files. If this file is
 * available then rewrite rules in the default .htaccess file will serve these
 * files to browsers that accept gzip encoded content. This allows pages to load
 * faster for these users and has minimal impact on server load. If you are
 * using a webserver other than Apache httpd, or a caching reverse proxy that is
 * configured to cache and compress these files itself you may want to uncomment
 * one or both of the below lines, which will prevent gzip files being stored.
 */
# $conf['css_gzip_compression'] = FALSE;
# $conf['js_gzip_compression'] = FALSE;

/**
 * String overrides:
 *
 * To override specific strings on your site with or without enabling the Locale
 * module, add an entry to this list. This functionality allows you to change
 * a small number of your site's default English language interface strings.
 *
 * Remove the leading hash signs to enable.
 */
# $conf['locale_custom_strings_en'][''] = array(
#   'forum'      => 'Discussion board',
#   '@count min' => '@count minutes',
# );

/**
 *
 * IP blocking:
 *
 * To bypass database queries for denied IP addresses, use this setting.
 * Drupal queries the {blocked_ips} table by default on every page request
 * for both authenticated and anonymous users. This allows the system to
 * block IP addresses from within the administrative interface and before any
 * modules are loaded. However on high traffic websites you may want to avoid
 * this query, allowing you to bypass database access altogether for anonymous
 * users under certain caching configurations.
 *
 * If using this setting, you will need to add back any IP addresses which
 * you may have blocked via the administrative interface. Each element of this
 * array represents a blocked IP address. Uncommenting the array and leaving it
 * empty will have the effect of disabling IP blocking on your site.
 *
 * Remove the leading hash signs to enable.
 */
# $conf['blocked_ips'] = array(
#   'a.b.c.d',
# );

/**
 * Fast 404 pages:
 *
 * Drupal can generate fully themed 404 pages. However, some of these responses
 * are for images or other resource files that are not displayed to the user.
 * This can waste bandwidth, and also generate server load.
 *
 * The options below return a simple, fast 404 page for URLs matching a
 * specific pattern:
 * - 404_fast_paths_exclude: A regular expression to match paths to exclude,
 *   such as images generated by image styles, or dynamically-resized images.
 *   If you need to add more paths, you can add '|path' to the expression.
 * - 404_fast_paths: A regular expression to match paths that should return a
 *   simple 404 page, rather than the fully themed 404 page. If you don't have
 *   any aliases ending in htm or html you can add '|s?html?' to the expression.
 * - 404_fast_html: The html to return for simple 404 pages.
 *
 * Add leading hash signs if you would like to disable this functionality.
 */
$conf['404_fast_paths_exclude'] = '/\/(?:styles)\/|(?:robots.txt)|advagg_(cs|j)s/';
//$conf['404_fast_paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
$conf['404_fast_paths'] = '/(?<!robots)\.(txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
define('DRUPAL_FAST_404_HTML', '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title>404 Not Found</title></head><body><h1>Oops, not found - that\'s a 404 :-(</h1><p>The page you requested at "@path" doesn\'t exist here. Maybe you could try visiting <a href="/">the homepage</a>?</p><p>Sorry about that.</p></body></html>');
$conf['404_fast_html'] = DRUPAL_FAST_404_HTML . ' <!-- Drupal 404 -->';

/**
 * By default the page request process will return a fast 404 page for missing
 * files if they match the regular expression set in '404_fast_paths' and not
 * '404_fast_paths_exclude' above. 404 errors will simultaneously be logged in
 * the Drupal system log.
 *
 * You can choose to return a fast 404 page earlier for missing pages (as soon
 * as settings.php is loaded) by uncommenting the line below. This speeds up
 * server response time when loading 404 error pages and prevents the 404 error
 * from being logged in the Drupal system log. In order to prevent valid pages
 * such as image styles and other generated content that may match the
 * '404_fast_html' regular expression from returning 404 errors, it is necessary
 * to add them to the '404_fast_paths_exclude' regular expression above. Make
 * sure that you understand the effects of this feature before uncommenting the
 * line below.
 */
drupal_fast_404();

/**
 * External access proxy settings:
 *
 * If your site must access the Internet via a web proxy then you can enter
 * the proxy settings here. Currently only basic authentication is supported
 * by using the username and password variables. The proxy_user_agent variable
 * can be set to NULL for proxies that require no User-Agent header or to a
 * non-empty string for proxies that limit requests to a specific agent. The
 * proxy_exceptions variable is an array of host names to be accessed directly,
 * not via proxy.
 */
# $conf['proxy_server'] = '';
# $conf['proxy_port'] = 8080;
# $conf['proxy_username'] = '';
# $conf['proxy_password'] = '';
# $conf['proxy_user_agent'] = '';
# $conf['proxy_exceptions'] = array('127.0.0.1', 'localhost');

/**
 * Authorized file system operations:
 *
 * The Update manager module included with Drupal provides a mechanism for
 * site administrators to securely install missing updates for the site
 * directly through the web user interface. On securely-configured servers,
 * the Update manager will require the administrator to provide SSH or FTP
 * credentials before allowing the installation to proceed; this allows the
 * site to update the new files as the user who owns all the Drupal files,
 * instead of as the user the webserver is running as. On servers where the
 * webserver user is itself the owner of the Drupal files, the administrator
 * will not be prompted for SSH or FTP credentials (note that these server
 * setups are common on shared hosting, but are inherently insecure).
 *
 * Some sites might wish to disable the above functionality, and only update
 * the code directly via SSH or FTP themselves. This setting completely
 * disables all functionality related to these authorized file operations.
 *
 * @see http://drupal.org/node/244924
 *
 * Remove the leading hash signs to disable.
 */
$conf['allow_authorize_operations'] = FALSE;

/**
 * Fast 404 settings:
 *
 * Fast 404 will do two separate types of 404 checking.
 *
 * The first is to check for URLs which appear to be files or images. If Drupal
 * is handling these items, then they were not found in the file system and are
 * a 404.
 *
 * The second is to check whether or not the URL exists in Drupal by checking
 * with the menu router, aliases and redirects. If the page does not exist, we
 * will server a fast 404 error and exit.
 */

# Load the fast_404.inc file. This is needed if you wish to do extension
# checking in settings.php.
if (is_readable('../www/sites/all/modules/contrib/fast_404/fast_404.inc')) {
  include_once('../www/sites/all/modules/contrib/fast_404/fast_404.inc');
  define('FAST_404_INCLUDED', TRUE);
}

# Disallowed extensions. Any extension in here will not be served by Drupal and
# will get a fast 404.
# Default extension list, this is considered safe and is even in queue for
# Drupal 8 (see: http://drupal.org/node/76824).
//$conf['fast_404_exts'] = '/^(?!robots).*\.(txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
$conf['fast_404_exts'] = '/(?<!robots)\.(txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';

# If you use a private file system use the conf variable below and change the
# 'sites/default/private' to your actual private files path
# $conf['fast_404_exts'] = '/^(?!robots)^(?!sites\/default\/private).*\.(txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';

# If you are using the Advanced Help module, the following config may be used
# to allow paths starting with 'help'.
# $conf['fast_404_exts'] = '/^(?!help\/)(?!robots).*\.(txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/';

# If you would prefer a stronger version of NO then return a 410 instead of a
# 404. This informs clients that not only is the resource currently not present
# but that it is not coming back and kindly do not ask again for it.
# Reference: http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
# $conf['fast_404_return_gone'] = TRUE;

# Allow anonymous users to hit URLs containing 'imagecache' even if the file
# does not exist. TRUE is default behavior. If you know all imagecache
# variations are already made set this to FALSE.
$conf['fast_404_allow_anon_imagecache'] = TRUE;

# If you use FastCGI, uncomment this line to send the type of header it needs.
# Reference: http://php.net/manual/en/function.header.php
# $conf['fast_404_HTTP_status_method'] = 'FastCGI';

# Extension list requiring whitelisting to be activated **If you use this
# without whitelisting enabled your site will not load!
//$conf['fast_404_exts'] = '/\.(txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp|php|html?|xml)$/i';

# Default fast 404 error message.
$conf['fast_404_html'] = DRUPAL_FAST_404_HTML . ' <!-- Fast 404 module -->';

# Check paths during bootstrap and see if they are legitimate.
$conf['fast_404_path_check'] = FALSE;

# If enabled, you may add extensions such as xml and php to the
# $conf['fast_404_exts'] above. BE CAREFUL with this setting as some modules
# use their own php files and you need to be certain they do not bootstrap
# Drupal. If they do, you will need to whitelist them too.
$conf['fast_404_url_whitelisting'] = FALSE;

# Array of whitelisted files/urls. Used if whitelisting is set to TRUE.
$conf['fast_404_whitelist'] = array(
  'index.php',
  'rss.xml',
  'install.php',
  'cron.php',
  'update.php',
  'xmlrpc.php',
);

# Array of whitelisted URL fragment strings that conflict with fast_404.
$conf['fast_404_string_whitelisting'] = array('cdn/farfuture', '/advagg_');

# By default we will show a super plain 404, because usually errors like this are shown to browsers who only look at the headers.
# However, some cases (usually when checking paths for Drupal pages) you may want to show a regular 404 error. In this case you can
# specify a URL to another page and it will be read and displayed (it can't be redirected to because we have to give a 30x header to
# do that. This page needs to be in your docroot.
#$conf['fast_404_HTML_error_page'] = './my_page.html';

# By default the custom 404 page is only loaded for path checking. Load it for all 404s with the below option set to TRUE
$conf['fast_404_HTML_error_all_paths'] = FALSE;

# Call the extension checking now. This will skip any logging of 404s.
# Extension checking is safe to do from settings.php. There are many
# examples of this on Drupal.org.
if (defined(FAST_404_INCLUDED)) {
  fast_404_ext_check();
}

# Path checking. USE AT YOUR OWN RISK (only works with MySQL).
# Path checking at this phase is more dangerous, but faster. Normally
# Fast_404 will check paths during Drupal boostrap via hook_boot. Checking
# paths here is faster, but trickier as the Drupal database connections have
# not yet been made and the module must make a separate DB connection. Under
# most configurations this DB connection will be reused by Drupal so there
# is no waste.
# While this setting finds 404s faster, it adds a bit more load time to
# regular pages, so only use if you are spending too much CPU/Memory/DB on
# 404s and the trade-off is worth it.
# This setting will deliver 404s with less than 2MB of RAM.
//fast_404_path_check();

// Allow all TLDs in Link fields. List from
// https://www.icann.org/resources/pages/tlds-2012-02-25-en
// Version 2014102800, Last Updated Tue Oct 28 07:07:01 2014 UTC
// Omitting TLDs covered by LINK_DOMAINS and 2-character TLDs.
$conf['link_extra_domains'] = array(
  'abogado', 'academy', 'accountants', 'active', 'actor', 'agency', 'airforce',
  'allfinanz', 'alsace', 'archi', 'army', 'associates', 'attorney', 'auction',
  'audio', 'autos', 'axa', 'band', 'bar', 'bargains', 'bayern', 'beer',
  'berlin', 'best', 'bid', 'bike', 'bio', 'black', 'blackfriday', 'blue',
  'bmw', 'bnpparibas', 'boo', 'boutique', 'brussels', 'budapest', 'build',
  'builders', 'business', 'buzz', 'bzh', 'cab', 'cal', 'camera', 'camp',
  'cancerresearch', 'capetown', 'capital', 'caravan', 'cards', 'care',
  'career', 'careers', 'casa', 'cash', 'catering', 'center', 'ceo', 'cern',
  'channel', 'cheap', 'christmas', 'chrome', 'church', 'citic', 'city',
  'claims', 'cleaning', 'click', 'clinic', 'clothing', 'club', 'codes',
  'coffee', 'college', 'cologne', 'community', 'company', 'computer', 'condos',
  'construction', 'consulting', 'contractors', 'cooking', 'cool', 'country',
  'credit', 'creditcard', 'crs', 'cruises', 'cuisinella', 'cymru', 'dad',
  'dance', 'dating', 'day', 'deals', 'degree', 'democrat', 'dental', 'dentist',
  'desi', 'diamonds', 'diet', 'digital', 'direct', 'directory', 'discount',
  'dnp', 'domains', 'durban', 'dvag', 'eat', 'education', 'email', 'emerck',
  'engineer', 'engineering', 'enterprises', 'equipment', 'esq', 'estate',
  'eus', 'events', 'exchange', 'expert', 'exposed', 'fail', 'farm', 'feedback',
  'finance', 'financial', 'fish', 'fishing', 'fitness', 'flights', 'florist',
  'flsmidth', 'fly', 'foo', 'forsale', 'foundation', 'frl', 'frogans', 'fund',
  'furniture', 'futbol', 'gal', 'gallery', 'gbiz', 'gent', 'gift', 'gifts',
  'gives', 'glass', 'gle', 'global', 'globo', 'gmail', 'gmo', 'gmx', 'google',
  'gop', 'graphics', 'gratis', 'green', 'gripe', 'guide', 'guitars', 'guru',
  'hamburg', 'haus', 'healthcare', 'help', 'here', 'hiphop', 'hiv', 'holdings',
  'holiday', 'homes', 'horse', 'host', 'hosting', 'house', 'how', 'ibm',
  'immo', 'immobilien', 'industries', 'ing', 'ink', 'institute', 'insure',
  'international', 'investments', 'jetzt', 'joburg', 'juegos', 'kaufen', 'kim',
  'kitchen', 'kiwi', 'koeln', 'krd', 'kred', 'lacaixa', 'land', 'lawyer',
  'lease', 'lgbt', 'life', 'lighting', 'limited', 'limo', 'link', 'loans',
  'london', 'lotto', 'ltda', 'luxe', 'luxury', 'maison', 'management', 'mango',
  'market', 'marketing', 'media', 'meet', 'melbourne', 'meme', 'menu', 'miami',
  'mini', 'moda', 'moe', 'monash', 'mortgage', 'moscow', 'motorcycles', 'mov',
  'nagoya', 'navy', 'network', 'neustar', 'new', 'nexus', 'ngo', 'nhk',
  'ninja', 'nra', 'nrw', 'nyc', 'okinawa', 'ong', 'onl', 'ooo', 'organic',
  'otsuka', 'ovh', 'paris', 'partners', 'parts', 'pharmacy', 'photo',
  'photography', 'photos', 'physio', 'pics', 'pictures', 'pink', 'pizza',
  'place', 'plumbing', 'pohl', 'poker', 'post', 'praxi', 'press', 'prod',
  'productions', 'prof', 'properties', 'property', 'pub', 'qpon', 'quebec',
  'realtor', 'recipes', 'red', 'rehab', 'reise', 'reisen', 'ren', 'rentals',
  'repair', 'report', 'republican', 'rest', 'restaurant', 'reviews', 'rich',
  'rio', 'rip', 'rocks', 'rodeo', 'rsvp', 'ruhr', 'ryukyu', 'saarland', 'sarl',
  'sca', 'scb', 'schmidt', 'schule', 'scot', 'services', 'sexy', 'shiksha',
  'shoes', 'singles', 'social', 'software', 'sohu', 'solar', 'solutions',
  'soy', 'space', 'spiegel', 'supplies', 'supply', 'support', 'surf',
  'surgery', 'suzuki', 'systems', 'taipei', 'tatar', 'tattoo', 'tax',
  'technology', 'tel', 'tienda', 'tips', 'tirol', 'today', 'tokyo', 'tools',
  'top', 'town', 'toys', 'trade', 'training', 'tui', 'university', 'uno',
  'uol', 'vacations', 'vegas', 'ventures', 'versicherung', 'vet', 'viajes',
  'villas', 'vision', 'vlaanderen', 'vodka', 'vote', 'voting', 'voto',
  'voyage', 'wales', 'wang', 'watch', 'webcam', 'website', 'wed', 'wedding',
  'whoswho', 'wien', 'wiki', 'williamhill', 'wme', 'work', 'works', 'world',
  'wtc', 'wtf', 'xn--1qqw23a', 'xn--3bst00m', 'xn--3ds443g', 'xn--3e0b707e',
  'xn--45brj9c', 'xn--4gbrim', 'xn--55qw42g', 'xn--55qx5d', 'xn--6frz82g',
  'xn--6qq986b3xl', 'xn--80adxhks', 'xn--80ao21a', 'xn--80asehdb',
  'xn--80aswg', 'xn--90a3ac', 'xn--c1avg', 'xn--cg4bki',
  'xn--clchc0ea0b2g2a9gcd', 'xn--czr694b', 'xn--czru2d', 'xn--d1acj3b',
  'xn--d1alf', 'xn--fiq228c5hs', 'xn--fiq64b', 'xn--fiqs8s', 'xn--fiqz9s',
  'xn--fpcrj9c3d', 'xn--fzc2c9e2c', 'xn--gecrj9c', 'xn--h2brj9c',
  'xn--i1b6b1a6a2e', 'xn--io0a7i', 'xn--j1amh', 'xn--j6w193g', 'xn--kprw13d',
  'xn--kpry57d', 'xn--kput3i', 'xn--l1acc', 'xn--lgbbat1ad8j', 'xn--mgb9awbf',
  'xn--mgba3a4f16a', 'xn--mgbaam7a8h', 'xn--mgbab2bd', 'xn--mgbayh7gpa',
  'xn--mgbbh1a71e', 'xn--mgbc0a9azcg', 'xn--mgberp4a5d4ar', 'xn--mgbx4cd0ab',
  'xn--ngbc5azd', 'xn--node', 'xn--nqv7f', 'xn--nqv7fs00ema', 'xn--o3cw4h',
  'xn--ogbpf8fl', 'xn--p1acf', 'xn--p1ai', 'xn--pgbs0dh', 'xn--q9jyb4c',
  'xn--rhqv96g', 'xn--s9brj9c', 'xn--ses554g', 'xn--unup4y',
  'xn--vermgensberater-ctb', 'xn--vermgensberatung-pwb', 'xn--vhquv',
  'xn--wgbh1c', 'xn--wgbl6a', 'xn--xhq521b', 'xn--xkc2al3hye2a',
  'xn--xkc2dl3a5ee0h', 'xn--yfro4i67o', 'xn--ygbi2ammx', 'xn--zfr164b', 'xxx',
  'xyz', 'yachts', 'yandex', 'yoga', 'yokohama', 'youtube', 'zip', 'zone',
);

/**
 * Greyhead custom settings.php code below.
 */
// Include the correct settings file. Paths relative to index.php!
define('SETTINGS_FILE_PATH', '../configuration/');
define('SETTINGS_FILE_DRUSH', 'drush.settings.php');
define('SETTINGS_FILE_LOCAL', 'local-development.settings.php');
define('SETTINGS_FILE_DEV', 'dev.settings.php');
define('SETTINGS_FILE_RC', 'rc.settings.php');
define('SETTINGS_FILE_LIVE', 'live.settings.php');

/**
 * Define our site types.
 */
define('ENVIRONMENT_TYPE_LOCAL', 'LOCAL');
define('ENVIRONMENT_TYPE_DRUSH', 'DRUSH');
define('ENVIRONMENT_TYPE_DEV', 'DEV');
define('ENVIRONMENT_TYPE_RC', 'RC');
define('ENVIRONMENT_TYPE_LIVE', 'LIVE');
define('ENVIRONMENT_TYPE_UNKNOWN', 'UNKNOWN');
define('SUBENVIRONMENT_TYPE_MAMP', 'MAMP');

// Define where we can find the database settings processor.
define('DATABASE_SETTINGS_PROCESSOR_PATH', 'database.settings.php');

/**
 * Set some default values for the $GLOBALS['greyhead_configuration'] array.
 */
$GLOBALS['greyhead_configuration'] = array(
//  'SETTINGS_SITE_URLS' => array('http://none'),
  'SETTINGS_SITE_URLS' => array(),
);

/**
 * The overridden_variables array can be used to list which Drupal variables
 * have been overridden in this configuration stage; the
 * greyhead_customisations.module can then form_alter these fields and disable
 * them to let administrators know they've been overridden, and can't be
 * changed.
 */
$conf['greyhead_configuration']['overridden_variables'] = array();

/**
 * Get the file location defaults.
 */
include_once '../configuration/includes/default-file-locations.php';

/**
 * Set the defaults for the Maillog module.
 */
$conf['maillog_send'] = TRUE;
$conf['maillog_log'] = FALSE;
$conf['maillog_devel'] = FALSE;
$conf['greyhead_configuration']['overridden_variables'][] = 'maillog_send';
$conf['greyhead_configuration']['overridden_variables'][] = 'maillog_log';
$conf['greyhead_configuration']['overridden_variables'][] = 'maillog_devel';

/**
 * Get the list of live site URLs, if any, from the settings.site_urls.info
 * file.
 */
$site_urls_info_contents = greyhead_configuration_get_site_urls(array(MULTISITE_IDENTIFIER));
$GLOBALS['greyhead_configuration']['SETTINGS_SITE_URLS'] =
  $GLOBALS['greyhead_configuration']['SETTINGS_SITE_URLS'] + $site_urls_info_contents;

$path_parts = explode('/', $_SERVER['REQUEST_URI']);

/**
 * Allow site-specific overrides now.
 *
 * @see site-specific-environment-overrides.php for more info.
 *
 * @see also local_settings.php, below.
 */
if (is_readable(SETTINGS_FILE_PATH . '/site-specific-environment-overrides.php')) {
  require_once SETTINGS_FILE_PATH . '/site-specific-environment-overrides.php';
}

/**
 * Work out what host we're on.
 *
 * If a file exists in the multisite directory, or above it (to make it easier
 * to mark a whole server as being a dev/staging/local server), with one of the
 * following names, we set the environment type regardless of anything else:
 *
 * - sites/[multisite directory]/ENVIRONMENT_TYPE_LIVE.txt
 * - sites/ENVIRONMENT_TYPE_LIVE.txt
 * - sites/[multisite directory]/ENVIRONMENT_TYPE_RC.txt
 * - sites/ENVIRONMENT_TYPE_RC.txt
 * - sites/[multisite directory]/ENVIRONMENT_TYPE_DEV.txt
 * - sites/ENVIRONMENT_TYPE_DEV.txt
 * - sites/[multisite directory]/ENVIRONMENT_TYPE_LOCAL.txt
 * - sites/ENVIRONMENT_TYPE_LOCAL.txt
 */
$environment_stub = 'ENVIRONMENT_TYPE_';
$file_extension = '.txt';

// Create a list of the environment types.
$environment_types = array(
  'LIVE',
  'RC',
  'DEV',
  'LOCAL',
);

// Create a list of possible file locations.
$possible_environment_file_locations = array(
  greyhead_configuration_get_path_to_sites_directory() . MULTISITE_IDENTIFIER . '/',
  greyhead_configuration_get_path_to_sites_directory(),
);

// Create a list of filenames (keys) and the environment types they map to
// (values).
$filenames_to_check = array();
foreach ($environment_types as $environment_type) {
  // Assemble the environment type, e.g.
  // /var/www/sites/[multisite]/[ENVIRONMENT_TYPE_][LIVE][.txt] => [ENVIRONMENT_TYPE_][LIVE]
  // /var/www/sites/[ENVIRONMENT_TYPE_][LIVE][.txt] => [ENVIRONMENT_TYPE_][LIVE]
  foreach ($possible_environment_file_locations as $possible_environment_file_location) {
    $filenames_to_check[$possible_environment_file_location . $environment_stub . $environment_type . $file_extension]
      = $environment_type;
  }
}

// Now loop through each environment type, and then through each possible
// location, and if a file exists matching that name, set the environment
// accordingly.
foreach ($filenames_to_check as $filename_to_check => $environment) {
  if (file_exists($filename_to_check)) {
    // We've found an environment file.
    defined('ENVIRONMENT_OVERRIDE_FILE') || define('ENVIRONMENT_OVERRIDE_FILE', $filename_to_check);
    defined('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH') || define('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH', SETTINGS_FILE_PATH . constant('SETTINGS_FILE_' . $environment));
    defined('CURRENT_ENVIRONMENT') || define('CURRENT_ENVIRONMENT', constant($environment_stub . $environment));
  }
}

/**
 * So if we haven't determined the environment by this point, then we now start
 * working backwards to try and identify the site by its URL. Totes obvsballs,
 * this won't work in Drush, so in an ideal world you would place an environment
 * file either in the multisite's directory, or in the sites directory above it.
 */
if (!defined('CURRENT_ENVIRONMENT')) {
// Are we on a URL which contains ".local" or ".4com.local"?
  if ((strpos($_SERVER['HTTP_HOST'], '.local') !== FALSE) ||
    (strpos($_SERVER['HTTP_HOST'], '.4com.local') !== FALSE)
  ) {
    defined('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH') || define('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH', SETTINGS_FILE_PATH . SETTINGS_FILE_LOCAL);

    defined('CURRENT_ENVIRONMENT') || define('CURRENT_ENVIRONMENT', ENVIRONMENT_TYPE_LOCAL);
  }
  elseif ((strpos($_SERVER['HTTP_HOST'], MULTISITE_IDENTIFIER . '.dev.fourstudio.co.uk') !== FALSE) ||
    (strpos($_SERVER['HTTP_HOST'], '.dev.fourplc.com') !== FALSE)
  ) {
    // We use a strpos check here instead of an absolute string comparison to
    // simplify using sub-sub-domains.

    // We're on the 4Com Dev server:
    defined('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH') || define('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH', SETTINGS_FILE_PATH . SETTINGS_FILE_DEV);
    defined('CURRENT_ENVIRONMENT') || define('CURRENT_ENVIRONMENT', ENVIRONMENT_TYPE_DEV);
  }
  elseif ((strpos($_SERVER['HTTP_HOST'], MULTISITE_IDENTIFIER . '.rc.fourstudio.co.uk') !== FALSE) ||
    (strpos($_SERVER['HTTP_HOST'], '.staging.fourplc.com') !== FALSE)
  ) {
    // We use a strpos check here instead of an absolute string comparison to
    // simplify using sub-sub-domains.

    // We're on the 4Com RC server:
    defined('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH') || define('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH', SETTINGS_FILE_PATH . SETTINGS_FILE_RC);
    defined('CURRENT_ENVIRONMENT') || define('CURRENT_ENVIRONMENT', ENVIRONMENT_TYPE_RC);
  }
  elseif (array_key_exists($_SERVER['HTTP_HOST'], $GLOBALS['greyhead_configuration']['SETTINGS_SITE_URLS'])) {
    // We're on the Live production server:
    defined('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH') || define('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH', SETTINGS_FILE_PATH . SETTINGS_FILE_LIVE);
    defined('CURRENT_ENVIRONMENT') || define('CURRENT_ENVIRONMENT', ENVIRONMENT_TYPE_LIVE);
  }
  elseif ($_SERVER['HTTP_HOST'] == MULTISITE_IDENTIFIER) {
    // Site has been accessed with the hostname but no bits after it, such as
    // ".dev.fourstudio.co.uk" or ".4com.local", or the multisite directory
    // contains the full hostname and doesn't match the above checks. It's
    // _probably_ Drush.
    defined('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH') || define('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH', SETTINGS_FILE_PATH . SETTINGS_FILE_DRUSH);

    defined('CURRENT_ENVIRONMENT') || define('CURRENT_ENVIRONMENT', ENVIRONMENT_TYPE_DRUSH);
  }
  else {
    // Cannot determine environment. Don't die though because it kills drush.
    defined('CURRENT_ENVIRONMENT') || define('CURRENT_ENVIRONMENT', ENVIRONMENT_TYPE_UNKNOWN);
  }
}

// Leave a flag so we know we have included settings.php.
if (!defined('SETTINGS_PHP_INCLUDED')) {
  define('SETTINGS_PHP_INCLUDED', TRUE);

  // Load in the database settings.
  require DATABASE_SETTINGS_PROCESSOR_PATH;
}

// If an environment-specific settings file exists, load it now:
if (defined('ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH') && is_readable(ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH)) {
  include ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH;
}

/**
 * Finally, allow the local overrides now.
 *
 * @see local_settings.template.php for more info.
 */
// If local_databases.php exists, include it; otherwise, carry on (making the
// assumption that the default databases setup is fine.
if (!defined('LOCAL_SETTINGS_INCLUDED') && file_exists('../local_settings.php') && is_readable('../local_settings.php')) {
  include_once '../local_settings.php';
}

/**
 * Salt for one-time login links and cancel links, form tokens, etc.
 *
 * This must be created AFTER the settings includes have run.
 *
 * This variable will be set to a random value by the installer. All one-time
 * login links will be invalidated if the value is changed. Note that if your
 * site is deployed on a cluster of web servers, you must ensure that this
 * variable has the same value on each server. If this variable is empty, a hash
 * of the serialized database credentials will be used as a fallback salt.
 *
 * For enhanced security, you may set this variable to a value using the
 * contents of a file outside your docroot that is never saved together
 * with any backups of your Drupal files and database.
 *
 * Example:
 *   $drupal_hash_salt = file_get_contents('/home/example/salt.txt');
 *
 * ---
 *
 * Greyhead Drupal: we look in
 * ../privatefiles/MULTISITE_IDENTIFIER/drupal-hash-salt.txt for a salt file.
 */
$drupal_hash_salt = MULTISITE_IDENTIFIER . ':' . getcwd();
$drupal_hash_salt_file_name = '../privatefiles/' . MULTISITE_IDENTIFIER . '/drupal-hash-salt.txt';

if (file_exists($drupal_hash_salt_file_name) && is_readable($drupal_hash_salt_file_name)) {
  $drupal_hash_salt .= file_get_contents($drupal_hash_salt_file_name);
}

$drupal_hash_salt = md5($drupal_hash_salt);
