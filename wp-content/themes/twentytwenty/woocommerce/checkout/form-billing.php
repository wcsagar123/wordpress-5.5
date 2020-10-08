<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>

<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>
			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>
		<?php endif; ?>
		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>
		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>
			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>
		<?php endif; ?>
		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
<div id="ship-to-different-billing-address">
    <label  class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox"><?php esc_html_e('Facturer à une autre adresse', 'woocommerce'); ?>
        <input id="ship-to-different-billing-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"  type="checkbox" name="ship_to_different_billing_address" value="1" >
        <span class="checkmark"></span> 
    </label>
</div>
<div class="woocommerce-billing-fields" style="display: none;">
<?php /*if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>
<div class="delivery-title text-left">
  <h6><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h6>
</div>
<?php else : ?>
<div class="delivery-title text-left">
  <h6><?php esc_html_e( 'Billing details', 'woocommerce' ); ?></h6>
</div>
<?php endif;*/

//Ceci est l'adresse de livraison

 ?>
<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>
<?php
		$fields = $checkout->get_checkout_fields( 'billing' );
//		echo '<pre>';
//print_r($fields);
//echo '</pre>';

		foreach ( $fields as $key => $field ) {
			//$field['placeholder'] = $field['label'];
                        unset($field['required']);
                        switch ( $key ) { 
				case 'billing_first_name' : 
					
					unset($field['class'][0]);
                                        echo '<div class="spe-res"><div class="datepicker"><fieldset class="form-group m-0">';
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo ' </fieldset>';
				break; 
       			case 'billing_last_name' :
					unset($field['class'][0]);	
					echo '<fieldset class="form-group  m-0">';
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo ' </fieldset></div></div>';
				break;
				case 'billing_company' :
					unset($field['class'][0]);	
					echo '<div class="row form-field mb-lg-0">
							<div class="col col-12"> <a onclick="open_checkout_field(\'billing_company_field\',\'billing_company_field_close\')"><span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
							  <path d="m256 512c-141.164062 0-256-114.835938-256-256s114.835938-256 256-256 256 114.835938 256 256-114.835938 256-256 256zm0-480c-123.519531 0-224 100.480469-224 224s100.480469 224 224 224 224-100.480469 224-224-100.480469-224-224-224zm0 0"></path>
							  <path d="m368 272h-224c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h224c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
							  <path d="m256 384c-8.832031 0-16-7.167969-16-16v-224c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v224c0 8.832031-7.167969 16-16 16zm0 0" id="billing_company_field_close"></path>
							  </svg> Ajouter un nom d\'entreprise </span> </a>
							  
							';
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo '  </div></div>';
				break;
				
				case 'billing_address_1' :
					unset($field['class'][0]);	
				
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					
					echo '<div class="row form-field mb-lg-0">
<div class="col col-12"> <a onclick="open_checkout_field(\'billing_address_2_field_group\',\'billing_address_2_field_close\')"><span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
  <path d="m256 512c-141.164062 0-256-114.835938-256-256s114.835938-256 256-256 256 114.835938 256 256-114.835938 256-256 256zm0-480c-123.519531 0-224 100.480469-224 224s100.480469 224 224 224 224-100.480469 224-224-100.480469-224-224-224zm0 0"></path>
  <path d="m368 272h-224c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h224c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
  <path d="m256 384c-8.832031 0-16-7.167969-16-16v-224c0-8.832031 7.167969-16 16-16s16 7.167969 16 16v224c0 8.832031-7.167969 16-16 16zm0 0" id="billing_address_2_field_close"></path>
  </svg> Complément d\'adresse </span> </a></div></div>';
				break;
				case 'billing_address_2' :
					
					unset($field['class'][0]);	
					echo '<div id="billing_address_2_field_group">';
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo '</div>';
					
				break;
				
				case 'billing_postcode' :
					
					unset($field['class'][0]);	
					echo '<div class="row"><div class="col-lg-4 col-sm-12 col-12"> ';
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo ' </div>';
					
				break;
				
				
				case 'billing_city' :
					
					unset($field['class'][0]);	
					echo '<div class="col-lg-8 col-sm-12 col-12"> ';
					
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo ' </div></div>';
					
				break;
				
				
				
				case 'billing_state' :
					
					unset($field['class'][0]);	
					//echo '<fieldset class="form-group form-row address-field validate-state" >';
					woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					//echo '  </fieldset>';
					
				break;
				
				
				case 'billing_country' :
					unset($field['class'][0]);	
					echo '<div class="row"><div class="col-md-12 col-sm-12 col-12">';
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo ' </div></div>';
					
				break;
				
				case 'billing_phone' :
                                    
					unset($field['class'][0]);	
					echo '<div class="row"><div class="col-md-10 col-sm-12 col-12">';
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					echo '  </div></div>';
					
				break;
				
				case 'billing_email' :
					
//					unset($field['class'][0]);	
//					echo '<div class="row"><div class="col-md-10 col-sm-12 col-12">';
//					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
//					echo '</div></div>';
					
				break;
				
				case 'billing_etage' :
					
					unset($field['class'][0]);	
//					echo '<div class="row"><div class=" col-sm-12 col-12">';
//					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
//					echo ' </div>';
					
				break;
				
				case 'billing_ascenseur' :
					
					unset($field['class'][0]);	
//					echo '<div class=" col-sm-12 col-12"> ';
//					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
//					echo ' </div></div>';
					
				break;
				
				case 'billing_refer_to' :
					
					unset($field['class'][0]);	
//					echo '<div class=" col-sm-12 col-12"> ';
//					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
//					echo ' </div></div>';
					
				break;
				default:
					
					unset($field['class'][0]);	
					
					custom_woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
					
					
				break;
				
				
				
				
				
			}
		}
		?>

<!--Informations utiles pour la livraison-->
<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div> 