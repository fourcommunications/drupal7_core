<?php

/**
 * Live environment settings file.
 */

/**
 * Disable the Shield module in live.
 */
$conf['shield_user'] = $conf['shield_pass'] = '';
$conf['greyhead_configuration']['overridden_variables'][] = 'shield_user';
$conf['greyhead_configuration']['overridden_variables'][] = 'shield_pass';

/**
 * Some live settings.
 */
$conf['error_level'] = '0';
$conf['greyhead_configuration']['overridden_variables'][] = 'error_level';

//$conf['preprocess_css'] = '1'; <-- We don't set these because we set CSS and JS in a Feature instead.
//$conf['preprocess_js'] = '1';
//$conf['page_compression'] = '1';
//$conf['block_cache'] = '1';
//$conf['cache'] = '1'; <-- We don't set this because we use Boost instead.

/**
 * Load memcache, if available.
 */
if (!defined('MEMCACHE_SETTINGS_LOADED') && is_readable('../local_settings.php')) {
  include_once('../configuration/includes/memcache.settings.php');
}
