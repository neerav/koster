<?php 
// WooCommerce functions and overrides

// Remove content wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Remove sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Fix content wrappers
add_action( 'woocommerce_before_main_content', 'koster_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'koster_after_content', 20 );
if (!function_exists('koster_before_content')) {
	function koster_before_content() { ?>
	    <div class="row">
	    	<section id="content" class="eightcol woocommerce">
	<?php
	}
}

if (!function_exists('koster_after_content')) {
	function koster_after_content() {
	?>
		</section><!-- /#content -->
		<?php woocommerce_get_sidebar(); ?>
	    </div><!-- /.row-->
	    <?php
	}
}

// Remove the breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
?>