<?php
/**
 * ------------------------------------------------------------------------
 * Guide Locations Form
 * ------------------------------------------------------------------------
 * This contains the form for managing and adding locations in the Guides
 * custom post.
 *
 * @package Guides
 */

?>
<div id="location-container">
<?php
if ( ! empty( $locations ) ) :
	foreach ( $locations as $index => $location ) :
		?>
	<div class="location-item" data-index="<?php echo esc_attr( $index ); ?>">
		<input type="text" name="guide-locations-<?php echo esc_attr( $index ); ?>-name" placeholder="Name" value="<?php echo esc_attr( $location['name'] ); ?>" class="location-name">
		<?php
		$editor_content = $location['description'];
		$editor_id      = 'guide-locations-' . $index . '-description';
		$settings       = array(
			'textarea_name' => 'guide-locations-' . $index . '-description',
			'media_buttons' => true,
			'textarea_rows' => 5,
			'tinymce'       => array(
				'toolbar1'      => 'formatselect | bold italic underline strikethrough | alignleft aligncenter alignright | bullist numlist | blockquote | link unlink | | pastetext removeformat',
				'toolbar2'      => '',
				'toolbar3'      => '',
				'toolbar4'      => '',
				'content_style' => 'body { font-family: San Francisco, Segoe UI, DejaVu Sans, Helvetica, Arial, sans-serif; }',
			),
		);

		wp_editor( $editor_content, $editor_id, $settings );
		?>
		<a href="https://support.google.com/maps/answer/144361?hl=en" target="_blank"><span class="dashicons dashicons-info"></span></a>
		<input type="text" name="guide-locations-<?php echo esc_attr( $index ); ?>-map" placeholder="Google Maps Embed Code" value="<?php echo esc_attr( htmlspecialchars( $location['map'] ) ); ?>">
		<label> Wi-Fi Available </label><input type="checkbox" name="guide-locations-<?php echo esc_attr( $index ); ?>-wifi" <?php echo $location['wifi'] ? esc_attr( 'checked' ) : esc_attr( '' ); ?>>
		<input type="text" name="guide-locations-<?php echo esc_attr( $index ); ?>-price" placeholder="Price" value="<?php echo esc_attr( $location['price'] ); ?>" class="location-details">
		<input type="text" name="guide-locations-<?php echo esc_attr( $index ); ?>-hours" placeholder="Store Hours" value="<?php echo esc_attr( $location['hours'] ); ?>" class="location-details">
		<button class="location-delete-button button" data-index="<?php echo esc_attr( $index ); ?>">Delete Location</button>
	</div>
<?php endforeach; else : ?>
	<div class="location-item location-item-new" data-index="0">
		<input type="text" name="guide-locations-0-name" placeholder="Name" value="" class="location-name">
		<?php
		$editor_content = '';
		$editor_id      = 'guide-locations-0-description';
		$settings       = array(
			'textarea_name' => 'guide-locations-0-description',
			'media_buttons' => true,
			'textarea_rows' => 5,
			'tinymce'       => array(
				'toolbar1'      => 'formatselect | bold italic underline strikethrough | alignleft aligncenter alignright | bullist numlist | blockquote | link unlink | | pastetext removeformat',
				'toolbar2'      => '',
				'toolbar3'      => '',
				'toolbar4'      => '',
				'content_style' => 'body { font-family: San Francisco, Segoe UI, DejaVu Sans, Helvetica, Arial, sans-serif; }',
			),
		);

		wp_editor( $editor_content, $editor_id, $settings );
		?>
		<a href="https://support.google.com/maps/answer/144361?hl=en" target="_blank"><span class="dashicons dashicons-info"></span></a>
		<input type="text" name="guide-locations-0-map" placeholder="Google Maps Embed Code" value="">
		<label> Wi-Fi Available </label><input type="checkbox" name="guide-locations-0-wifi">
		<input type="text" name="guide-locations-0-price" placeholder="Price" value="" class="location-details">
		<input type="text" name="guide-locations-0-hours" placeholder="Store Hours" value="" class="location-details">
		<button class="location-delete-button button" data-index="0">Delete Location</button>
	</div>
<?php endif; ?>
</div>
<button id="location-add-button" class="button">Add Location</button>
