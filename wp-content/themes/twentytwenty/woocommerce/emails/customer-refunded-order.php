<?php
/**
 * Customer refunded order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-refunded-order.php.
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

defined( 'ABSPATH' ) || exit;

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>
							<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                <tr>
                  <td class="pl-12 pr-12" style="padding:0 25px 38px 25px">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td>
                          <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F0F6ED">
                            <tr>
                              <td class="pl-20 pr-20" style="padding:42px 0;">
                                <!--[if mso]><table width="380" cellspacing="0" cellpadding="0" border="0" align="center"><![endif]--><!--[if !mso]><!-->
                                <table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;max-width:380px;"><!--<![endif]-->
                                  <tr>
                                    <td>
                                      <p style="font:16px Arial,sans-serif;color:#305157;text-align:center;"><?php printf( esc_html__( 'Bonjour %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
                                      <p style="margin:14px 0;font:bold 25px Arial,sans-serif;color:#305157;text-align:center;">
                                        Commande remboursée
                                      </p>
                                      <p style="font:16px Arial,sans-serif;color:#305157;line-height:23px;text-align:center;">
                                        Nous vous confirmons que votre commande a bien été remboursée. 
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
                                Détail de la commande remboursée
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
<?php
/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email ); ?>
													<table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tr>
                              <td align="center" style="padding:0 0 30px 0;font:bold 20px Arial,sans-serif;color:#305157;">Total</td>
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
                  <td class="pr-12 pl-12" style="padding:16px 34px 36px 34px;">
                    <p style="margin:18px 0;font:bold 25px Arial,sans-serif;color:#305157;text-align:center;">
                      Une question?
                    </p>
                    <!--[if mso]><table width="360" cellspacing="0" cellpadding="0" border="0" align="center"><![endif]--><!--[if !mso]><!-->
                    <table cellspacing="0" cellpadding="0" border="0" align="center" style="width:100%;max-width:360px;"><!--<![endif]--> 
                      <tr>
                        <td align="center" style="padding:0 0 42px 0;font:16px Helvetica,Arial,sans-serif;color:#305157;line-height:22px;">
                          Notre équipe est à votre écoute pour toute question ou renseignement concernant votre commande ou nos produits. 
                        </td>
                      </tr>
                    </table>
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
