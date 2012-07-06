<?php
/**
 * Properly enqueue styles and scripts for our theme options page.
 */
function koster_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_script( 'koster-theme-options', get_template_directory_uri() . '/includes/js/theme-options.js', array( 'farbtastic' ), '2011-06-10' );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'koster_admin_enqueue_scripts' );


// Based on http://themeshaper.com/2010/06/03/sample-theme-options/

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'koster_options', 'koster_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'koster' ), __( 'Theme Options', 'koster' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'koster' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'koster' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'koster_options' ); ?>
			<?php $options = get_option( 'koster_theme_options' ); ?>
			<?php $koster_options = get_option('koster_theme_options'); ?>

			<table class="form-table">
			
				<?php
				/**
				 * Logo URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Logo image URL', 'koster' ); ?></th>
					<td>
						<input id="koster_theme_options[logo_url]" class="regular-text" type="text" name="koster_theme_options[logo_url]" value="<?php esc_attr_e( $options['logo_url'] ); ?>" placeholder="http://" />
						<label class="description" for="koster_theme_options[logo_url]"><?php _e( 'The URL to your logo file', 'koster' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Background Color
				 */
				?>
				
				<tr valign="top"><th scope="row"><?php _e( 'Background color', 'koster' ); ?></th>
					<td>
						<input type="text" name="koster_theme_options[background_color]" id="background-color" value="<?php echo esc_attr( $options['background_color'] ); ?>" placeholder="#f4f7f7" style="background-color:<?php echo $koster_options['background_color']; ?>" />
						<input type="button" class="pickcolor button-secondary" value="<?php _e('Select Color','koster') ;?>">
						<div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
						<label class="description" for="koster_theme_options[background_color]"><?php _e( 'The web site background color', 'koster' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Content Background Color
				 */
				?>
				
				<tr valign="top"><th scope="row"><?php _e( 'Content background color', 'koster' ); ?></th>
					<td>
						<input type="text" name="koster_theme_options[content_background_color]" id="content-background-color" value="<?php echo esc_attr( $options['content_background_color'] ); ?>" placeholder="#fff" style="background-color:<?php echo $koster_options['content_background_color']; ?>" />
						<input type="button" class="pickcolor button-secondary" value="<?php _e('Select Color','koster') ;?>">
						<div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
						<label class="description" for="koster_theme_options[content_background_color]"><?php _e( 'The content background color', 'koster' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Text Color
				 */
				?>
				
				<tr valign="top"><th scope="row"><?php _e( 'Text color', 'koster' ); ?></th>
					<td>
						<input type="text" name="koster_theme_options[text_color]" id="link-color" value="<?php echo esc_attr( $options['text_color'] ); ?>" placeholder="#444" style="background-color:<?php echo $koster_options['text_color']; ?>" />
						<input type="button" class="pickcolor button-secondary" value="<?php _e('Select Color','koster') ;?>">
						<div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
						<label class="description" for="koster_theme_options[text_color]"><?php _e( 'The main article/page text color', 'koster' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Heading Color
				 */
				?>
				
				<tr valign="top"><th scope="row"><?php _e( 'Heading color', 'koster' ); ?></th>
					<td>
						<input type="text" name="koster_theme_options[heading_color]" id="link-color" value="<?php echo esc_attr( $options['heading_color'] ); ?>" placeholder="#333" style="background-color:<?php echo $koster_options['heading_color']; ?>" />
						<input type="button" class="pickcolor button-secondary" value="<?php _e('Select Color','koster') ;?>">
						<div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
						<label class="description" for="koster_theme_options[heading_color]"><?php _e( 'H1, H2, H3, H4, H5 & H6', 'koster' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Link Color
				 */
				?>
				
				<tr valign="top"><th scope="row"><?php _e( 'Link color', 'koster' ); ?></th>
					<td>
						<input type="text" name="koster_theme_options[link_color]" id="link-color" value="<?php echo esc_attr( $options['link_color'] ); ?>" placeholder="#4d9d9f" style="background-color:<?php echo $koster_options['link_color']; ?>" />
						<input type="button" class="pickcolor button-secondary" value="<?php _e('Select Color','koster') ;?>">
						<div class="colorpicker" style="z-index:100; position:absolute; display:none;"></div>
						<label class="description" for="koster_theme_options[link_color]"><?php _e( 'The web site link color', 'koster' ); ?></label>
					</td>
				</tr>
				
				<?php
				/**
				 * Analytics property ID
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Analytics Property ID', 'koster' ); ?></th>
					<td>
						<input id="koster_theme_options[analytics_id]" class="regular-text" type="text" name="koster_theme_options[analytics_id]" value="<?php esc_attr_e( $options['analytics_id'] ); ?>" placeholder="UA-XXXXXXXX-X" />
						<label class="description" for="koster_theme_options[analytics_id]"><?php _e( 'The URL to your logo file', 'koster' ); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'koster' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Set defaults.
 */
function koster_get_default_options() {
     $koster_options = array(
          'background_color' => '#f4f7f7',
          'link_color' => '#4d9d9f',
          'text_color' => '#444',
          'text_color' => '#333',
          'content_background_color' => '#fff',
          'logo_url' => 'http://www.gravatar.com/avatar/babdd787a9577a0e615246ac79cf2826?s=256&d=identicon&r=PG',
          'analytics_id' => 'UA-XXXXXXXX-X',
     );
     return $koster_options;
}

function koster_options_init() {
     // set options equal to defaults
     global $koster_options;
     $koster_options = get_option( 'koster_theme_options' );
     if ( false === $koster_options ) {
          $koster_options = koster_get_default_options();
     }
     update_option( 'koster_theme_options', $koster_options );
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {

	// Say our text option must be safe text with no HTML tags
	$input['logo_url'] = wp_filter_nohtml_kses( $input['logo_url'] );
	$input['background_color'] = wp_filter_nohtml_kses( $input['background_color'] );
	$input['content_background_color'] = wp_filter_nohtml_kses( $input['content_background_color'] );
	$input['text_color'] = wp_filter_nohtml_kses( $input['text_color'] );
	$input['heading_color'] = wp_filter_nohtml_kses( $input['heading_color'] );
	$input['link_color'] = wp_filter_nohtml_kses( $input['link_color'] );
	$input['analytics_id'] = wp_filter_nohtml_kses( $input['analytics_id'] );
	
	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/