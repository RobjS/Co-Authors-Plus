<?php

/**
 * The base class for all API Controllers.
 *
 * Class CoAuthors_API_Controller
 */
class CoAuthors_API_Controller {

    /**
     * @var string
     */
    protected $route = null;

    /**
     * Use this method to define the routes using WP register_rest_route() function.
     *
     * @throws Exception
     * @return array
     */
    public function create_routes() {
        throw new Exception( 'Child class needs to implement this method.' );
    }

    /**
     * Handles route authorization if requested.
     *
     * @param WP_REST_Request $request
     * @return bool
     */
    public function authorization( WP_REST_Request $request ) {
        return true;
    }

    /**
     * DELETE HTTP method
     *
     * @param WP_REST_Request $request
     * @throws Exception
     * @return WP_REST_Response
     */
    public function get( WP_REST_Request $request ) {
        throw new Exception( 'Not implemented.' );
    }

    /**
     * DELETE HTTP method
     *
     * @param WP_REST_Request $request
     * @throws Exception
     * @return WP_REST_Response
     */
    public function post( WP_REST_Request $request ) {
        throw new Exception( 'Not implemented.' );
    }

    /**
     * DELETE HTTP method
     *
     * @param WP_REST_Request $request
     * @throws Exception
     * @return WP_REST_Response
     */
    public function put( WP_REST_Request $request ) {
        throw new Exception( 'Not implemented.' );
    }

    /**
     * DELETE HTTP method
     *
     * @param WP_REST_Request $request
     * @throws Exception
     * @return WP_REST_Response
     */
    public function delete( WP_REST_Request $request ) {
        throw new Exception( 'Not implemented.' );
    }

    /**
     * Returns a clean array
     *
     * @param $param
     * @param WP_REST_Request $request
     * @param $key
     *
     * @return array
     */
    public function sanitize_array($param, WP_REST_Request $request, $key) {
        return array_map( 'esc_attr', (array) $param );
    }

    /**
     * Helper method that returns a filtered array for the search_authors() main class
     * method.
     *
     * @param array $arr
     *
     * @return array
     */
    protected function filter_authors_array( $arr ) {
        $coauthors = array();

        if ( ! is_array( $arr ) )
            return $coauthors;

        foreach ( $arr as $author ) {
            $coauthors[] = array(
                'id'            => $author->ID,
                'user_login'    => $author->user_login,
                'display_name'  => $author->display_name,
                'user_email'    => $author->user_email,
                'user_nicename' => $author->user_nicename
            );
        }

        return $coauthors;
    }

    /**
     * Returns an array with the register_rest_route args definition.
     *
     * @param string $method
     * @return array
     */
    protected function get_args( $method = null ) {
       return array();
    }

    /**
     * Wraps an array into the WP_REST_Response.
     * Currently very limited, it should allow header and code to be setted.
     *
     * @param array $data
     * @throws Exception
     * @return WP_REST_Response
     */
    protected function send_response( array $data ) {
        $response = new WP_REST_Response( $data );

        return $response;
    }

    /**
     * @return string
     */
    protected function get_route() {
        return $this->route;
    }

    /**
     * @return string
     */
    protected function get_namespace() {
        return COAUTHORS_PLUS_API_NAMESPACE . COAUTHORS_PLUS_API_VERSION;
    }
}