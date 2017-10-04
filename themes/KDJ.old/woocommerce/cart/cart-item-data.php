<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<dl class="variation">
	<?php
		foreach ( $item_data as $data ) :
			$key = sanitize_text_field( $data['key'] );
	?>
		<li><?php echo wp_kses_post( $data['key'] ); ?> : <?php echo wp_kses_post(  $data['value']  ); ?></li>
	<?php endforeach; ?>
</dl>
