<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
global $product;
 if (function_exists('get_product_small_widget')){   get_product_small_widget( $product->get_ID() ); }
if ( ! $short_description ) {
	return;
}

?>

<div class="woocommerce-product-details__short-description desc">
<?php $made_in = get_field('made_in'); 
if( $made_in['hide'] == false ){
?>
<span class="made-in-btn" > <img src="<?php echo ( $made_in['icon']) ? $made_in['icon'] : '';?>" /><?php echo $made_in['text'];?></span> 

<?php } ?>
 <?php echo $short_description; // WPCS: XSS ok. ?> 

</div>