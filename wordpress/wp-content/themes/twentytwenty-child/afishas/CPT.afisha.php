<?php
include_once get_stylesheet_directory() . '/common/CPT.common.php';
include_once get_stylesheet_directory() . '/afishas/metaboxes.afisha.php';
include_once get_stylesheet_directory() . '/afishas/rest.afisha.php';
include_once get_stylesheet_directory() . '/afishas/shortcodes.afisha.php';
class Afisha extends CommonCPT{

    public function __construct() {
        add_action('init', array($this, 'register_CPT'));
        add_action('init', array($this, 'register_taxonomies'));
        new AfishaMetaboxes();
        new AfishaRest();
        new AfishaShortCodes();
    }

    public function register_CPT(){
        register_post_type('el_afishas', [
            'labels' => [
                'name' => 'Афиши',
                'singular_name' => 'Афиша',
                'menu_name' => 'Афиши',
            ],
            'description' => 'Kalyazin test',
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
            'supports' => ['title', 'editor', 'custom-fields', 'thumbnail'],
            'taxonomies' => ['afishas_category'],
            'has_archive' => true,
        ]);
    }

    public function register_taxonomies(){
        register_taxonomy('afishas_category', ['el_afishas'], [
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

new Afisha();
