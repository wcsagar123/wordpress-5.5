<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="payment-info cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
  <?php do_action( 'woocommerce_before_cart_totals' ); ?>
  <div class="shop_table shop_table_responsive">
    <div class="title mb-0">
      <h6 class="m-0">
        <?php esc_html_e( 'Récapitulatif', 'woocommerce' ); ?>
      </h6>
      <span><?php echo  WC()->cart->cart_contents_count; echo ( WC()->cart->cart_contents_count == 1) ? ' article':' articles' ;?> </span> </div>
    <ul class="total_sub_total_price">
      <li  class="cart-subtotal">
        <label class="cart-subtotal__title">
          <?php esc_html_e( 'Sous-total', 'woocommerce' ); ?>
        </label>
        <span class="cart-subtotal__price" data-title="<?php esc_attr_e( 'Sous-total', 'woocommerce' ); ?>">
        <?php wc_cart_totals_subtotal_html(); ?>
        </span> </li>
      <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
      <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
      <?php wc_cart_totals_shipping_html(); ?>
      <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
      <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
      <li class="shipping">
        <label class="cart-subtotal__title">
          <?php esc_html_e( 'Livraison', 'woocommerce' ); ?>
        </label>
        <span class="cart-offer cart-subtotal__price" data-title="<?php esc_attr_e( 'Livraison', 'woocommerce' ); ?>">
        <?php  echo   str_replace( "Free!", "Offerte - 0 €", WC()->cart->get_cart_shipping_total());;;?>
        </span> </li>
      <?php endif; ?>
      <?php if ( wc_coupons_enabled() ) { ?>
          <li class="code-cnt"> 
            <form id="ajax-coupon-redeem" action="#">
              <div class="code-field <?php if(count( WC()->cart->get_coupons()) > 0){echo 'active';}?>" onclick="open_coupon_form()"> <span class="offer-title">Utiliser un code partenaire</span> </div>
              <div class="input-box  coupon ">
                 <div class="input-box-inner">
                <input type="text" name="coupon_code" class=""  id="coupon_code"  placeholder="<?php esc_attr_e( 'Votre code', 'woocommerce' ); ?>" >
                <button type="submit" class="btn" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"></button>
                <div class="WFwrap result"></div>
                </div>
                <?php 
                 if(count( WC()->cart->get_coupons()) > 0){
                    foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                <span class="offer-code"><?php echo $coupon->get_code(); ?> (Offre Duo)
                <?php wc_cart_totals_coupon_html( $coupon ); ?>
                </span>
                <?php endforeach; ?>
                <?php }?>
                <?php do_action( 'woocommerce_cart_coupon' ); ?>
              </div>
            </form>
          </li>
      <?php } ?>
      <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
      <li class="fee">
        <label class="cart-subtotal__title"><?php echo esc_html( $fee->name ); ?></label>
        <span class="cart-offer cart-subtotal__price"  data-title="<?php echo esc_attr( $fee->name ); ?>">
        <?php wc_cart_totals_fee_html( $fee ); ?>
        </span> </li>
      <?php endforeach; ?>
      <?php
				if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
					$taxable_address = WC()->customer->get_taxable_address();
					$estimated_text  = '';
		
					if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
						/* translators: %s location. */
						$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
					}
		
					if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
						foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
							?>
      <li class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
        <label class="cart-subtotal cart-subtotal__title"><?php echo esc_html( $tax->label ) . $estimated_text; ?></label>
        <span class="cart-subtotal cart-subtotal__price" data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span> </li>
      <?php
						}
					} else {
						?>
      <li class="tax-total">
        <label class="cart-subtotal cart-subtotal__title"><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text;?></label>
        <span class="cart-subtotal cart-subtotal__price" data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>">
        <?php wc_cart_totals_taxes_total_html(); ?>
        </span> </li>
      <?php
					}
				}
				?>
      <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
      <li class="grand--total order-total">
        <label class="cart-subtotal cart-subtotal__title">
          <?php esc_html_e( 'Total', 'woocommerce' ); ?>
        </label>
        <span class="cart-subtotal cart-subtotal__price" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
        <?php wc_cart_totals_order_total_html(); ?>
        </span> </li>
      <li class="cart--summary">
        <?php
                // If prices are tax inclusive, show taxes here.
				$value = '';
                if ( wc_tax_enabled() && WC()->cart->display_prices_including_tax() ) {
                    $tax_string_array = array();
                    $cart_tax_totals  = WC()->cart->get_tax_totals();
            		
                    if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) {
                        foreach ( $cart_tax_totals as $code => $tax ) {
                            $tax_string_array[] = sprintf( '%s', $tax->formatted_amount);
                        }
                    } elseif ( ! empty( $cart_tax_totals ) ) {
                        $tax_string_array[] = sprintf( '%s', wc_price( WC()->cart->get_taxes_total( true, true ) ) );
                    }
            	
                    if ( ! empty( $tax_string_array ) ) {
						
                        $taxable_address = WC()->customer->get_taxable_address();
                        /* translators: %s: country name */
                        $estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ? sprintf( ' ' . __( 'estimated for %s', 'woocommerce' ), WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] ) : '';
                        /* translators: %s: tax information */
                        $value .= '<small class="includes_tax">' . sprintf( __( 'TVA incluse (%s)', 'woocommerce' ), implode( ', ', $tax_string_array )  ) . '</small>';
                    }         
                }
				echo $value;
				?>
        <small>Eco-participation incluse (<?php echo get_eco_price_cart();?>)</small> </li>
      <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
    </ul>
    <div class="cart-btn">
      <div class="row">
        <div class="col-12">
          <div class="wc-proceed-to-checkout">
            <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
          </div>
        </div>
      </div>
      <small>Livraison gratuite</small> </div>
    <?php if(get_field('footer_1_payment_icon_list','option')): ?>
    <ul class="payment-list">
      <?php 
					$i = 1;
					while(has_sub_field('footer_1_payment_icon_list','option')): ?>
      <li><a href="<?php $link = get_sub_field('link'); echo $link['url'] ?>"> <img src="<?php the_sub_field('icon'); ?>"/> </a></li>
      <?php
				
				$i++;
				endwhile; ?>
    </ul>
    <?php endif; ?>
    <?php do_action( 'woocommerce_after_cart_totals' ); ?>
  </div>
</div>