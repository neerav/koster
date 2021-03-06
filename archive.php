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
		
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>
			
			<?php koster_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'koster' ); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'koster' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>
	</section>
	
	<?php get_sidebar(); ?>

</div><!--/.row-->

<?php get_footer(); ?>