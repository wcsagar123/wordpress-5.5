<?php
/**
 * Email Order Items
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-items.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$text_align  = is_rtl() ? 'right' : 'left';
$margin_side = is_rtl() ? 'left' : 'right';

foreach ( $items as $item_id => $item ) :
	$product       = $item->get_product();
	$sku           = '';
	$purchase_note = '';
	$image         = '';

	if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
		continue;
	}

	if ( is_object( $product ) ) {
		$sku           = $product->get_sku();
		$purchase_note = $product->get_purchase_note();
		$image         = $product->get_image( $image_size );
	}

	?>
                          <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FAF8F6">
                            <tr>
                              <td style="padding:36px 28px;">
                                <table cellspacing="0" cellpadding="0" border="0">
                                  <tr>
                                    <td valign="top" width="110">
                                      <img src="<?php echo ( $product->get_image_id() ? current( wp_get_attachment_image_src( $product->get_image_id(), 'thumbnail' ) ) : wc_placeholder_img_src() );?>" width="110">
                                    </td>
                                    <td width="23"></td>
                                    <td valign="top">
                                      <p style="font:bold 16px Arial,sans-serif;color:#305157;">
                                        <?php echo esc_html( $product->get_title()); ?>
                                      </p>
                                      <p style="margin:8px 0;font:14px Arial,sans-serif;color:#305157;line-height:22px;">
                                        <?php
                                          $size = $product->get_attribute( 'taille' );
                                          if ($size) {
                                            echo 'Taille : ' . $size . '<br>';
                                          }
                                        ?>
                                        <?php
                                          $color = $product->get_attribute( 'Couleur' );    
                                          if ($color) {
                                            echo 'Couleur : ' . $color . '<br>';
                                          }
                                        ?>
                                        <?php
                                          $lattes = $product->get_attribute( 'Lattes' );
                                          if ($lattes) {
                                            echo 'Lattes : ' . $lattes . '<br>';
                                          }
                                        ?>
                                        <?php
                                          $pieds = $product->get_attribute( 'Pieds' );
                                          if ($pieds) {
                                            echo 'Pieds : ' . $pieds . '<br>';
                                          }
                                        ?>
                                        <?php
                                          $tete = $product->get_attribute( 'Tête de lit' );
                                          if ($tete) {
                                            echo 'Tête de lit : ' . $tete . '<br>';
                                          }
                                        ?>
                                        <?php
                                          $tduo = $product->get_attribute( 'Tablettes duo' );
                                          if ($tduo) {
                                            echo 'Tablettes duo : ' . $tduo . '<br>';
                                          }
                                        ?>
                                        <?php
                                          $qty          = $item->get_quantity();
                                          $refunded_qty = $order->get_qty_refunded_for_item( $item_id );

                                          if ( $refunded_qty ) {
                                            $qty_display = '<span style="font-weight:bold;color:#FF9781;">Remboursés : ' . esc_html( $qty ) . '</span>';
                                          } else {
                                            $qty_display = esc_html( 'Qté : '.$qty );
                                          }
                                          echo wp_kses_post( apply_filters( 'woocommerce_email_order_item_quantity', $qty_display, $item ) );
                                        ?>
                                      </p>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <?php
                              $reprise = $item->get_meta( 'reprise_ancien', true );
                              $montager = $item->get_meta( 'montage', true );
                            ?>
                            <?php if ( $reprise ) : ?>
                            <tr>
                              <td style="border-top:3px solid #FFFFFF;padding:18px 28px">
                                <table cellspacing="0" cellpadding="0" border="0">
                                  <tr>
                                    <td width="18">
                                      <img src="https://kipli.com/fr/wp-content/uploads/2020/06/checked.jpg" width="18">
                                    </td>
                                    <td width="18"></td>
                                    <td style="font:bold 16px Arial,sans-serif;color:#305157;">
                                      Reprise de votre ancien
                                      <?php
                                      $ptyper = $product->get_title();
                                        if (strpos($ptyper,'matelas') !== false) 
                                         {
                                            echo 'matelas';
                                         }
                                        else if (strpos($ptyper,'Sommier') !== false)
                                         {
                                            echo 'sommier';
                                         }
                                        else if (strpos($ptyper,'Lit') !== false)
                                         {
                                            echo 'sommier';
                                         }
                                      ?>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <?php else : ?>
                            <?php endif; ?>
                            <?php if ($montager) : ?>
                            <tr>
                              <td style="border-top:3px solid #FFFFFF;padding:18px 28px">
                                <table cellspacing="0" cellpadding="0" border="0">
                                  <tr>
                                    <td width="18">
                                      <img src="https://kipli.com/fr/wp-content/uploads/2020/06/checked.jpg" width="18">
                                    </td>
                                    <td width="18"></td>
                                    <td style="font:bold 16px Arial,sans-serif;color:#305157;">
                                      Montage de votre
                                      <?php
                                      $ptypem = $product->get_title();
                                        if (strpos($ptypem,'Sommier') !== false)
                                         {
                                            echo 'sommier';
                                         }
                                        else if (strpos($ptypem,'Lit') !== false)
                                         {
                                            echo 'sommier';
                                         }
                                        else if (strpos($ptypem,'Commode') !== false)
                                         {
                                            echo 'commode';
                                         }
                                      ?>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <?php else : ?>
                            <?php endif; ?>
                            <tr>
                              <td style="background-color:#FFFFFF;line-height:30px;font-size:1px;">&nbsp;</td>
                            </tr>
                          </table>
	<?php

	if ( $show_purchase_note && $purchase_note ) {
		?>
                        	<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FAF8F6">
                        		<tr>
                        			<td colspan="3" style="text-align:<?php echo esc_attr( $text_align ); ?>; vertical-align:middle; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;">
                        				<?php
                        				echo wp_kses_post( wpautop( do_shortcode( $purchase_note ) ) );
                        				?>
                        			</td>
                        		</tr>
                        	</table>
		<?php
	}
	?>

<?php endforeach; ?>
