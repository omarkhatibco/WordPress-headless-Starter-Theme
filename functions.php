<?php

/**
 * Boot of the theme
 *
 * Thanks WPEmerge, Postlight_Headless_WP
 */

if (!defined('ABSPATH')) {
	exit;
}


// Loading Core modifications.
require_once 'app/core/core.php';


// Register hooks.
require_once  'app/hooks.php';

add_action(
	'after_setup_theme',
	function () {
		//Load textdomain.
		load_theme_textdomain('app', '/languages');

		//Register theme support.
		require_once  'app/setup/theme-support.php';

		// Register menu locations.
		require_once 'app/setup/menus.php';
	}
);

add_action(
	'init',
	function () {
		// Register post types.
		require_once 'app/setup/post-types.php';

		// Register taxonomies.
		require_once 'app/setup/taxonomies.php';
	}
);


// Register All custom API.
foreach (glob(get_template_directory() . "/app/api/*.php") as $filename) {
	require_once $filename;
}


// (Optional) Register Carbon Fields.
// require_once  'app/carbon-fields.php';
