<?php 

class AfishaMetaboxes{

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'extra_fields'));
        add_action('save_post', array($this, 'in_sale_field_update'));
    }

/*
    public function extra_fields(){
        add_meta_box('extra_fields_sale', 'On sale', array($this, 'on_sale_field_box_func'), 'el_afishas', 'normal', 'high');
        add_meta_box('extra_fields_price', 'Price', array($this, 'price_field_box_func'), 'el_afishas', 'normal', 'high');
        add_meta_box('extra_fields_sale_price', 'Sale price', array($this, 'sale_price_field_box_func'), 'el_afishas', 'normal', 'high');
        add_meta_box('extra_fields_youtube', 'Youtube video', array($this, 'youtube_field_box_func'), 'el_afishas', 'normal', 'high');
    }

    public function on_sale_field_box_func($afisha){

        $mark_v = get_post_meta($afisha->ID, 'sale', 1);?>

             <label><input type="radio" name="extra[sale]" value="sale" <?php checked($mark_v, 'sale');?> /> Yes </label>
             <label><input type="radio" name="extra[sale]" value="" <?php checked($mark_v, '');?>/> No </label>
             <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    public function price_field_box_func($afisha){

        $afisha_price = get_post_meta($afisha->ID, 'price', 1);?>

        <input type="number" name="extra[price]" value="<?php echo $afisha_price ?>" />
        <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    public function sale_price_field_box_func($afisha){

        $afisha_sale_price = get_post_meta($afisha->ID, 'sale_price', 1);?>

        <input type="number" name="extra[sale_price]" value="<?php echo $afisha_sale_price ?>" />
        <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    //Special func that creates fixed YT embed URL
    private function getYoutubeEmbedUrl($url){
        $parsedUrl = parse_url($url);
        parse_str(@$parsedUrl['query'], $queryString);
        $youtubeId = @$queryString['v'] ?? substr(@$parsedUrl['path'], 1);

        return "https://youtube.com/embed/{$youtubeId}";
    }

    public function youtube_field_box_func($afisha){

        $afisha_yt = get_post_meta($afisha->ID, 'youtube_url', 1);
        ?>

        <input type="text" name="extra[youtube_url]" value="<?php echo $afisha_yt ?>" style="width:50%" />
        <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    public function in_sale_field_update($afisha_id){
        if (
            empty($_POST['extra'])
            || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)
            || wp_is_post_autosave($afisha_id)
            || wp_is_post_revision($afisha_id)
        ) {
            return false;
        }

        //special rule for lazy editors
        if ($_POST['extra']['youtube_url']) {
            $_POST['extra']['youtube'] = $this->getYoutubeEmbedUrl($_POST['extra']['youtube_url']);
        }

        foreach ($_POST['extra'] as $key => $value) {
            if (empty($value)) {
                delete_post_meta($afisha_id, $key);
                continue;
            }

            update_post_meta($afisha_id, $key, $value);
        }

        return $afisha_id;
    }
    */
}

