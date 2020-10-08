<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



?>

<div class="row justify-content-center mr-md-0">
	<?php
    do_action( 'woocommerce_before_checkout_form', $checkout );

	// If checkout registration is disabled and not logged in, the user cannot checkout.
	if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
		echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
		return;
	}
	?>
    <div class="col-md-8 px-lg-5 payment-bg">
    <div class="WFwrap payment-method-step mb-0 checkout-coupon-form">
          <div class="row justify-content-center">
          <div class="col-lg-8 col-12">
     <?php	do_action( 'woocommerce_checkout_login_coupon_form', $checkout );?>
     </div>
     </div>
     </div>
      <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
      <div class="panel panel-primary setup-content" id="step-1">
      
        <div class="WFwrap payment-method-step mt-0">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
             
              
              <div class="WFwrap delivery-form">
                <div class="delivery-title text-left">
                  <h6>Où souhaitez vous être livré ?</h6>
                </div>
                
                 <?php if ( $checkout->get_checkout_fields() ) : ?>
				  <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                  <div id="customer_details">
                      <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                      <?php do_action( 'woocommerce_checkout_billing' ); ?>
                  </div>
                  <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
                  <?php endif; ?>
                
                 
                    <div class="spe-res">
                    <div class="datepicker">
                      <fieldset class="form-group">
                        <button type="button" name="button" class="back-btn prevBtn"  onclick="window.location='<?php echo wc_get_cart_url(); ?>'">Revenir</button>
                      </fieldset>
                      <fieldset class="form-group">
                        <button type="button" name="button" class="address-btn " id="confirm-order-button"><span>Commander</span></button>
                      </fieldset>
                    </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-primary setup-content" id="step-2">
        <div class="WFwrap payment-method">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
            	 <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
            	 <div class="title text-left">
                    <h6>Comment souhaitez vous payer ?</h6>
                    <small>Toutes les transactions sont sécurisées et cryptées</small> 
                 </div>
                 
                  <div id="order_review" class="woocommerce-checkout-review-order">
                    <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                  </div>
                  <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                 
            </div>
          </div>
        </div>
      </div>
       <div class="hidden hidden-shipping-method" style="display:none">
       <ul>
  <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

	<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
    
    <?php wc_cart_totals_shipping_html(); ?>

    <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

    <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
    
        <li class="shipping">
            <label class="cart-subtotal__title"><?php esc_html_e( 'Livraison', 'woocommerce' ); ?></label>
            <span class="cart-offer cart-subtotal__price" data-title="<?php esc_attr_e( 'Livraison', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></span>
        </li>

    <?php endif; ?> 
    </ul>  
  </div>
</form>
    </div>
    <div class="col-md-4">
     <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
 
      <?php do_action('woocommerce_checkout_order_review_sidepanel');?>
      
    </div>
    
  </div> 

 
  
 
 

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
