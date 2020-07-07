<?php

/**
 * Load Carbon Fields.
 *
 * Thanks WPEmerge
 */

// Bootstrap Carbon Fields.
function app_bootstrap_carbon_fields()
{

  if (file_exists(__DIR__ . '/inc/carbon-fields/vendor/autoload.php')) {
    require(__DIR__ . '/inc/carbon-fields/vendor/autoload.php');
  }
  \Carbon_Fields\Carbon_Fields::boot();
}

add_action('after_setup_theme', 'app_bootstrap_carbon_fields', 100);

// Bootstrap Carbon Fields container definitions.
function app_bootstrap_carbon_fields_register_fields()
{
  include_once 'setup/carbon-fields/theme-options.php';
  include_once 'setup/carbon-fields/post-meta.php';
  include_once 'setup/carbon-fields/term-meta.php';
  include_once 'setup/carbon-fields/user-meta.php';
}

add_action('carbon_fields_register_fields', 'app_bootstrap_carbon_fields_register_fields');


// Filter Google Maps API key for Carbon Fields.
function app_filter_carbon_fields_google_maps_api_key()
{
  return carbon_get_theme_option('crb_google_maps_api_key');
}

add_filter('carbon_fields_map_field_api_key', 'app_filter_carbon_fields_google_maps_api_key');
