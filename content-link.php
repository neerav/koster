<article <?php post_class(); ?>>
	<?php
		$content = get_the_content();
		$linktoend = stristr($content, "http" );
		$afterlink = stristr($linktoend, ">");
		if ( ! strlen( $afterlink ) == 0 ):
		$linkurl = substr($linktoend, 0, -(strlen($afterlink) + 1));
		else:
		$linkurl = $linktoend;
		endif;
	?>
	<h1 class="title"><a href="<?php echo $linkurl; ?>" rel="external" title="<?php _e('Exernal link to', 'koster'); ?> <?php the_title(); ?>"><?php the_title(); ?> &rarr;</a></h1>
</article>