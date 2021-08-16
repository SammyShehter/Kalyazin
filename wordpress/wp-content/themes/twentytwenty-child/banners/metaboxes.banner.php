<?php 

class BannerMetaboxes{

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'extra_fields'));
        add_action('save_post', array($this, 'in_sale_field_update'));
    }

/*
    public function extra_fields(){
        add_meta_box('extra_fields_sale', 'On sale', array($this, 'on_sale_field_box_func'), 'el_banners', 'normal', 'high');
        add_meta_box('extra_fields_price', 'Price', array($this, 'price_field_box_func'), 'el_banners', 'normal', 'high');
        add_meta_box('extra_fields_sale_price', 'Sale price', array($this, 'sale_price_field_box_func'), 'el_banners', 'normal', 'high');
        add_meta_box('extra_fields_youtube', 'Youtube video', array($this, 'youtube_field_box_func'), 'el_banners', 'normal', 'high');
    }

    public function on_sale_field_box_func($banner){

        $mark_v = get_post_meta($banner->ID, 'sale', 1);?>

             <label><input type="radio" name="extra[sale]" value="sale" <?php checked($mark_v, 'sale');?> /> Yes </label>
             <label><input type="radio" name="extra[sale]" value="" <?php checked($mark_v, '');?>/> No </label>
             <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    public function price_field_box_func($banner){

        $banner_price = get_post_meta($banner->ID, 'price', 1);?>

        <input type="number" name="extra[price]" value="<?php echo $banner_price ?>" />
        <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    public function sale_price_field_box_func($banner){

        $banner_sale_price = get_post_meta($banner->ID, 'sale_price', 1);?>

        <input type="number" name="extra[sale_price]" value="<?php echo $banner_sale_price ?>" />
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

    public function youtube_field_box_func($banner){

        $banner_yt = get_post_meta($banner->ID, 'youtube_url', 1);
        ?>

        <input type="text" name="extra[youtube_url]" value="<?php echo $banner_yt ?>" style="width:50%" />
        <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    public function in_sale_field_update($banner_id){
        if (
            empty($_POST['extra'])
            || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)
            || wp_is_post_autosave($banner_id)
            || wp_is_post_revision($banner_id)
        ) {
            return false;
        }

        //special rule for lazy editors
        if ($_POST['extra']['youtube_url']) {
            $_POST['extra']['youtube'] = $this->getYoutubeEmbedUrl($_POST['extra']['youtube_url']);
        }

        foreach ($_POST['extra'] as $key => $value) {
            if (empty($value)) {
                delete_post_meta($banner_id, $key);
                continue;
            }

            update_post_meta($banner_id, $key, $value);
        }

        return $banner_id;
    }
    */
}

