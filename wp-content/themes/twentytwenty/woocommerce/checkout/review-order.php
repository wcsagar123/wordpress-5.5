<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="payment-info shop_table woocommerce-checkout-review-order-table">
        <div class="title" data-toggle="collapse" data-target="#itemdetails">
          <h6><?php esc_html_e( 'Récapitulatif', 'woocommerce' ); ?></h6>
          <div class="payment-toggle"><?php echo  WC()->cart->cart_contents_count; echo ( WC()->cart->cart_contents_count == 1) ? ' article':' articles' ;?></div>
        </div>
        <div id="itemdetails" class="collapse">
           
		  <?php	do_action( 'woocommerce_review_order_before_cart_contents' );?>
		  <ul class="total_sub_total_price mb-2">
		  <?php 
		  	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	
				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					?>
                    
					<li class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<label class="cart-subtotal__title product-name">
							<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( 'Qté&nbsp;:&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</label>
						<span class="cart-subtotal__price product-total"> 
							<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
					</li>
					<?php
				}
			}
			?>
            </ul>
            <?php do_action( 'woocommerce_review_order_after_cart_contents' );?>
          
        </div>
        <ul class="total_sub_total_price">
          <li class="cart-subtotal">
            <label class="cart-subtotal__title"><?php esc_html_e( 'Sous-total', 'woocommerce' ); ?></label>
            <span class="cart-subtotal__price"><?php wc_cart_totals_subtotal_html(); ?></span> </li>
          
		
        
        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			 <li class="shipping">
                    <label class="cart-subtotal__title"><?php esc_html_e( 'Livraison', 'woocommerce' ); ?></label>
                    <span class="cart-offer cart-subtotal__price" data-title="<?php esc_attr_e( 'Livraison', 'woocommerce' ); ?>"><?php echo   str_replace( "Free!", "Offerte - 0 €", WC()->cart->get_cart_shipping_total());;;?></span>
                </li>
    

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
    		
                <li class="shipping">
                    <label class="cart-subtotal__title"><?php esc_html_e( 'Livraison', 'woocommerce' ); ?></label>
                    <span class="cart-offer cart-subtotal__price" data-title="<?php esc_attr_e( 'Livraison', 'woocommerce' ); ?>"><?php echo   str_replace( "Free!", "Offerte - 0 €", WC()->cart->get_cart_shipping_total());;;?></span>
                </li>
    
            
		<?php endif; ?>
         <?php if ( wc_coupons_enabled() ) { ?>
        <div class="total_sub_total_price px-0 py-3 checkout-coupon-form">
               
                <div  class="code-cnt">
                  <form id="ajax-coupon-redeem" action="#">
                    <div class="code-field <?php if(count( WC()->cart->get_coupons()) > 0){echo 'active';}?>" onclick="open_coupon_form()"> <span class="offer-title">Utiliser un code partenaire</span> </div>
                    <div class="input-box coupon  ">
                      <?php 
                            if(count( WC()->cart->get_coupons()) > 0){
                            foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                      <span class="offer-code"><?php echo $coupon->get_code(); ?> (Offre Duo)
                      <?php wc_cart_totals_coupon_html( $coupon ); ?>
                      </span>
                      <?php endforeach; ?>
                      <?php }else{?>
                      
                      <input type="text" name="coupon_code" class=""  id="coupon_code"  placeholder="<?php esc_attr_e( 'Votre code', 'woocommerce' ); ?>" >
                      <button type="submit" class="btn" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"></button>
                      <div class="WFwrap result"></div>
                      
                      <?php }?>
                      <?php do_action( 'woocommerce_cart_coupon' ); ?>
                    </div>
                  </form>
                </div>
               
              </div>
             
               <?php } ?>
		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<li class="fee">
				<label class="cart-subtotal__title"><?php echo esc_html( $fee->name ); ?></label>
				<span class="cart-subtotal__price"><?php wc_cart_totals_fee_html( $fee ); ?></span>
			</li>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
					<li class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<label class="cart-subtotal__title"><?php echo esc_html( $tax->label ); ?></label>
						<span class="cart-subtotal__price"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
					</li>
				<?php endforeach; ?>
			<?php else : ?>
				<li class="tax-total">
					<label class="cart-subtotal__title"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></label>
					<span class="cart-subtotal__price"><?php wc_cart_totals_taxes_total_html(); ?></span>
				</li>
			<?php endif; ?>
		<?php endif; ?>
        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<li class="order-total grand--total">
			<label class="cart-subtotal cart-subtotal__title"><?php esc_html_e( 'Total', 'woocommerce' ); ?></label>
			<span class="cart-subtotal cart-subtotal__price"><?php wc_cart_totals_order_total_html(); ?></span>
		</li>
        <li class="cart--summary">
                <?php
                // If prices are tax inclusive, show taxes here.
				$value = '';
                if ( wc_tax_enabled() && WC()->cart->display_prices_including_tax() ) {
                    $tax_string_array = array();
                    $cart_tax_totals  = WC()->cart->get_tax_totals();
            		
                    if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) {
                        foreach ( $cart_tax_totals as $code => $tax ) {
                            $tax_string_array[] = sprintf( '%s %s', $tax->formatted_amount, $tax->label );
                        }
                    } elseif ( ! empty( $cart_tax_totals ) ) {
                        $tax_string_array[] = sprintf( '%s', wc_price( WC()->cart->get_taxes_total( true, true ) ) );
                    }
            
                    if ( ! empty( $tax_string_array ) ) {
						
                        $taxable_address = WC()->customer->get_taxable_address();
                        /* translators: %s: country name */
                        $estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ? sprintf( ' ' . __( 'estimated for %s', 'woocommerce' ), WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] ) : '';
                        /* translators: %s: tax information */
                        $value .= '<small class="includes_tax">' . sprintf( __( 'TVA incluse (%s)', 'woocommerce' ), implode( ', ', $tax_string_array )
						) . '</small>';
                    }         
                }
				echo $value;
				?>
       			<small>Eco-participation incluse (15,00 €)</small> </li>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
         
        </ul>
        <ul class="pro-list">
          <li>Livraison dans la pièce offerte</li>
          <li>Paiement 100% sécurisé</li>
          <li>1% reversés pour la planète</li>
        </ul>
        <?php if(get_field('footer_1_payment_icon_list','option')): ?>
              <ul class="payment-list">
                <?php 
					$i = 1;
					while(has_sub_field('footer_1_payment_icon_list','option')):  $link = get_sub_field('link');  if($link){?>
                <li><a href="<?php echo $link['url'] ?>"> <img src="<?php the_sub_field('icon'); ?>"/> </a></li>
                <?php
					}
				$i++;
				endwhile; ?>
              </ul>
              <?php endif; ?>
      </div>
      <script>
		$(document).ready(function () {
			$('.woocommerce-checkout-review-order-table .woocommerce-shipping-methods input.shipping_method').click(function (e) {
					var val = jQuery(".woocommerce-checkout-review-order-table .woocommerce-shipping-methods input.shipping_method:checked").val();					
					jQuery('.hidden-shipping-method .woocommerce-shipping-methods input.shipping_method[value="'+val+'"]').prop('checked',true);
					jQuery('body').trigger('update_checkout');
					
			});
		}); 
      </script>