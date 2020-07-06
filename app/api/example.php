<?php

/**
 * Add rest api endpoint for category listing
 * Thanks to https://gist.github.com/sagarkbhatt/70fe4983a4f10d2bfa404a8bc21ac670
 */

/**
 * Class Category_List_Rest
 */
class Category_List_Rest extends WP_REST_Controller
{
  /**
   * The namespace.
   *
   * @var string
   */
  protected $namespace;
  /**
   * Rest base for the current object.
   *
   * @var string
   */
  protected $rest_base;

  /**
   * Category_List_Rest constructor.
   */
  public function __construct()
  {

    $this->namespace = 'example/v1';
    $this->rest_base = 'login';
  }
  /**
   * Register the routes for the objects of the controller.
   */
  public function register_routes()
  {

    register_rest_route($this->namespace, '/' . $this->rest_base, array(

      array(
        'methods'             => WP_REST_Server::READABLE,
        'callback'            => array($this, 'get_items'),
        'permission_callback' => array($this, 'get_items_permissions_check'),
      ),
      array(
        'methods'         => WP_REST_Server::EDITABLE,
        'callback'        => array($this, 'update_item'),
        'permission_callback' => array($this, 'update_item_permissions_check'),
        'args'            => $this->get_endpoint_args_for_item_schema(false),
      ),
      'schema' => null,

    ));
  }
  /**
   * Check permissions for the read.
   *
   * @param WP_REST_Request $request get data from request.
   *
   * @return bool|WP_Error
   */
  public function get_items_permissions_check($request)
  {
    if (!current_user_can('read')) {
      return new WP_Error('rest_forbidden', esc_html__('You cannot view the category resource.'), array('status' => $this->authorization_status_code()));
    }
    return true;
  }
  /**
   * Check permissions for the update
   *
   * @param WP_REST_Request $request get data from request.
   *
   * @return bool|WP_Error
   */
  public function update_item_permissions_check($request)
  {
    if (!current_user_can('manage_options')) {
      return new WP_Error('rest_forbidden', esc_html__('You cannot update the category resource.'), array('status' => $this->authorization_status_code()));
    }
    return true;
  }
  /**
   * Grabs all the category list.
   *
   * @param WP_REST_Request $request get data from request.
   *
   * @return mixed|WP_REST_Response
   */
  public function get_items($request)
  {

    $cat_order = get_option('category_order');
    $data = get_categories();
    $res = [];
    if ($cat_order) {
      $index = 0;
      foreach ($cat_order as $cat) {

        $temp = [];
        $temp['name'] = get_cat_name($cat);
        $temp['id']   = $cat;
        $temp['order'] = $index;
        $res[] = $temp;
        $index++;
      }
    } elseif (!empty($data)) {

      $index = 0;
      foreach ($data as $list) {

        if ('category' === $list->taxonomy) {

          $temp = [];
          $temp['name'] = $list->name;
          $temp['id']   = $list->term_id;
          $temp['order'] = $index;
          $res[] = $temp;
          $index++;
        }
      }
    }

    // Return all of our comment response data.
    return rest_ensure_response($res);
  }

  /**
   * Update category order
   *
   * @param WP_REST_Request $request get data from request.
   *
   * @return mixed|WP_Error|WP_REST_Response
   */
  public function update_item($request)
  {

    $data = [];
    if (!isset($request['order'])) {
      return new WP_Error('invalid_data', __('Cannot update category order.'), array('status' => 400));
    }
    $res = update_option('category_order', $request['order']);

    if ($res) {
      $data['msg'] = __('Category order updated', '');
    } else {
      return new WP_Error('cant update', __('Please provide proper data'), array('status' => 400));
    }

    return rest_ensure_response($data);
  }
  /**
   * Sets up the proper HTTP status code for authorization.
   *
   * @return int
   */
  public function authorization_status_code()
  {

    $status = 401;

    if (is_user_logged_in()) {
      $status = 403;
    }

    return $status;
  }
}
/**
 * Function to register our new routes from the controller.
 */
function register_cat_list_controller()
{
  $controller = new Category_List_Rest();
  $controller->register_routes();
}

add_action('rest_api_init', 'register_cat_list_controller');
