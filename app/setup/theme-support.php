<?php

/**
 * Declare theme functionality support.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 *
 * @hook    after_setup_theme
 * Thanks WPEmerge
 */


if (!defined('ABSPATH')) {
	exit;
}

/**
 * Support automatic feed links.
 *
 * @link https://codex.wordpress.org/Automatic_Feed_Links
 */
// add_theme_support( 'automatic-feed-links' );

/**
 * Support post thumbnails.
 *
 * @link https://codex.wordpress.org/Post_Thumbnails
 */
add_theme_support('post-thumbnails');

/**
 * Support document title tag.
 *
 * @link https://codex.wordpress.org/Title_Tag
 */
add_theme_support('title-tag');

/**
 * Support menus.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_theme_support('menus');

/**
 * Support HTML5 markup.
 *
 * @link https://codex.wordpress.org/Theme_Markup
 */
add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

/**
 * Manually select Post Formats to be supported.
 *
 * @link http://codex.wordpress.org/Post_Formats
 */
// phpcs:ignore
// add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ] );

/**
 * Support default editor block styles.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
// add_theme_support('wp-block-styles');

/**
 * Support wide alignment for editor blocks.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support('align-wide');



/**
 * Support custom editor block color palette.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support(
	'editor-color-palette',
	[
		[
			'name'  => __('Red', 'app'),
			'slug'  => 'red',
			'color' => 'red',
		],

	]
);

/**
 * Disable color palette.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
// add_theme_support( 'disable-custom-colors' );


/**
 * Support custom editor block gradient presets.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */

add_theme_support(
	'editor-gradient-presets',
	[
		[
			'name'     => __('Vivid cyan blue to vivid purple', 'themeLangDomain'),
			'gradient' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
			'slug'     => 'vivid-cyan-blue-to-vivid-purple'
		],
		[
			'name'     => __('Vivid green cyan to vivid cyan blue', 'themeLangDomain'),
			'gradient' => 'linear-gradient(135deg,rgba(0,208,132,1) 0%,rgba(6,147,227,1) 100%)',
			'slug'     =>  'vivid-green-cyan-to-vivid-cyan-blue',
		]
	]
);


/**
 * Disable gradient presets.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
// add_theme_support( 'disable-custom-gradients' );


/**
 * Support custom editor block font sizes.
 * Don't forget to edit resources/styles/shared/variables.scss when you update these.
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support(
	'editor-font-sizes',
	[
		[
			'name'      => __('extra small', 'app'),
			'shortName' => __('XS', 'app'),
			'size'      => 12,
			'slug'      => 'xs',
		],
		[
			'name'      => __('small', 'app'),
			'shortName' => __('SM', 'app'),
			'size'      => 14,
			'slug'      => 'sm',
		],
		[
			'name'      => __('regular', 'app'),
			'shortName' => __('MD', 'app'),
			'size'      => 16,
			'slug'      => 'md',
		],

	]
);


/**
 * Disable custom font sizes .
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
// add_theme_support( 'disable-custom-font-sizes' );


/**
 * Support editor styles .
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support('editor-styles');
add_theme_support('dark-editor-style');


/**
 * Support responsive embedded content .
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support('responsive-embeds');


/**
 * Support cover block padding .
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support('experimental-custom-spacing');


/**
 * Support link color control .
 *
 * @link https://wordpress.org/gutenberg/handbook/extensibility/theme-support/
 */
add_theme_support('experimental-link-color');


/**
 * Support WooCommerce.
 */
add_theme_support('woocommerce');
