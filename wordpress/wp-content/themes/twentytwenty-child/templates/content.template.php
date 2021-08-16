<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>


	<div class="entry-customs">
		<?php 
			if($post->sale){
				echo "
					<h2>Item is on sale!</h2>
					<s>Price: $post->price</s>
					<h2>Sale price: $post->sale_price</h2>
					<br/>
				";
			} else {
				echo "
						<h2>Price: $post->price</h2>
						<br/>
					";
			}
		?>
	</div>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div>

	<!-- YOUTUBE -->
	<iframe class="video"
		src="<?php echo $post->youtube; ?>">
	</iframe>
	<!-- YOUTUBE END -->
	
</article>


<!-- CUSTOM TRACER AND RELATED PRODUCTS-->
<div class='sidebar'>
	<div class="sidebar_elem">
		<h3>We_watch</h3>
		<script
			type='text/javascript'
			src='//rf.revolvermaps.com/0/0/8.js?i=53sw0hib5og&amp;m=2&amp;c=ff0000&amp;cr1=ffffff&amp;f=tahoma&amp;l=17&amp;v0=10' async='async'>
		</script>
	</div>

	<div class="sidebar_elem">
		<h2> Related products </h2>
		<?php 
			$currentPostID = $post->ID;
			$terms = get_the_terms($post,  'products_category')['0'];
			$args = array( 
				'post_type' => 'el_afishas',
				'tax_query' => array(
					array(
						'taxonomy' => 'products_category',
						'field' => 'slug',
						'terms' => $terms->slug,
					)
				)
			);

			$loop = new WP_Query($args);

			if( $loop->have_posts() ) {

				while( $loop->have_posts() ) : $loop->the_post();
					if($post->ID != $currentPostID) : ?> 
						<div class='post'>
                            <?php if($post->sale) : echo '<div class="sale"/>On Sale!</div>'; endif;  ?>
                                <div class='post__image'> 
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class='post__title'><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></div>
						</div>
					<?php 
					endif;
				endwhile;
			}

			wp_reset_query();

		?>
	</div>
</div>
<!-- CUSTOM TRACER AND RELATED PRODUCTS-->