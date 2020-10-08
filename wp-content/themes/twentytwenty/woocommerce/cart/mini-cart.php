<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;


?>
<div id="minicart">
<div class="cart-side-panel">
  <div class="block-cart-header">
    <div class="cart-container">
      <h3>Votre panier (<?php echo  WC()->cart->get_cart_contents_count(); ;?> articles)<a   class="cart-close" onclick=" cart_close()"></a></h3>
    </div>
  </div>
  <?php if ( ! WC()->cart->is_empty() ) : ?>
  <div class="cart-middle-items woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
    <?php    	
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
    <div class="items_row CartItem woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
      <div class="cart-left">
        <?php if ( empty( $product_permalink ) ) : ?>
        <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <?php else : ?>
        <a class="cart-image" href="<?php echo esc_url( $product_permalink ); ?>"> <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> </a>
        <?php endif; ?>
      </div>
      <div class="cart-right">
        <div class="cart-title">
          <?php if ( empty( $product_permalink ) ) : ?>
          <?php echo $product_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
          <?php else : ?>
          <a class="cart-image" href="<?php echo esc_url( $product_permalink ); ?>"> <?php echo $product_name; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> </a>
          <?php endif; ?>
          <div class="cart-price">
            <div class="money"> <?php
			
			//
			
			 ?> 
             <?php
			  if((isset( $cart_item['woosb_ids'] ) && ! empty( $cart_item['woosb_ids'] )) && (isset( $cart_item["reprise_ancien"] )  &&  $cart_item["reprise_ancien"]  !="") || ( isset( $cart_item["montage"] )  &&  $cart_item["montage"]  !="")){
				  echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
			  }else{
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
			  }?>
             </div>
          </div>
        </div>
        <div class="cart-size"> <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( 'Quantité : %s', $cart_item['quantity']) . '</span>', $cart_item, $cart_item_key );?> <span class="size"> <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span> </div>
        <?php
                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        'woocommerce_cart_item_remove_link',
                        sprintf(
                            '<a href="%s" class="remove remove_from_cart_button icon-close" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"></a>',
                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            esc_attr__( 'Remove this item', 'woocommerce' ),
                            esc_attr( $product_id ),
                            esc_attr( $cart_item_key ),
                            esc_attr( $_product->get_sku() )
                        ),
                        $cart_item_key
                    );
                    ?>
      </div>
    </div>
    <?php 
	  if(isset( $cart_item['woosb_ids'] ) && ! empty( $cart_item['woosb_ids'] )){$ex_qty =  count(explode(',',$cart_item['woosb_ids'])); }else{$ex_qty = 1;}
	if( isset( $cart_item["reprise_ancien"] )  &&  $cart_item["reprise_ancien"]  !="") {?>
    <div class="items_row CartItem back-mattress">
      <div class="cart-left"> <a class="cart-image" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Repise-de-votre.svg" alt="cart-drawer-icon" title=""></a> </div>
      <div class="cart-middle text-left">
            <?php if($product_id == 753 || $product_id == 1884 || $product_id == 1004 || $product_id == 1626  ){
              ?>
            <label class="checkbox m-0  text-left">Reprise de votre<br>ancien sommier </label>
              <?php
            }else{
             ?>
            <label class="checkbox m-0  text-left">Reprise de votre<br>ancien matelas </label>
            <?php
            }
            ?>
        </div>
      <div class="cart-right">
        <div class="cart-title">
          <div class="cart-price"> <span class="money"><?php echo (($cart_item["reprise_ancien"] * $ex_qty ) * $cart_item['quantity']).' '.get_woocommerce_currency_symbol()?></span> </div>
        </div>
      </div>
    </div>
	<?php }?>
    
     <?php if( isset( $cart_item["montage"] )  &&  $cart_item["montage"]  !="") {?>
    <div class="items_row CartItem back-mattress">
      <div class="cart-left"> <a class="cart-image" href="#"><img src="<?php echo get_template_directory_uri();?>/img/100-nuits.svg" alt="cart-drawer-icon" title=""></a> </div>
      <div class="cart-middle text-left">
        <label class="checkbox m-0 text-left ">Montage de votre<br> sommier</label>
        </div>
      <div class="cart-right">
        <div class="cart-title">
          <div class="cart-price"> <span class="money"><?php echo (($cart_item["montage"]* $ex_qty ) * $cart_item['quantity']).' '.get_woocommerce_currency_symbol()?></span> </div>
        </div>
      </div>
    </div>
	<?php }?>
  
    
    <?php
			} 
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
    <div class="pro-total">
      <div class="count"> <span>Sous-total</span><span class="cart-count-right"><?php echo WC()->cart->get_cart_subtotal(); ?></span> </div>
      <div class="count"> <span>Livraison</span><span class="cart-count-right ship-info">
	  
	  <?php echo str_replace( "Free!", "Offerte - 0 €",  WC()->cart->get_cart_shipping_total() );;?></span> </div>
      <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div  class="count cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>" > <span><?php wc_cart_totals_coupon_label( $coupon ); ?></span><span class="cart-count-right ship-info"><?php wc_cart_totals_coupon_html( $coupon );  ?></span> </div>
		<?php endforeach; ?>
      
      
      <div class="subtotal"> <span>
        <?php esc_html_e( 'Total', 'woocommerce' ); ?>
        <?php		$value = '';
                    // If prices are tax inclusive, show taxes here.
                    if ( wc_tax_enabled() && WC()->cart->display_prices_including_tax() ) {
                        $tax_string_array = array();
                        $cart_tax_totals  = WC()->cart->get_tax_totals();
                        
                        if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) {
                            foreach ( $cart_tax_totals as $code => $tax ) {
                                $tax_string_array[] = sprintf( '%s %s', $tax->formatted_amount, $tax->label );
                            }
                        } elseif ( ! empty( $cart_tax_totals ) ) {
                            $tax_string_array[] = sprintf( '%s', wc_price( WC()->cart->get_taxes_total( true, true ) ));
                        }
                
                        if ( ! empty( $tax_string_array ) ) {
                            
                            $taxable_address = WC()->customer->get_taxable_address();
                            /* translators: %s: country name */
                            $estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ? sprintf( ' ' . __( 'estimated for %s', 'woocommerce' ), WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] ) : '';
                            /* translators: %s: tax information */
                            $value .= '<small class="includes_tax">' . sprintf( 'TVA incluse (%s) <br />Eco-participation incluse (%s)', implode( ', ', $tax_string_array ),get_eco_price_cart()  ) . '</small>';
                        }         
                    }
                    echo $value;
                    ?>
        </span> <span class="cart-total-right money">
        <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
        <?php wc_cart_totals_order_total_html(); ?>
        <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
        </span> </div>
    </div>
            <?php 
		$limit = 2;
		$columns = 2;
		$orderby = 'rand';
		$order = 'desc' ;
		$cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );
		
		$orderby     = apply_filters( 'woocommerce_cross_sells_orderby', $orderby );
		$order       = apply_filters( 'woocommerce_cross_sells_order', $order );
		$cross_sells = wc_products_array_orderby( $cross_sells, $orderby, $order );
		$limit       = apply_filters( 'woocommerce_cross_sells_total', $limit );
		$cross_sells = $limit > 0 ? array_slice( $cross_sells, 0, $limit ) : $cross_sells;
		if ( $cross_sells ) : ?>
		<div class="block-cart-footer woocommerce">
			<h3>Complétez vos nuits</h3>
			<ul class="cart-slider cart-slider-panel">
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
				  <li>
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
									esc_attr( $product->get_id() ),
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
			  <?php endforeach; 
			  wp_reset_postdata();?>
			</ul>
		  </div>
		<?php
		endif;?>
  </div>
  
  <div class="cart-container minicart-footer">
    
    <div class="cart-btn">
      <div class="row Wrap8">
        <div class="col-12 ST_Grid">
          <div class="wc-proceed-to-checkout"><a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-primary col-12 checkout-button wc-forward"><span>Commander -  <?php echo   WC()->cart->get_total() ?></span></a></div>
        </div>
      </div>
    </div>
    <div class="cart-payment">
    	<?php if(get_field('footer_1_payment_icon_list','option')): ?>
              <ul class="payment-icon">
                <?php 
					$i = 1;
					while(has_sub_field('footer_1_payment_icon_list','option')):  $link = get_sub_field('link'); 
					if($link){
					 ?>
                <li><a href="<?php echo $link['url'] ?>"> <img src="<?php the_sub_field('icon'); ?>"/> </a></li>
                <?php
					}
				$i++;
				endwhile; ?>
              </ul>
              <?php endif; ?>
      
    </div>
  </div>
  
  
  <?php else : ?>
  <div class="cart-middle-items woocommerce-mini-cart cart_list product_list_widget empty-cart ">
  <div class="cart-text">
      <div class="product-panel"> <img src="https://kipli.tech/wp-content/uploads/2020/04/Feuille_vectorise%CC%81e_couleur-KIPLI.svg">
            <h6><?php esc_html_e( 'Le panier est vide', 'woocommerce' ); ?></h6>
          
     </div>
      </div>
   
  </div>
  </div>
  <?php endif; ?>
</div>

</div>