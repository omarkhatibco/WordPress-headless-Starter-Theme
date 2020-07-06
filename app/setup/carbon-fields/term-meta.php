<?php

/**
 * Post Meta.
 *
 * Here, you can register custom post meta fields using the Carbon Fields library.
 *
 * @link https://carbonfields.net/docs/containers-post-meta/
 * Thanks WPEmerge
 */

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;


/*
Container::make( 'term_meta', __( 'Custom Data', 'app' ) )
	->where( 'term_taxonomy', '=', 'category' )
	->add_fields( array(
		Field::make( 'image', 'crb_img' ),
	));
*/
