<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $cross_sells ) : ?>

<section class="WFwrap cart-silder-section">
  <div class="container">
    <div class="block-cart-footer">
      <h6>
        <?php esc_html_e( 'Complétez vos nuits', 'woocommerce' ); ?>
      </h6>
      <div class="row justify-content-start">
        <div class="col-lg-9 col-12">
          <ul class="cart-slider-panel row">
            <?php foreach ( $cross_sells as $cross_sell ) : ?>
            <?php
					$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited, Squiz.PHP.DisallowMultipleAssignments.Found
	
					global $product;
					
					// Ensure visibility.
					if ( empty( $product ) || ! $product->is_visible() ) {
						return;
					}

					
				?>
            <li class="col-md-6 col-12">
              <div class="cart-slider-info">
                <div class="cart-pro-info">
                  <div class="title text-left">
                    <h3>
                      <?php the_title()?>
                    </h3>
                    <!-- <p>Pour taie 50x70cm</p>--> 
                  </div>
                  <div class="pro-img">
                    <figure> <a href="<?php the_permalink()?>"><img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="cart-pro"></a> </figure>
                  </div>
                </div>
                <div class="cart-pro-btn"> 
					<?php echo apply_filters( 'woocommerce_loop_add_to_cart_link',
							sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s">Ajouter au panier -  %s</a>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->get_ID() ),
								esc_attr( $product->get_sku() ),
								implode( ' ', array_filter( array(
												'btn button ',
												'product_type_' . $product->get_type(),
												$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
												$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
										) ) ),
								$product->get_price_html()
							),
						$product ); 
						
						
					?>
                </div>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
endif;

wp_reset_postdata();

