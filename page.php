<?php get_header(); ?>

<div class="row">

	<section id="content" class="eightcol page" role="main">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<section <?php post_class(); ?>>
			<?php if ( is_front_page() ) { ?>
			<h2><?php the_title(); ?></h2>
			<?php } else { ?>	
			<h1><?php the_title(); ?></h1>
			<?php } ?>				
			
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'koster' ), 'after' => '' ) ); ?>
			<?php edit_post_link( __( 'Edit', 'koster' ), '', '' ); ?>
		</section>
		
		<?php comments_template( '', true ); ?>
		
		<?php endwhile; ?>

	</section>
	
	<?php get_sidebar(); ?>

</div><!--/.row-->

<?php get_footer(); ?>