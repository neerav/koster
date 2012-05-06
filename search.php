<?php get_header(); ?>

<div class="row">

	<section id="content" class="eightcol" role="main">
		
    	<h1 class="archive_header search">
    		<?php _e( 'Search results for', 'koster' ); ?> &ldquo; <?php the_search_query(); ?> &rdquo;
    	</h1>        
        		
		<?php get_template_part( 'loop', 'index' );?>
	</section>
	
	<?php get_sidebar(); ?>

</div><!--/.row-->

<?php get_footer(); ?>