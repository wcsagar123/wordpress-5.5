<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
              <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                <tr>
                  <td class="pl-12 pr-12" style="padding:0 25px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td>
                          <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F0F6ED">
                            <tr>
                              <td class="pl-20 pr-20" style="padding:42px 0;">
                                <!--[if mso]><table width="320" cellspacing="0" cellpadding="0" border="0" align="center"><![endif]--><!--[if !mso]><!-->
                                <table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;max-width:320px;"><!--<![endif]-->
                                  <tr>
                                    <td>
                                      <p style="font:16px Arial,sans-serif;color:#305157;text-align:center;"><?php printf( esc_html__( 'Bonjour %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
                                      <p style="margin:14px 0;font:bold 25px Arial,sans-serif;color:#305157;text-align:center;">
                                        Commande validée
                                      </p>
                                      <p style="font:16px Arial,sans-serif;color:#305157;line-height:23px;text-align:center;">
                                        Votre commande a bien été prise en compte et toute l’équipe Kipli vous en remercie. 
                                      </p>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                              <td align="center" style="padding:33px 0 9px 0;font:bold 20px Arial,sans-serif;color:#305157;">
                                Commande nº <?php echo $order->get_order_number(); ?>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" style="padding:0 0 26px 0;font:16px Arial,sans-serif;color:#305157;line-height:23px;">
                                <?php if ( $order->get_item_count() == "1" ) : ?>
                                  <?php echo esc_html( $order->get_item_count() ); ?> article
                                <?php else : ?>
                                  <?php echo esc_html( $order->get_item_count() ); ?> articles
                                <?php endif; ?>
                              </td>
                            </tr>
                          </table>
                          <?php
                            echo wc_get_email_order_items( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                              $order,
                              array(
                                'show_sku'      => $sent_to_admin,
                                'show_image'    => false,
                                'image_size'    => array( 32, 32 ),
                                'plain_text'    => $plain_text,
                                'sent_to_admin' => $sent_to_admin,
                              )
                            );
                          ?>
                          <div style="display:table;width:100%;">
                          <!--[if mso]><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td valign="top" width="268" style="background-color:#EFF1F2;"><![endif]-->
                            <div class="column" style="display:table-cell;width:330px;vertical-align:top;background-color:#EFF1F2;">
                              <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                  <td class="pl-20 pr-20" style="padding:30px;">
                                    <p style="font:bold 16px Arial,sans-serif;color:#305157;line-height:15px;">
                                      <?php esc_html_e( 'Adresse de livraison', 'woocommerce' ); ?><br><br>
                                    </p>
                                    <p style="font:14px Arial,sans-serif;color:#305157;line-height:22px;">
                                      <?php echo esc_html( $order->get_shipping_address_1()); ?><br>
                                      
                                      <?php echo esc_html( $order->get_shipping_postcode()); ?>&nbsp;<?php echo esc_html( $order->get_shipping_city()); ?><br>
                                      <?php echo esc_html( $order->get_shipping_country()); ?>
                                    </p>
                                  </td>
                                </tr>
                              </table>
                            </div>
                            <!--[if mso]></td><td width="14" style="background-color:#FFFFFF;"><![endif]-->
                            <div class="column" style="display:table-cell;width:14px;vertical-align:top;font-size:1px;line-height:20px;background-color:#FFFFFF;">
                              &nbsp;
                            </div>
                            <!--[if mso]></td><td valign="top" width="268" style="background-color:#EFF1F2;"><![endif]-->
                            <div class="column" style="display:table-cell;width:330px;vertical-align:top;background-color:#EFF1F2;">
                              <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                  <td class="pl-20 pr-20" style="padding:30px;">
                                    <p style="font:bold 16px Arial,sans-serif;color:#305157;line-height:15px;">
                                      <?php esc_html_e( 'Adresse de facturation', 'woocommerce' ); ?><br><br>
                                    </p>
                                    <p style="font:14px Arial,sans-serif;color:#305157;line-height:22px;">
                                      <?php echo esc_html( $order->get_billing_address_1()); ?><br>
                                      
                                      <?php echo esc_html( $order->get_billing_postcode()); ?>&nbsp;<?php echo esc_html( $order->get_billing_city()); ?><br>
                                      <?php echo esc_html( $order->get_billing_country()); ?>
                                    </p>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          <!--[if mso]></td></tr></table><![endif]-->
                          </div>
                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                              <td align="center" style="padding:30px 0;font:bold 20px Arial,sans-serif;color:#305157;">Totaux et paiement</td>
                            </tr>
                          </table>
<?php
/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );                         
/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email ); ?>
                          <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                              <td style="padding:25px 0;">
                                <table cellspacing="0" cellpadding="0" border="0">
                                  <tr>
                                    <td width="13"><img src="https://kipli.com/fr/wp-content/uploads/2020/06/check.jpg" width="13"></td>
                                    <td width="12"></td>
                                    <td style="font:16px Arial,sans-serif;color:#305157;">
                                    	<?php if ( $order->get_payment_method()== "bacs" ) : ?>
                                    	Réglé par virement bancaire le <?php echo $order->get_date_paid()->format ('d-m-Y'); ?>
                                    	<?php else : ?>
                                      Réglé par carte bancaire le <?php echo $order->get_date_paid()->format ('d-m-Y'); ?>
                                      <?php endif; ?>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td align="center" style="padding:28px 12px;font:bold 25px Arial,sans-serif;color:#305157;">
                    Et maintenant ?
                  </td>
                </tr>
              </table>
              <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                <tr>
                  <td class="pl-12 pr-12 pb-34" style="padding:0 25px 56px 25px;">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td>
                          <p style="margin:34px 0;font:bold 20px Arial,sans-serif;color:#305157;text-align:center;">La livraison de votre commande</p>
                          <p style="font:16px Arial,sans-serif;color:#305157;line-height:22px;">
                            Chez Kipli, le mode de livraison dépend des produits que vous avez commandé. Pour tout savoir sur la livraison de votre commande, suivez le guide !<br><br><br>

                            <strong>Si votre commande comporte un matelas de taille standard, un sommier, une commode ou un chevet (pour les autres produits, consultez la rubrique suivante)</strong><br><br><br>

                            Vous allez être contacté par notre transporteur dans les 10 jours ouvrés qui suivent votre commande. Vous aurez alors la possibilité de choisir le jour de livraison qui vous convient le mieux sous réserve des disponibilités et du calendrier du transporteur. <br><br>
                            Une fois la date validée ensemble, notre transporteur vous enverra un message la veille de la livraison vous indiquant le créneau horaire imposé de 2 heures durant lequel il sera à votre domicile, en fonction de sa tournée.<br><br>
                            La livraison est réalisée par 2 livreurs à l’étage et directement dans la pièce de votre choix.  Pour les livraisons au-delà du 4ème étage sans ascenseur, des frais supplémentaires peuvent vous être facturés : notre service client prendra contact avec vous le cas échéant.<br><br>
                            Les produits complémentaires seront livrés avec le reste de la commande.<br><br>
                            Rappel des tailles standard de matelas (cm) : 80x190, 80x200, 90x190, 90x200, 120x190, 120x200, 140x190, 140x200, 160x190, 160x200, 180x200.<br><br><br>
							  
							  <strong>Si votre commande comporte un matelas de taille hors standard, matelas sur-mesure, matelas bébé ou un sommier turinois</strong><br><br><br>

                            Le délai de fabrication de ces produits spécifiques peut prendre plus de temps (entre 2 et 4 semaines) à partir de la prise en compte de votre commande, à la suite desquels il est expédié sous 72h.<br><br>
                            Vous serez contacté par mail au moment de l’expédition. Le mail comportera un lien vous permettant de suivre le parcours de votre commande et vous donnant une estimation du jour de livraison.<br><br>
                            En cas d’absence du domicile le jour de la livraison, il est possible de la reprogrammer directement sur le site du transporteur.<br><br>

                            <strong>Si votre commande comporte seulement des oreillers, du linge de lit ou une couette</strong><br><br><br>

                            Le délai de fabrication ou de préparation de ces produits prend quelques jours à partir de la prise en compte de votre commande, à la suite desquels il est expédié sous 72h.<br><br>
                            Vous serez contacté par mail au moment de l’expédition. Le mail comportera un lien vous permettant de suivre le parcours de votre commande et vous donnant une estimation du jour de livraison.<br><br>
                            En cas d’absence du domicile le jour de la livraison, il est possible de la reprogrammer directement sur le site du transporteur.<br><br>
							Si vous avez commandé un matelas, afin de s'assurer que celui-ci reprenne sa forme totalement et le plus rapidement possible, il est nécessaire de le déballer dans le mois suivant sa réception. <br><br>
                            Pour toute question ou précision, notre service client est à votre écoute depuis nos bureaux parisiens.
                          </p>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
              <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                  <td align="center" style="line-height:36px;font-size:1px;">&nbsp;</td>
                </tr>
              </table>
              <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                <tr>
                  <td class="pr-12 pl-12" style="padding:0 34px 36px 34px;">
                    <p style="margin:36px 0;font:bold 25px Arial,sans-serif;color:#305157;text-align:center;">
                      Une question?
                    </p>
                    <div style="display:table;width:100%;">
                    <!--[if mso]><table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="256" style="background-color:#F0F6ED;padding:28px 35px;"><![endif]-->
                      <div class="column" style="display:table-cell;width:256px;background-color:#F0F6ED;vertical-align:top;">
                        <div class="pl-20 pr-20" style="padding:28px 35px;">
                          <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                              <td valign="top" width="36">
                                <img src="https://kipli.com/fr/wp-content/uploads/2020/06/phone-ico.jpg" width="36">
                              </td>
                              <td valign="top" style="padding:0 0 0 19px;font:bold 16px Arial,sans-serif;color:#305157;line-height:23px;">
                                Par<br>
                                téléphone
                              </td>
                            </tr>
                          </table>
                          <p style="margin:24px 0;font:bold 16px Arial,sans-serif;"><a href="tel:+33176421172" target="_blank" style="color:#305157;">+33 (0)1 76 42 11 72</a></p>
                          <p style="font:16px Arial,sans-serif;color:#305157;line-height:23px;">
                            du lundi au vendredi de 9:30 à 18:30
                          </p>
                        </div>
                      </div>
                      <!--[if mso]></td><td width="20" style="background-color:#FFFFFF;"><![endif]-->
                      <div class="column" style="display:table-cell;width:28px;background-color:#FFFFFF;font-size:1px;line-height:20px;vertical-align:top;">
                        &nbsp;
                      </div>
                      <!--[if mso]></td><td width="256" style="background-color:#F0F6ED;padding:28px 35px;"><![endif]-->
                      <div class="column" style="display:table-cell;width:256px;background-color:#F0F6ED;vertical-align:top;">
                        <div class="pl-20 pr-20" style="padding:28px 35px;">
                          <table cellspacing="0" cellpadding="0" border="0">
                            <tr>
                              <td valign="top" width="42">
                                <img src="https://kipli.com/fr/wp-content/uploads/2020/06/email-ico.jpg" width="42">
                              </td>
                              <td valign="top" style="padding:6px 0 0 19px;font:bold 16px Arial,sans-serif;color:#305157;line-height:23px;">
                                Par email
                              </td>
                            </tr>
                          </table>
                          <p style="margin:24px 0;font:bold 16px Arial,sans-serif;color:#305157;"><a href="mailto:hello@kipli.com" target="_blank" style="color:#305157;">hello@kipli.com</a></p>
                          <p style="font:16px Arial,sans-serif;color:#305157;line-height:23px;">
                            nous vous répondons le jour même
                          </p>
                        </div>
                      </div>
                    <!--[if mso]></td></tr></table><![endif]-->
                    </div>
                  </td>
                </tr>
              </table>
<?php
/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
