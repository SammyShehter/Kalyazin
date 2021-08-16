<?php
include_once get_stylesheet_directory() . '/common/CPT.common.php';
include_once get_stylesheet_directory() . '/banners/metaboxes.banner.php';
include_once get_stylesheet_directory() . '/banners/rest.banner.php';
include_once get_stylesheet_directory() . '/banners/shortcodes.banner.php';
class Banner extends CommonCPT{

    public function __construct() {
        add_action('init', array($this, 'register_CPT'));
        add_action('init', array($this, 'register_taxonomies'));
        new BannerMetaboxes();
        new BannerRest();
        new BannerShortCodes();
    }

    public function register_CPT(){
        register_post_type('el_banners', [
            'labels' => [
                'name' => 'Баннеры',
                'singular_name' => 'Баннер',
                'menu_name' => 'Баннеры',
            ],
            'description' => 'Kalyazin test',
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
            'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
            'taxonomies' => ['banners_category'],
            'has_archive' => true,
        ]);
    }

    public function register_taxonomies(){
        register_taxonomy('banners_category', ['el_banners'], [
            'labels' => [
                'name' => 'Categories',
                'singular_name' => 'Category',
                'menu_name' => 'Category',
            ],
            'description' => 'Custom category',
            'public' => true,
            'hierarchical' => true,
            'show_in_rest' => true,
        ]);
    }

}

new Banner();
