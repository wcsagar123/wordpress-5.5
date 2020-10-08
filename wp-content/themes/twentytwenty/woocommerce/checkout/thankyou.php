<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">
	<?php
	if ( $order ) :
		do_action( 'woocommerce_before_thankyou', $order->get_id() );?>
        
    	<?php if ( $order->has_status( 'failed' ) ) : ?>

			<h2>la commande a échoué !</h2>
            <div class="desc">
				<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><strong><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></strong></p>
            </div>
			
            <div class="tunnel-btn woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay btn primary-btn"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay btn primary-btn">
						<?php esc_html_e( 'My account', 'woocommerce' ); ?>
                    </a>
				<?php endif; ?>			
            </div>
			
		<?php else : ?>
        	<?php if($order->get_payment_method() == 'bacs'){?>
                <h2>Merci pour votre commande</h2>
                <div class="desc">
               
                    <p><b><?php echo 'Nous avons bien reçu votre commande ('.$order->get_order_number().') d’un montant de '. $order->get_formatted_order_total().' réalisée le '. $order->get_date_created()->format('d/m/Y').' à régler par virement bancaire.'; ?></b></p>
                    
                    <p><?php echo  'Votre commande <strong>sera prise en compte par nos services à réception de votre paiement.</strong> Afin de procéder au virement bancaire, nous vous invitons à <strong>utiliser votre numéro de commande comme référence du paiement.</strong> Vous pouvez procéder au virement bancaire vers le compte ci-dessous : '; ?></p>
                    
                    <div class="bank-transfer-details">
                    <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
                    </div>
                  
                    <p><?php echo  'Pour les matelas et sommiers de taille standard, vous allez être contacté par notre transporteur dans les 5 jours ouvrés suivant la réception du paiement  afin de choisir ensemble le jour de livraison. Le créneau de livraison de 2 heures vous sera confirmé la veille de la livraison.'; ?></p>
                    
                    <p><?php echo  'Pour les autres produits dont le sur-mesure, vous recevrez votre colis dans les 10 jours ouvrés suivant la réception du paiement et serez informé du parcours de votre colis par email.  '; ?></p>
                    
                    <p><?php echo  'Notre service client reste à votre écoute pour tout renseignement concernant votre commande ou nos produits.'; ?></p>
                   
                </div>
            <?php }else{?>
                <h2>Merci !</h2>
                <div class="desc">
                
                    <p><b><?php esc_html_e( 'Votre commande ('.$order->get_order_number().') a été validée et va être préparée.', 'woocommerce' ); ?></b></p>
                    <p><?php esc_html_e( 'Pour les matelas et sommiers de taille standard, vous allez être contacté par notre transporteur sous 5 jours ouvrés afin de choisir ensemble le jour de livraison. Le créneau de livraison de 2 heures vous sera confirmé la veille de la livraison.', 'woocommerce' ); ?></p>
                    <p> <?php esc_html_e( 'Pour les autres produits dont le sur-mesure, vous recevrez votre colis sous 10 jours ouvrés et serez informé du parcours de votre colis par email.', 'woocommerce' ); ?></p><br><br>
                    <p><?php echo  'Commande ('.$order->get_order_number().') d\'un montant de '. $order->get_formatted_order_total().' réglée par carte bancaire le '.wc_format_datetime( $order->get_date_created() ).'.'; ?></p>
                </div>
            <?php }?>
            
    	<?php endif; ?>
        
        
        <?php if($order->get_payment_method() != 'bacs'):?>
             <div class="tunnel-btn">
                <a href="#" class="btn primary-btn" data-toggle="collapse" data-target="#view-order">Voir ma commande</a>
                <?php if ( ! $order->has_status( 'failed' ) ) : ?>
                	<p><?php esc_html_e( 'Notre service client reste à votre écoute pour tout renseignement concernant votre commande ou nos produits.', 'woocommerce' ); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div id="view-order" class="collapse desc">
			<?php if ( ! $order->has_status( 'failed' ) ) : ?>
                    <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
        
                        <li class="woocommerce-order-overview__order order">
                            <?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
                            <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                        </li>
        
                        <li class="woocommerce-order-overview__date date">
                            <?php esc_html_e( 'Date:', 'woocommerce' ); ?>
                            <strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                        </li>
        
                        <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                            <li class="woocommerce-order-overview__email email">
                                <?php esc_html_e( 'Email:', 'woocommerce' ); ?>
                                <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                            </li>
                        <?php endif; ?>
        
                        <li class="woocommerce-order-overview__total total">
                            <?php esc_html_e( 'Total:', 'woocommerce' ); ?>
                            <strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                        </li>
        
                        <?php if ( $order->get_payment_method_title() ) : ?>
                            <li class="woocommerce-order-overview__payment-method method">
                                <?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
                                <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                            </li>
                        <?php endif; ?>
        
                    </ul>
            <?php endif; ?> 
           
            <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
        </div>
<?php else : ?>
		<div class="desc">
			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
        </div>

<?php endif; ?>
</div>
