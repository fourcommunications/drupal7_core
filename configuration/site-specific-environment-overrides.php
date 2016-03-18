<?php
/**
 * @file
 *
 * This file lets you specify that particular URLs should map to a particular
 * type of environment. For example, if dev.foo.example.com is a development
 * site, then you can specify that here as follows:
 *
 * $site_specific_environment_overrides['dev.foo.example.com'] = array('CURRENT_ENVIRONMENT' => 'DEV');
 *
 * This specifies a URL (the first array key) which, if it matches the current
 * URL, will be used to override one or more constant settings which then
 * influence how the rest of the site configuration code works.
 *
 * Each key/value pair in the sub-array is a constant name and value. In the
 * example above, we want to define a constant called CURRENT_ENVIRONMENT (which
 * is the primary purpose of this configuration file).
 *
 * A more complete example might be:
 *
 * $site_specific_environment_overrides['dev.foo.example.com'] = array(
 *   'CURRENT_ENVIRONMENT' => 'DEV',
 *   'CURRENT_SUBENVIRONMENT' => 'APACHE',
 *   'SOMETHING_ELSE' => 'something something darkside',
 * );
 */
$site_specific_environment_overrides = array();

/**
 * These arrays can be used to easily configure a particular hostname as a
 * local, dev, or staging server.
 */
$server_type_local = array(
  'CURRENT_ENVIRONMENT' => ENVIRONMENT_TYPE_LOCAL,
  'ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH' => SETTINGS_FILE_PATH . SETTINGS_FILE_LOCAL,
);

$server_type_dev = array(
  'CURRENT_ENVIRONMENT' => ENVIRONMENT_TYPE_DEV,
  'ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH' => SETTINGS_FILE_PATH . SETTINGS_FILE_DEV,
);

$server_type_rc = array(
  'CURRENT_ENVIRONMENT' => ENVIRONMENT_TYPE_RC,
  'ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH' => SETTINGS_FILE_PATH . SETTINGS_FILE_RC,
);

$server_type_live = array(
  'CURRENT_ENVIRONMENT' => ENVIRONMENT_TYPE_LIVE,
  'ENVSPECIFIC_SETTINGS_FILE_RELATIVE_PATH' => SETTINGS_FILE_PATH . SETTINGS_FILE_LIVE,
);

/**
 * Enter your overrides below. Have you also added a line in sites.php?
 *
 * @example:
 *
 * $site_specific_environment_overrides['dev.foo.example.com'] = $server_type_dev;
 */

// Dev servers.
$site_specific_environment_overrides['development.main.murray-edwards.dev.fourstudio.co.uk'] = $server_type_dev;
$site_specific_environment_overrides['development.nhsnwlondon.dev.fourstudio.co.uk'] = $server_type_dev;

// RC servers.
$site_specific_environment_overrides['staging.main.murray-edwards.dev.fourstudio.co.uk'] = $server_type_rc;
$site_specific_environment_overrides['staging.nhsnwlondon.dev.fourstudio.co.uk'] = $server_type_rc;

// Live servers.
$site_specific_environment_overrides['yganolfan10.org.uk'] = $server_type_live;
$site_specific_environment_overrides['yganolfan10.co.uk'] = $server_type_live;
$site_specific_environment_overrides['www.yganolfan10.org.uk'] = $server_type_live;
$site_specific_environment_overrides['www.yganolfan10.co.uk'] = $server_type_live;

/**
 * No more overrides below this line please.
 */
foreach ($site_specific_environment_overrides as $site_url => $site_overrides) {
  // Compare lowercase, since the domain part is case-insensitive.
  if (strtolower($_SERVER['HTTP_HOST']) == strtolower($site_url)) {
    if (is_array($site_overrides) && !empty($site_overrides)) {
      // We have a match; apply the overrides. Don't defensively check for
      // already-defined constants here; it's better to fail noisily so something
      // is obviously wrong, than to fail silently and cause weird errors.
      foreach ($site_overrides as $constant_name => $constant_value) {
        define($constant_name, $constant_value);
      }
    }
  }
}
