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
			
				<?php koster_post_meta(); ?>
			
			</aside>
			
			<section class="article-content ninecol last">
			
				<?php the_content( __( 'Continue reading &rarr;', 'koster' ) ); ?>
				
				<?php wp_link_pages(); ?> 
				
				<?php edit_post_link( __( 'Edit', 'koster' ), '', '' ); ?>
								
				<?php comments_template( '', true ); ?>
			
			</section><!--/.article-content-->
			
					
		</article><!--/.row-->
		
		<?php endwhile; // end of the loop. ?>
	
	</section>
	
	<?php get_sidebar(); ?>

</div><!--/.row-->

<?php get_footer(); ?>
