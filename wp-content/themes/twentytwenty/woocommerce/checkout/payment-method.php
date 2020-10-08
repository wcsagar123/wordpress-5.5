<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<div class="payment-option wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
    <div class="title link1" >
	
       <input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
      <h6 for="payment_method_<?php echo esc_attr( $gateway->id ); ?>"><?php echo $gateway->get_title(); ?> </h6>
      <ul class="payment-list">
        
        <?php if($gateway->id == 'payzenstd'){ ?>
        	 <li><img src="<?php echo get_template_directory_uri().'/img/Visa.svg';?>" /></li>
             <li><img src="<?php echo get_template_directory_uri().'/img/mastercard.svg';?>" /> </li>
             <li><img src="<?php echo get_template_directory_uri().'/img/CB.svg';?>" /></li>
       
        <?php }elseif($gateway->id == 'paypal'){ ?>
        	 <li><img src="<?php echo get_template_directory_uri().'/img/Paypal.svg';?>" /></li>
        <?php }elseif($gateway->id == 'bacs'){ ?>
        	 <li><img src="<?php echo get_template_directory_uri().'/img/virement.svg';?>" /></li>
        <?php }elseif($gateway->id == 'payzenmulti'){ ?>
        	 <li><img src="<?php echo get_template_directory_uri().'/img/Visa.svg';?>" /></li>
             <li><img src="<?php echo get_template_directory_uri().'/img/mastercard.svg';?>" /> </li>
             <li><img src="<?php echo get_template_directory_uri().'/img/CB.svg';?>" /></li>
        <?php }elseif($gateway->id == 'sofinco'){ ?>
        	 <li><img src="<?php echo get_template_directory_uri().'/img/sofinco.svg';?>" /></li>
        <?php }else{?>
			 <li> <?php echo $gateway->get_icon(); ?> </li>
		<?php }?>
      </ul>
    </div>
    <?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
      <div class="form-grp payment_box payment_method_<?php echo esc_attr( $gateway->id ); ?>" <?php if ( ! $gateway->chosen ) :?>style="display:none;"<?php endif; ?>>
      <?php 
	  	 if($gateway->id == 'payzenstd'){
			  $description = $gateway->get_option('description');

                if (is_array($description)) {
                    $description = isset($description[get_locale()]) && $description[get_locale()] ? $description[get_locale()] : $description['en_US'];
                }
			 echo '<p>'.$description.'</p>';
		  $gateway->payment_fields();
		 }elseif($gateway->id == 'paypal'){
			 $gateway->payment_fields();
			 echo ' <p><a href="https://www.paypal.com/fr/webapps/mpp/paypal-popup" class="paypal_text" onclick="javascript:window.open(\'https://www.paypal.com/fr/webapps/mpp/paypal-popup\',\'WIPaypal\',\'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700\'); return false;">Qu’est-ce que PayPal&nbsp;?</a></p>';
        }
		 else{
			 $gateway->payment_fields();
		 }?>
	  </div>
	<?php endif; ?>
  </div>
