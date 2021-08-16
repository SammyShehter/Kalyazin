<?php

class CommonFunctions {
    public function __construct() {
        /*
            Turning off wp admin bar for everyone
            except admin
        */
        if (!current_user_can('manage_options')) {
            add_filter('show_admin_bar', '__return_false');
        }

        // GUTENBERG OFF
        if ('disable_gutenberg'){
            remove_theme_support('core-block-patterns');
            add_filter('use_block_editor_for_post_type', '__return_false', 100);

            remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');

            // Move the Privacy Policy help notice back under the title field.
            add_action('admin_init', function () {
                remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
                add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
            });
        }

        add_action('wp_enqueue_scripts', array($this, 'kalyazin_scripts'));

        add_action( 'wp_head', array($this, 'change_theme_color' ));


    }

       

    /* CUSTOMS */
    public function change_theme_color(){
        echo '<meta name="theme-color" content="#f0f0f0" />';
    }

    public function kalyazin_scripts(){
        wp_enqueue_style('kalyazinWP-style', get_stylesheet_uri());
        wp_enqueue_style('kalyazinWP-style-main', get_stylesheet_directory_uri() . '/assets/style/global/style.css');

        if (is_front_page()) {
            wp_enqueue_style('kalyazinWP-style-front', get_stylesheet_directory_uri() . '/assets/style/frontPage/style.css');
            wp_enqueue_script('kalyazinWP-script', get_stylesheet_directory_uri() . '/assets/js/frontPage/main.js', array(), null, true);
        }

        // if (is_single()) {
        //     wp_enqueue_style('home', get_stylesheet_directory_uri() . '/assets/style/single.css');
        //     wp_enqueue_script('home', get_stylesheet_directory_uri() . '/assets/js/single.js', array(), null, true);
        // }
    }
    /* CUSTOMS  END*/

}

new CommonFunctions();