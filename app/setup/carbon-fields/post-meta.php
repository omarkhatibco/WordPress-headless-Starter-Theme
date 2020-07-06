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
Container::make( 'post_meta', __( 'Custom Data', 'app' ) )
	->where( 'post_type', '=', 'page' )
	->add_fields( array(
		Field::make( 'complex', 'crb_my_data' )
			->add_fields( array(
				Field::make( 'text', 'title' )
					->help_text( 'lorem' ),
			) ),
		Field::make( 'map', 'crb_location' )
			->set_position( 37.423156, -122.084917, 14 ),
		Field::make( 'image', 'crb_img' ),
		Field::make( 'file', 'crb_pdf' ),
	));
*/
