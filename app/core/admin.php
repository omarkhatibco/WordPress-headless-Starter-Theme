<?php

/**
 * Admin filters.
 * Thanks Postlight_Headless_WP
 */

/**
 * Customize the preview button in the WordPress admin to point to the headless client.
 *
 * @param  str $link The WordPress preview link.
 * @return str The headless WordPress preview link.
 */
function set_headless_preview_link($link)
{
    $post = get_post();
    if (!$post) {
        return $link;
    }
    $status      = 'revision';
    $frontend    = APP_FRONTEND || 'http://localhost:3000';
    $parent_id   = $post->post_parent;
    $revision_id = $post->ID;
    $type        = get_post_type($parent_id);
    $nonce       = wp_create_nonce('wp_rest');
    if (0 === $parent_id) {
        $status = 'draft';
    }
    return "$frontend/_preview/$parent_id/$revision_id/$type/$status/$nonce";
}

add_filter('preview_post_link', 'set_headless_preview_link');

/**
 * Includes preview link in post data for a response.
 *
 * @param \WP_REST_Response $response The response object.
 * @param \WP_Post          $post     Post object.
 * @return \WP_REST_Response The response object.
 */
function set_preview_link_in_rest_response($response, $post)
{
    if ('draft' === $post->post_status) {
        $response->data['preview_link'] = get_preview_post_link($post);
    }

    return $response;
}

add_filter('rest_prepare_post', 'set_preview_link_in_rest_response', 10, 2);
add_filter('rest_prepare_page', 'set_preview_link_in_rest_response', 10, 2);


/**
 * Fix upload_dir urls having incorrect url schema.
 *
 * The wp_upload_dir() function urls' schema depends on the site_url option which
 * can cause issues when HTTPS is forced using a plugin, for example.
 *
 * @link https://core.trac.wordpress.org/ticket/25449
 * @param  array $upload_dir Array containing the current upload directory’s path and url.
 * @return array Filtered array.
 * Thanks WPEmerge
 */
function fix_upload_dir_url_schema($upload_dir)
{
    if (is_ssl()) {
        $upload_dir['url']     = set_url_scheme($upload_dir['url'], 'https');
        $upload_dir['baseurl'] = set_url_scheme($upload_dir['baseurl'], 'https');
    } else {
        $upload_dir['url']     = set_url_scheme($upload_dir['url'], 'http');
        $upload_dir['baseurl'] = set_url_scheme($upload_dir['baseurl'], 'http');
    }

    return $upload_dir;
}

add_action('upload_dir', 'fix_upload_dir_url_schema');
