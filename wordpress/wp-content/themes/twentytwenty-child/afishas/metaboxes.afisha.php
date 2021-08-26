<?php 

class AfishaMetaboxes{

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'extra_fields'));
        add_action('save_post', array($this, 'afishas_field_update'));
    }


    public function extra_fields(){
        add_meta_box('extra_fields_data', 'Дополнительное', array($this, 'location_field_box_func'), 'el_afishas', 'normal', 'high');
    }

    public function location_field_box_func($afisha){

        $locationString = get_post_meta($afisha->ID, 'location', 1);
        $timeString = get_post_meta($afisha->ID, 'time', 1);?>
             <label> Место проведения <input type="text" name="extra[location]" value="<?php echo $locationString; ?>"/></label><br/><br/>
             <label> Время проведения <input type="text" name="extra[time]" value="<?php echo $timeString; ?>"/></label>
             <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
        <?php
    }

    public function afishas_field_update($afisha_id){
        if (
            empty($_POST['extra'])
            || !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__)
            || wp_is_post_autosave($afisha_id)
            || wp_is_post_revision($afisha_id)
        ) {
            return false;
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
}

