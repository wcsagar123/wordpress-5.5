<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $panel_product_id;

$cproduct_id = isset($panel_product_id) ? $panel_product_id : $product->get_id();
?>

<?php if($product->get_type() == 'woosb'){ echo '<div class="woosb-product-price">';}?>
<div class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> main-price <?php if($product->get_type() == 'woosb'){ echo ' woosb-total woosb-text ';}?>"> <?php if($product->get_type() == 'woosb'){ echo '<div class="show-woosb-price">'.$product->get_price_html().'</div>'; }else{ echo $product->get_price_html(); }?>

<?php if($product->get_type() == 'simple'){$aaaprice =  $product->get_price();
?>
<?php  $eco = ( number_format((float)$aaaprice / 3, 2, '.', '')) >= 333 ? 5 : 2.5;
if( has_term( array( 'oreiller' ), 'product_cat', $product->get_ID() )) {
	$eco = '0.06';
}

if( has_term( array( 'Etagère bois Picardie' ), 'product_name', $product->get_ID() )) {
    $eco = '0.19';
}

if(  $product->get_ID() == "80003") {
    $eco = '0.19';
}

?>


<div class="eco-text"><?php if($aaaprice > 200){ ?><span class="discount-code">ou 3X <?php echo number_format((float)$aaaprice / 3, 2, '.', '').get_woocommerce_currency_symbol();?> sans frais.</span><?php }?>
<a onclick="pro_desc_btn()">Le prix juste</a><small>Dont <?php echo number_format((float)$eco, 2, '.', '');?> € d'éco-participation</small></div>
<?php }?>

 


</div>
<?php if($product->get_type() == 'woosb'){
?>
<div class="eco-text woocommerce-price-suffix"><?php echo  get_post_meta( $product->get_ID(), 'woosb_after_text', true )?>
<a href="#" class="question-icon woosb ">
            <div class="overlay discount_help">
                <div class="circle "></div>
                <div class="question-desc text-left">
                     <?php the_field('discount_help_box', $cproduct_id)?>
                </div>
            </div>
        </a>
<span class="discount-code woosb"><a onclick="pro_desc_btn()">Le prix juste</a></span>
</div>
<?php }?>  
<?php if($product->get_type() == 'woosb'){ echo '</div>';}?>
