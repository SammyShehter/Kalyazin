<?php
    get_header();
?>

<div class='sec1'>
    <div class='sec1__wrapper'>
        <div class='left LR_Button'>
            <
        </div>
        <div class='carousel'>
            <div class='carousel__tracker'>
                <?php
                    $args = array(
                        'post_type' => 'el_banners',
                        'posts_per_page' => -1,
                        'order' => 'ASC',
                    );

                    $q = new WP_Query($args);

                    if($q->have_posts()) {
                        while($q->have_posts()){ $q->the_post();
                            ?>

                                <div class='carousel__tracker__post' style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">

                                    <div class='carousel__tracker__post__title'>
                                        <h3 style="<?php if(!the_title()) echo 'background: none;';?>"><?php the_title(); ?></h3>
                                    </div>
                                    <div class='carousel__tracker__post__link'>
                                        <a href=<?php the_permalink(); ?>><?php echo get_post_custom()['linkText'][0] ?></a>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class='right LR_Button'>
            >
        </div>
        
    </div>
</div>
<?php 
    get_footer();
?>











<?php/*
                $args = array(
                    'post_type' => 'el_afishas',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                );

                $q = new WP_Query($args);

                if($q->have_posts()) {
                    while($q->have_posts()){ $q->the_post();?>
                            <div class='post'>
                            <?php if($post->sale) : echo '<div class="sale"/>On Sale!</div>'; endif;  ?>
                                <div class='post__image'> 
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class='post__title'><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></div>
                            </div>
                        <?php
                    }
                }
                wp_reset_postdata();
                */
            ?>