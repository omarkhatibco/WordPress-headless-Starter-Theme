<?php

/**
 * Asset helpers.
 * Thanks WPEmerge
 */


/**
 * Enqueue admin assets.
 *
 * @return void
 */
function app_action_admin_enqueue_assets()
{
  $assets_dir = get_template_directory_uri() . '/assets/';

  // Enqueue scripts.
  wp_enqueue_script('admin-js', $assets_dir . 'admin.js', [], '1.0.0', true);

  // Enqueue styles.
  wp_enqueue_style('admin-css', $assets_dir . 'admin.css');
}
add_action('admin_enqueue_scripts', 'app_action_admin_enqueue_assets');




/**
 * Enqueue login assets.
 *
 * @return void
 */
function app_action_login_enqueue_assets()
{
  $assets_dir = get_template_directory_uri() . '/assets/';

  // Enqueue scripts.
  wp_enqueue_script('login-js', $assets_dir . 'login.js', [], '1.0.0', true);

  // Enqueue styles.
  wp_enqueue_style('login-css', $assets_dir . 'login.css');
}

add_action('login_enqueue_scripts', 'app_action_login_enqueue_assets');



/**
 * Enqueue editor assets.
 *
 * @return void
 */
function app_action_editor_enqueue_assets()
{
  $assets_dir = get_template_directory_uri() . '/assets/';

  // Enqueue scripts.
  wp_enqueue_script('editor-js', $assets_dir . 'editor.js', [], '1.0.0', true);

  // Enqueue styles.
  wp_enqueue_style('editor-css', $assets_dir . 'editor.css');
}

add_action('enqueue_block_editor_assets', 'app_action_editor_enqueue_assets');
