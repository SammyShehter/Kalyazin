<?php
include_once get_stylesheet_directory() . '/common/CPT.common.php';
include_once get_stylesheet_directory() . '/news/metaboxes.news.php';
class News extends CommonCPT{

    public function __construct() {
        add_action('init', array($this, 'register_CPT'));
        add_action('init', array($this, 'register_taxonomies'));
    }
    public function register_CPT(){
        register_post_type('el_news', [
            'labels' => [
                'name' => 'Новости',
                'singular_name' => 'Новость',
                'menu_name' => 'Новости',
            ],
            'description' => 'Новости Калязина',
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
            'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
            'taxonomies' => ['news_category'],
            'has_archive' => true,
        ]);
    }

    public function register_taxonomies(){
        register_taxonomy('news_category', ['el_news'], [
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

new News();
