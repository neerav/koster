<?php get_header(); ?>

<div class="row">

	<section id="content" class="eightcol" role="main">
		<?php if (is_category()) { ?>
		
        	<h1 class="archive_header category">
        		<?php _e( 'Category', 'koster' ); ?> / <?php echo single_cat_title(); ?>
        	</h1>        
        
            <?php } elseif (is_day()) { ?>
            <h1 class="archive_header date"><?php _e( 'Archive', 'koster' ); ?> / <?php the_time( get_option( 'date_format' ) ); ?></h1>

            <?php } elseif (is_month()) { ?>
            <h1 class="archive_header date"><?php _e( 'Archive', 'koster' ); ?> / <?php the_time( 'F, Y' ); ?></h1>

            <?php } elseif (is_year()) { ?>
            <h1 class="archive_header date"><?php _e( 'Archive', 'koster' ); ?> / <?php the_time( 'Y' ); ?></h1>

            <?php } elseif (is_author()) { ?>
            <h1 class="archive_header date"><?php _e( 'Author', 'koster' ); ?></h1>
            
            <?php } elseif (is_tag()) { ?>
            <h1 class="archive_header tag"><?php _e( 'Tag', 'koster' ); ?> / <?php echo single_tag_title( '', true ); ?></h1>
            
        <?php } ?>
		
		<?php get_template_part( 'loop', 'index' );?>
	</section>
	
	<?php get_sidebar(); ?>

</div><!--/.row-->

<?php get_footer(); ?>