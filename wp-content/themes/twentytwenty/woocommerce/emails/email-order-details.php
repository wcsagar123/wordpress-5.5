<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
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

defined( 'ABSPATH' ) || exit;?>
                          <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#F0F6ED">
                            <tr>
                              <td class="pl-20 pr-20" style="padding:34px 30px;border-bottom:1px solid #D8DED6;">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                  <?php if ( $order->get_discount_total() >= "1" ) : ?>
                                  <tr>
                                    <td style="padding:8px 0;font:16px Arial,sans-serif;color:#305157;">
                                      Remise
                                    </td>
                                    <td width="96" style="padding:8px 0;font:16px Arial,sans-serif;color:#50AA9B;text-align:right;">
                                      -<?php echo wc_price( round($order->get_discount_total()+$order->get_discount_tax()), array( 'decimal_separator' => ',' ) ); ?>
                                    </td>
                                  </tr>
                                  <?php else : ?>
                                  <?php endif; ?>
                                  <tr>
                                    <td style="padding:8px 0;font:16px Arial,sans-serif;color:#305157;">
                                      Expédition
                                    </td>
                                    <td width="96" style="padding:8px 0;font:16px Arial,sans-serif;text-align:right;color:#50AA9B;">
                                      <?php if ( $order->get_shipping_total() == "0" ) : ?>
                                        Gratuit !
                                      <?php else : ?>
                                      <?php echo wc_price( $order->get_shipping_total(), array( 'decimal_separator' => ',' ) ); ?>
                                      <?php endif; ?>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="padding:8px 0;font:16px Arial,sans-serif;color:#305157;">
                                      TVA
                                    </td>
                                    <td width="96" style="padding:8px 0;font:16px Arial,sans-serif;color:#305157;text-align:right;">
                                      <?php echo wc_price( $order->get_total_tax(), array( 'decimal_separator' => ',' ) ); ?>
                                    </td>
                                  </tr>
                                  <?php if ( $order->get_total_refunded() >= "1" ) : ?>
                                  <tr>
                                    <td style="padding:8px 0;font:16px Arial,sans-serif;color:#305157;">
                                      <strong>Total remboursé
                                    </td>
                                    <td width="96" style="padding:8px 0;font:16px Arial,sans-serif;color:#50AA9B;text-align:right;">
                                      <?php echo wc_price( $order->get_total_refunded(), array( 'decimal_separator' => ',' ) ); ?>
                                    </td>
                                  </tr>
                                  <?php endif; ?>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td class="pl-20 pr-20" style="padding:18px 30px;">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                  <tr>
                                    <td style="padding:8px 0;font:bold 16px Arial,sans-serif;color:#305157;">
                                      TOTAL (TTC)
                                    </td>
                                    <td width="96" style="padding:8px 0;font:bold 16px Arial,sans-serif;color:#305157;text-align:right;">
                                        <?php 
                                         $totalone = $order->get_total();
                                         $totaltwo = $order->get_total_refunded();
                                         $newtotal = $totalone - $totaltwo;
                                        ?>
                                        <?php if ( $order->get_total_refunded() >= "1" ) : ?>
                                          <?php
                                            if ($newtotal == '0') {
                                              echo 0 . '&euro;';
                                            }
                                            else{
                                              echo wc_price( $newtotal, array( 'decimal_separator' => ',' ) );
                                            }
                                          ?>
                                        <?php else : ?>
                                          <?php echo wc_price( $order->get_total(), array( 'decimal_separator' => ',' ) ); ?>
                                        <?php endif; ?>
                                    </td>
                                  </tr>
                                  <?php if ( $newtotal >= "1" ) : ?>
                                  <tr>
                                    <td style="padding:8px 0;font:14px Arial,sans-serif;color:#8DA3A3;">
                                      Éco-participation
                                    </td>
                                    <td width="96" style="padding:8px 0;font:14px Arial,sans-serif;color:#8DA3A3;text-align:right;">
                                      <?php echo (ceil($order->get_subtotal() * 0.01)) ;?>&euro;
                                    </td>
                                  </tr>
                                  <?php else : ?>
                                  <?php endif; ?>
                                </table>
                              </td>
                            </tr>
                          </table>