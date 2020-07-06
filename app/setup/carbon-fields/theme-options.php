<?php

/**
 * Theme Options.
 *
 * Here, you can register Theme Options using the Carbon Fields library.
 *
 * @link https://carbonfields.net/docs/containers-theme-options/
 * Thanks WPEmerge
 */

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make('theme_options', __('Theme Options', 'app'))
	->set_page_file('app-theme-options.php')
	->add_fields(array(
		Field::make('text', 'crb_google_maps_api_key', __('Google Maps API Key', 'app')),
		Field::make('header_scripts', 'crb_header_script', __('Header Script', 'app')),
		Field::make('footer_scripts', 'crb_footer_script', __('Footer Script', 'app')),
	));
