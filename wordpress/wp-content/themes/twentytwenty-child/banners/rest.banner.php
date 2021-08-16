<?php


class BannerRest {

    public function __construct() {
        add_action('rest_api_init', function () {
            register_rest_route('wl/v1', '/by-category/(?P<category>\w+)', [
                'methods' => 'GET',
                'callback' => array($this, 'getBannersByCategory'),
            ]);
        });
    }

    public function getBannersByCategory(WP_REST_Request $request){
        try {
            global $post;
            $args = array(
                'post_type' => 'el_banners',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'banners_category',
                        'field' => 'slug',
                        'terms' => $request['category'],
                    ),
                ),
            );
    
            $query = new WP_Query($args);
            $res = array();
    
            if ($query->have_posts()) {
                while( $query->have_posts() ) : $query->the_post();
                    array_push($res, array(
                            'title'         =>      $post->post_title,
                            'description'   =>      wp_strip_all_tags(strip_shortcodes($post->post_content)),
                            'image'         =>      get_the_post_thumbnail_url(),
                            'price'         =>      $post->price,
                            'is_on_sale'    =>      $post->sale ? true : false,
                            'sale price'    =>      $post->sale_price
                        )
                    );
                endwhile;
            } else {
                return new WP_Error('categories', 'No posts in selected category', array('status' => 400));
            }
    
            return $res;
    
            wp_reset_query();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    
    }
}

