<?php

class AfishaShortCodes{
    public function __construct() {
        add_shortcode( 'afisha_post', array($this, 'afisha_post_handler') );
        add_filter('do_shortcode_tag', array( $this, 'dad_joke_instead_of_post'), 10, 2);
    }

    public function afisha_post_handler($atts){

        global $post;
    
        $rg = (object) shortcode_atts([
            'id' => null,
            'bgcolor' => '#f0f0f0',
        ], $atts);
    
        if (!$post = get_post($rg->id)) {
            return '';
        }
    
        $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
        $sale = $post->sale ? '<div class="sale"/>On Sale!</div>' : '';
        $afisha_price = $post->sale ? $post->sale_price : $post->price;
    
        $out = "
        <div class='post' style='background:$rg->bgcolor;'>
            $sale
            <div class='post__image'>
                <img src='$url' />
            </div>
            <div class='post__title'>
                <a href='$post->guid'>$post->post_title</a>
                <br />
                <br />
                <p class='post__price'>Price: $afisha_price</p>
            </div>
        </div>
    ";
    
        wp_reset_postdata();
    
        return $out;
    }
    
    private function simpleContainer($someMessage) {
        return "
                <div class='post'>
                    <div class='post__title'>
                        $someMessage
                    </div>
                </div>
            ";
    }
    
    //when function name talks for itself
    public function dad_joke_instead_of_post($output, $tag){
        try {
            //out shortcode named afisha_post
            if ( 'afisha_post' !== $tag ) {
                return $output;
            }
    
            //25% percent chance of getting dad joke lol =)
            if(rand(0,4)) return $output;
    
            $req = wp_remote_get('https://icanhazdadjoke.com/', array('headers' => 'Accept: application/json'));
            $res = json_decode($req['body']);
    
            if($res->joke == '') throw new Exception("Got empty string instead of joke");
    
            return $output = $this->simpleContainer($res->joke);
        } catch (Exception $e) {
            $e_message = 'No dad joke today. '.$e->getMessage();
            return $output = simpleContainer($e_message);
        }
    }
}
