<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
//$get_available_variations = get_available_variations();
do_action( 'woocommerce_before_add_to_cart_form' ); ?>

						
<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	
	<?php do_action( 'woocommerce_before_variations_form' ); ?>
	<div class="driver-info mb-0">
	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<div class="row">
        	 <?php if(count($attributes) > 1){?>
             	<div class="col-12 variations">
                	<div class="row">
				<?php foreach ( $attributes as $attribute_name => $options ) : 
				?>
                		<?php if($product->get_ID() == 753) {?>
							<?php if(  $attribute_name == 'taille' ){
                                $class = '  col-6  taille';
                                $label_prefix = 'Choisissez votre ';
                            }elseif($attribute_name == 'Lattes'){
                                $class = ' col-6 ';
                                $label_prefix = 'Type de ';
                                
                            }elseif($attribute_name == 'Taille'){
                                $class = ' col-6 ';
                                $label_prefix = 'Choisissez votre ';
                                
                            }elseif($attribute_name == 'Tête de lit' || $attribute_name == 'Taille tête de lit'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }elseif(esc_attr( sanitize_title( $attribute_name ) ) == 'taille-tete-de-lit'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }elseif($attribute_name == 'Pieds'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }elseif($attribute_name == 'Tablettes duo'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }else{
                                $class = ' col-12 ';
                                $label_prefix = '';
                            }?>
                            <div class="<?php echo $class ;?>">
                            <small for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo ucfirst(strtolower($label_prefix.wc_attribute_label( $attribute_name )));  // WPCS: XSS ok. ?></small>
                                <?php
                                    wc_dropdown_variation_attribute_options(
                                        array(
                                            'options'   => $options,
                                            'attribute' => $attribute_name,
                                            'product'   => $product,
                                            'class' => 'size',  
											'show_option_none' => __( 'Choisissez ', 'woocommerce' ),  
                                        )
                                    );								
                                ?>
                            
                            </div>
                    	<?php }elseif($product->get_ID() == 1626) {?>
                        	<?php if(  $attribute_name == 'taille' ){
                                $class = '  col-6  taille';
                                $label_prefix = 'Choisissez votre ';
                            }elseif($attribute_name == 'Lattes'){
                                $class = ' col-4 ';
                                $label_prefix = 'Type de ';
                            }elseif($attribute_name == 'Tête de lit' || $attribute_name == 'Taille tête de lit'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }elseif($attribute_name == 'pa_couleur'){
                                $class = ' col-6 ';
                                $label_prefix = '';
                            }elseif($attribute_name == 'Table de nuit'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }else{
                                $class = ' col-12 ';
                                $label_prefix = '';
                            }?>
                            <div class="<?php echo $class ;?>">
                            
                            <small for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo  ucfirst(strtolower($label_prefix.wc_attribute_label( $attribute_name )))  // WPCS: XSS ok. ?></small>
                                <?php
                                    wc_dropdown_variation_attribute_options(
                                        array(
                                            'options'   => $options,
                                            'attribute' => $attribute_name,
                                            'product'   => $product,
                                            'class' => 'size',  
											'show_option_none' => __( 'Choisissez ', 'woocommerce' ),  
                                        )
                                    );	
									
									if($attribute_name == 'pa_couleur'){
										echo ' <div class="filter-inner variation-product"><span class="color-tag"></span></div>';
									}							
                                ?>
                               
                            
                            </div>
                        <?php }elseif($product->get_ID() == 1884) {?>
                        	<?php if(  $attribute_name == 'taille' ){
                                $class = '  col-8  taille';
                                $label_prefix = 'Choisissez votre ';
                            }elseif($attribute_name == 'Tête de lit' || $attribute_name == 'Taille tête de lit'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }elseif($attribute_name == 'Table de Chevet'){
                                $class = ' col-4 ';
                                $label_prefix = '';
                            }else{
                                $class = ' col-12 ';
                                $label_prefix = '';
                            }?>
                            <div class="<?php echo $class ;?>">
                            <small for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo  ucfirst(strtolower($label_prefix.wc_attribute_label( $attribute_name ))) // WPCS: XSS ok. ?></small>
                                <?php
                                    wc_dropdown_variation_attribute_options(
                                        array(
                                            'options'   => $options,
                                            'attribute' => $attribute_name,
                                            'product'   => $product,
                                            'class' => 'size',  
											'show_option_none' => __( 'Choisissez ', 'woocommerce' ),  
                                        )
                                    );
									if($attribute_name == 'pa_couleur'){
										echo ' <div class="filter-inner variation-product"><span class="color-tag"></span></div>';
									}									
                                ?>
                            
                            </div>
                             <?php  //if(  $attribute_name == 'taille' ){ echo '</div><div class="row">';}?>
					<?php }elseif($product->get_ID() == 1997 || $product->get_ID() == 1338 || $product->get_ID() == 80003) {?>
                        <?php
                            $class = '  col-6 ';
                            $label_prefix = '';
							if(  $attribute_name == 'taille' ){
                                $class = '  col-6  taille';
                              
                            }
                       ?>
                        <div class="<?php echo $class ;?>">
                        <small for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo  ucfirst(strtolower($label_prefix.wc_attribute_label( $attribute_name ))); // WPCS: XSS ok. ?></small>
                            <?php
                                if(  $attribute_name == 'taille' ){
										$attr = array(
											'options'   => $options,
											'attribute' => $attribute_name,
											'product'   => $product,
											'class' => 'size',  
										) ;
										if(isset($_REQUEST['attribute_'.$attribute_name])){
											$attr['selected'] = $_REQUEST['attribute_'.$attribute_name];
										}
										kipli_wc_dropdown_variation_attribute_options( $attr);
									}
									else{
										
										wc_dropdown_variation_attribute_options(
											array(
												'options'   => $options,
												'attribute' => $attribute_name,
												'product'   => $product,
												'class' => 'size',
												'show_option_none' => __( 'Choisissez ', 'woocommerce' ),    
											)
										);
										if($attribute_name == 'pa_couleur'){
											echo ' <div class="filter-inner variation-product"><span class="color-tag"></span></div>';
										}	
									}							
                            ?>
                        
                        </div>
                      
                        <?php }else{
							?>
                        	<?php 
                                $class = ' col-12 ';
                                $label_prefix = '';
								 if(  $attribute_name == 'taille' ){$class = ' col-12 taille taille-attr ';}
                            ?>
                            <div class="<?php echo $class ;?>">
                            <small for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo  ucfirst(strtolower($label_prefix.wc_attribute_label( $attribute_name ))); // WPCS: XSS ok. ?></small>
                                <?php
                                    if(  $attribute_name == 'taille' ){
										$attr = array(
											'options'   => $options,
											'attribute' => $attribute_name,
											'product'   => $product,
											'class' => 'size',  
										) ;
										if(isset($_REQUEST['attribute_'.$attribute_name])){
											$attr['selected'] = $_REQUEST['attribute_'.$attribute_name];
										}
										kipli_wc_dropdown_variation_attribute_options( $attr);
									}
									else{
										
										wc_dropdown_variation_attribute_options(
											array(
												'options'   => $options,
												'attribute' => $attribute_name,
												'product'   => $product,
												'class' => 'size',
												'show_option_none' => __( 'Choisissez ', 'woocommerce' ),    
											)
										);
										if($attribute_name == 'pa_couleur'){
											echo ' <div class="filter-inner variation-product"><span class="color-tag"></span></div>';
										}	
									}							
                                ?>
                            
                            </div>
						
						<?php }?>
                   		
                  
				<?php endforeach; ?>
                	</div> 
                </div>
		
             <?php }else{?>
            <div class="col-sm-9 col-6 variations" >
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					
						<small for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo ucfirst(strtolower('Choisissez votre '.wc_attribute_label( $attribute_name ))); // WPCS: XSS ok. ?></small>
						
							<?php
								if(  $attribute_name == 'taille' ){
										$attr = array(
											'options'   => $options,
											'attribute' => $attribute_name,
											'product'   => $product,
											'class' => 'size',  
											''
										);
										if(isset($_REQUEST['attribute_'.$attribute_name])){
											$attr['selected'] = $_REQUEST['attribute_'.$attribute_name];
										}
										
										kipli_wc_dropdown_variation_attribute_options($attr);
									}
									else{
										
										wc_dropdown_variation_attribute_options(
											array(
												'options'   => $options,
												'attribute' => $attribute_name,
												'product'   => $product,
												'class' => 'size',  
												'show_option_none' => __( 'Choisissez ', 'woocommerce' ),  
											)
										);
										if($attribute_name == 'pa_couleur'){
											echo ' <div class="filter-inner variation-product"><span class="color-tag"></span></div>';
										}	
									}
								//echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
							?>
						
					
				<?php endforeach; ?>
                </div>
                <div class="col-sm-3 col-6">
                    <?php
                        do_action( 'woocommerce_before_add_to_cart_quantity' );
                    
                        woocommerce_quantity_input(
                            array(
                                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                                'max_value'   => 9, //apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok. 
                            )
                        );
                    
                        do_action( 'woocommerce_after_add_to_cart_quantity' );
                    ?>
                    </div>
            <?php }?>
            </div>  
    </div>
    <div class="single_variation_wrap">
			<?php
				/**   
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
    
</form>
	
  
<?php
do_action( 'woocommerce_after_add_to_cart_form' );
