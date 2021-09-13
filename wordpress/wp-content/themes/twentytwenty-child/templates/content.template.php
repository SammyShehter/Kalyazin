<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">
		<?php the_title( '<h2 class="entry-title indigo darken-3 center">', '</h2>' ); ?>
	</div>
	<?php if (has_post_thumbnail( $post->ID ) ): ?>
  	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  	<div class="entry-image"">
		<img  class='post-image' src=<?php echo $image[0];?> alt=<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>>
  	</div>
	<?php endif; ?>
		
	<div class="entry-content flow-text">
		<?php
			the_content();
		?>
	</div>
	
</article>


<!-- CUSTOM TRACER AND RELATED PRODUCTS-->
<div class='sidebar'>
	<div class="sidebar_elem center">
		<h3>Мы_Наблюдаем</h3>
		<script
			type='text/javascript'
			src='//rf.revolvermaps.com/0/0/8.js?i=53sw0hib5og&amp;m=2&amp;c=ff0000&amp;cr1=ffffff&amp;f=tahoma&amp;l=17&amp;v0=10' async='async'>
		</script>
	</div>

	<!-- <div class="sidebar_elem">
		<h2> Related products </h2>
		<?php 
			// $currentPostID = $post->ID;
			// $terms = get_the_terms($post,  'products_category')['0'];
			// $args = array( 
			// 	'post_type' => 'el_afishas',
			// 	'tax_query' => array(
			// 		array(
			// 			'taxonomy' => 'products_category',
			// 			'field' => 'slug',
			// 			'terms' => $terms->slug,
			// 		)
			// 	)
			// );

			// $loop = new WP_Query($args);

			// if( $loop->have_posts() ) {

			// 	while( $loop->have_posts() ) : $loop->the_post();
			// 		if($post->ID != $currentPostID) : ?> 
			// 			<div class='post'>
            //                 <?php if($post->sale) : echo '<div class="sale"/>On Sale!</div>'; endif;  ?>
            //                     <div class='post__image'> 
            //                         <?php the_post_thumbnail(); ?>
            //                     </div>
            //                     <div class='post__title'><a href=<?php the_permalink(); ?>><?php the_title(); ?></a></div>
			// 			</div>
			// 		<?php 
			// 		endif;
			// 	endwhile;
			// }

			// wp_reset_query();

		?>
	</div> -->
</div>
<!-- CUSTOM TRACER AND RELATED PRODUCTS-->