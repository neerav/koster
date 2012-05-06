<?php if (have_posts()) :?>
	
	<?php while (have_posts()) : the_post(); ?>
	
		<article <?php post_class(); ?>>
		
			<h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'koster' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
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
			
				<?php koster_post_meta(); ?>
			
			</aside>
			
			<section class="article-content ninecol last">
			
				<?php the_content( __( 'Continue reading &rarr;', 'koster' ) ); ?>
			
			</section><!--/.article-content-->
			
					
		</article><!--/.row-->
	
	<?php endwhile; ?>
	
<?php else : ?>

	<h2>Not found</h2>
	
<?php endif; ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav class="navigation row">
		<span class="next"><?php previous_posts_link( __( '&larr; Newer posts', 'koster' ) ); ?></span>
		<span class="prev"><?php next_posts_link( __( 'Older posts &rarr;', 'koster' ) ); ?></span>
	</nav>
<?php endif; ?>