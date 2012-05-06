<?php get_header(); ?>

<div class="row">

	<section id="content" class="eightcol" role="main">
		<?php get_template_part( 'loop', 'index' );?>
	</section>
	
	<?php get_sidebar(); ?>

</div><!--/.row-->

<?php get_footer(); ?>