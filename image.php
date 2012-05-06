<?php get_header(); ?>

<div class="row">

	<section id="content" class="eightcol single" role="main">
	
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>					
		
		<article <?php post_class(); ?>>
				
			<h1 class="title"><?php the_title(); ?></h1>
			
			
			
			<?php 	
			
				// Get the featured image
				$image_id = get_post_thumbnail_id();  
			
				// Get the full size image details
				$image_url = wp_get_attachment_image_src($image_id, 'full');
				$image_url = $image_url[0];	
			
				// Get the smaller image
				$bw_image_url = wp_get_attachment_image_src($image_id, 'thumbnail-bw');
				$bw_image_url = $bw_image_url[0];	
			
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			?>
			
				<img class="featured-image wp-post-image" src="<?php echo $bw_image_url; ?>" data-fullsrc="<?php echo $image_url; ?>" title="<?php the_title(); ?>" id="post-featured-img" />
				
			<?php } ?>
			
			
			<aside class="threecol meta">
			
				<?php next_image_link(); ?>
				<?php previous_image_link(); ?>
			
			</aside>
			
			<section class="article-content ninecol last">
			
				<div class="attachment">
					<?php
						/**
						 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
						 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
						 */
						$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
						foreach ( $attachments as $k => $attachment ) {
							if ( $attachment->ID == $post->ID )
								break;
						}
						$k++;
						// If there is more than 1 attachment in a gallery
						if ( count( $attachments ) > 1 ) {
							if ( isset( $attachments[ $k ] ) )
								// get the URL of the next image attachment
								$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
							else
								// or get the URL of the first image attachment
								$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
						} else {
							// or, if there's only 1 image, get the URL of the image
							$next_attachment_url = wp_get_attachment_url();
						}
					?>
					<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
					$attachment_size = apply_filters( 'koster_attachment_size', 848 );
					echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
					?></a>
	
					<?php if ( ! empty( $post->post_excerpt ) ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div>
					<?php endif; ?>
				</div><!-- .attachment -->
				
				<?php edit_post_link( __( 'Edit', 'koster' ), '', '' ); ?>
				
				
				
				<?php comments_template( '', true ); ?>
			
			</section><!--/.article-content-->
			
					
		</article><!--/.row-->
		
		<?php endwhile; // end of the loop. ?>
	
	</section>
	
	<?php get_sidebar(); ?>

</div><!--/.row-->

<?php get_footer(); ?>
