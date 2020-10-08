<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
$page_id = get_the_ID();
 
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<?php 
$term = get_queried_object();

$children = ''; 
if($term->term_id){
$children = get_terms( $term->taxonomy, array(
'parent'    => $term->term_id,
'hide_empty' => false
) );
}
if(is_shop()){
	
		
		$args = array(
		   'hierarchical' => 1,
		   'show_option_none' => '',
		   'hide_empty' => 1 ,
		   'exclude' => array(15,45,46,36),
		   'taxonomy' => 'product_cat'
		   
		);
		$subcats = get_categories($args);
		?>
        <section class="WFwrap category-section multiple-categories shop-page ">
			
            	 <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <h2 class="woocommerce-products-header__title page-title text-center"><?php woocommerce_page_title(); ?></h2>
                <?php endif; ?>  
                
                <?php 
				if($subcats){
				  foreach ($subcats as $sc) {
					   if($sc->category_parent == 1 || $sc->cat_ID == 1){
     						continue;
					   }
                    $link = get_term_link( $sc->slug, $sc->taxonomy );
					?>   
                    <section class="WFwrap children-cat"> 
                    	<div class="container">	                
                    <h3 class="text-left text-left pl-3 pr-3"><?php echo $sc->name; ?></h3>
                     <?php 
					 	
					       $args = array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => $sc->slug , 'orderby' => 'menu_order',);
        					$loop = new WP_Query( $args );
							if( $loop->have_posts()):
							echo '	<ul class="category-slide    Wrap12 products columns-4">';
								while ( $loop->have_posts() ) : $loop->the_post();global $product; 
								?>
                                    <li <?php wc_product_class( ' ST_Grid ', $product ); ?>>
                                   
                                    <div class="cate-item text-center">
                                        <?php 
                                        /**
                                         * Hook: woocommerce_before_shop_loop_item.
                                         *
                                         * @hooked woocommerce_template_loop_product_link_open - 10
                                         */
                                        do_action( 'woocommerce_before_shop_loop_item' );
                                        
                                        echo '<div class="cate-img">';
                                            /**
                                             * Hook: woocommerce_before_shop_loop_item_title.
                                             *
                                             * @hooked woocommerce_show_product_loop_sale_flash - 10
                                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                                             */
                                            
                                            do_action( 'woocommerce_before_shop_loop_item_title' );
                                            echo '</div>';
                                        ?>
                                       
                                        <div class="cate-desc">
                                            <h3 class="cate-title"><?php the_title(); ?></h3>
                                            <?php 
                                                
                                                /**
                                                 * Hook: woocommerce_after_shop_loop_item.
                                                 *
                                                 * @hooked woocommerce_template_loop_product_link_close - 5
                                                 * @hooked woocommerce_template_loop_add_to_cart - 10
                                                 */
                                                do_action( 'woocommerce_after_shop_loop_item' );
                                                ?>
                                               
                                        </div>
                                        
                                    </div>
                                    
                                     </li>
 
                   				<?php
                   				endwhile;
							echo '</ul>';
							endif;
						?>
                        </div>
                     </section>
                     <?php 
                  }
				}
				?>
            <div class="cate-content text-center shop-content">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10 col-12">
							<div class="desc">
								  <?php
									the_field('product_description','option');
									
									?>
							</div>
						</div>
					</div>
				</div>
			</div>     
            
        </section>
        <?php /*if(get_field('services',$page_id)): ?>
	<section class="WFwrap service-section">
		<div class="container-lg">
			<div class="row justify-content-center">
				<div class="col-lg-11 col-12">
					<div class="service-block text-center">
						<ul class="row justify-content-center">
							<?php while(has_sub_field('services',$page_id)): ?>
	
							   
								<li class="col-md-3 col-sm-3 col-12">
									<div class="service-img">
										<figure><img src="<?php the_sub_field('image'); ?>" alt="service_img"></figure>
									</div>
									<div class="service-desc px-0">
										<h6><?php the_sub_field('title'); ?></h6>
										<p><?php the_sub_field('content'); ?></p>
									</div>
								</li>
							<?php endwhile; ?>
							
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif;*/ ?>
<?php 	
}			
elseif($children) {
		$page_id = get_queried_object_id();

		$args = array(
		   'hierarchical' => 1,
		   'show_option_none' => '',
		   'hide_empty' => 0,
		   'parent' =>$page_id,
		   'taxonomy' => 'product_cat'
		);
		$subcats = get_categories($args);
		?>
        <section class="WFwrap category-section multiple-categories ">
			
            	 <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <h2 class="woocommerce-products-header__title page-title text-center"><?php woocommerce_page_title(); ?></h2>
                <?php endif; ?>  
                
                <?php 
				if($subcats){
				  foreach ($subcats as $sc) {
                    $link = get_term_link( $sc->slug, $sc->taxonomy );
					?>   
                    <section class="WFwrap children-cat"> 
                    	<div class="container">	                
                    <h3 class="text-left text-left pl-3 pr-3"><?php echo $sc->name; ?></h3>
                     <?php 
					 	
					       $args = array( 'post_type' => 'product', 'posts_per_page' => -1, 'product_cat' => $sc->slug );
        					$loop = new WP_Query( $args );
							if( $loop->have_posts()):
							echo '	<ul class="category-slide    Wrap12 products columns-4">';
								while ( $loop->have_posts() ) : $loop->the_post();global $product; 
								?>
                                    <li <?php wc_product_class( ' ST_Grid ', $product ); ?>>
                                   
                                    <div class="cate-item text-center">
                                        <?php 
                                        /**
                                         * Hook: woocommerce_before_shop_loop_item.
                                         *
                                         * @hooked woocommerce_template_loop_product_link_open - 10
                                         */
                                        do_action( 'woocommerce_before_shop_loop_item' );
                                        
                                        echo '<div class="cate-img"><a href="'.get_permalink().'">';
                                            /**
                                             * Hook: woocommerce_before_shop_loop_item_title.
                                             *
                                             * @hooked woocommerce_show_product_loop_sale_flash - 10
                                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                                             */
                                            
                                            do_action( 'woocommerce_before_shop_loop_item_title' );
                                            echo '</a></div>';
                                        ?>
                                       
                                        <div class="cate-desc">
                                            <h3 class="cate-title"><?php the_title(); ?></h3>
                                            <?php 
                                                
                                                /**
                                                 * Hook: woocommerce_after_shop_loop_item.
                                                 *
                                                 * @hooked woocommerce_template_loop_product_link_close - 5
                                                 * @hooked woocommerce_template_loop_add_to_cart - 10
                                                 */
                                                do_action( 'woocommerce_after_shop_loop_item' );
                                                ?>
                                               
                                        </div>
                                       
                                            <div class="hover-effect">
                                                <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                                                <div class="hover-btn">
                                                    <a href="<?php the_permalink()?>" class="btn">Voir</a>
                                                </div>
                                            </div>
                                           
                                    </div>
                                    
                                     </li>
 
                   				<?php
                   				endwhile;
							echo '</ul>';
							endif;
						?>
                        </div>
                     </section>
                     <?php 
                  }
				}
				?>
            <div class="cate-content text-center">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10 col-12">
							<div class="desc">
								  <?php
									/**
									 * Hook: woocommerce_archive_description. 
									 *
									 * @hooked woocommerce_taxonomy_archive_description - 10
									 * @hooked woocommerce_product_archive_description - 10
									 */
									do_action( 'woocommerce_archive_description' );
									?>
							</div>
						</div>
					</div>
				</div>
			</div>     
            
        </section>
        <?php if(get_field('services',$term)): ?>
	<section class="WFwrap service-section">
		<div class="container-lg">
			<div class="row justify-content-center">
				<div class="col-lg-11 col-12">
					<div class="service-block text-center">
						<ul class="row justify-content-center">
							<?php while(has_sub_field('services',$term)): ?>
	
							   
								<li class="col-md-3 col-sm-3 col-12">
									<div class="service-img">
										<figure><img src="<?php the_sub_field('image'); ?>" alt="service_img"></figure>
									</div>
									<div class="service-desc px-0">
										<h6><?php the_sub_field('title'); ?></h6>
										<p><?php the_sub_field('content'); ?></p>
									</div>
								</li>
							<?php endwhile; ?>
							
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php 
	$products = get_field('related_products',$term);

	if( $products ): ?>
<section class="WFwrap product-wrap">
	<div class="container">
		<h2 class="text-left">Pour une chambre 100% naturelle</h2>
		<div class="shop-content">
			
				<ul class="product-slider Wrap12">
				<?php foreach( $products as $product): 
					$product_object = get_post( $product );
	
						setup_postdata( $GLOBALS['post'] =& $product_object ); 
	
						wc_get_template_part( 'content', 'product' );
	
					endforeach; 
				?>
				</ul>
			
		</div>
	</div>
</section>
<?php endif;
wp_reset_postdata();
?>
        <?php 
		
		
}else{
?>
<section class="WFwrap category-section">
			<div class="container">				
                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <h2 class="woocommerce-products-header__title page-title text-center"><?php woocommerce_page_title(); ?></h2>
                <?php endif; ?>  
              
              	
                <?php
					if ( woocommerce_product_loop() ) {
					
						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
						do_action( 'woocommerce_before_shop_loop' );
					
						woocommerce_product_loop_start();
					
						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {				the_post();
							
								/**
								 * Hook: woocommerce_shop_loop.
								 */
								//do_action( 'woocommerce_shop_loop' );
								
								?>
                               <li <?php wc_product_class( ' ST_Grid ' ); ?>>
                               
                                <div class="cate-item text-center">
                                	<?php 
									/**
									 * Hook: woocommerce_before_shop_loop_item.
									 *
									 * @hooked woocommerce_template_loop_product_link_open - 10
									 */
									do_action( 'woocommerce_before_shop_loop_item' );
									
									 echo '<div class="cate-img"><a href="'.get_permalink().'">';
                                            /**
                                             * Hook: woocommerce_before_shop_loop_item_title.
                                             *
                                             * @hooked woocommerce_show_product_loop_sale_flash - 10
                                             * @hooked woocommerce_template_loop_product_thumbnail - 10
                                             */
                                            
                                            do_action( 'woocommerce_before_shop_loop_item_title' );
                                            echo '</a></div>';
									?>
                                   
                                    <div class="cate-desc">
                                        <h3 class="cate-title"><?php the_title(); ?></h3>
                                        <?php 
											
											/**
											 * Hook: woocommerce_after_shop_loop_item.
											 *
											 * @hooked woocommerce_template_loop_product_link_close - 5
											 * @hooked woocommerce_template_loop_add_to_cart - 10
											 */
											do_action( 'woocommerce_after_shop_loop_item' );
											?>
                                           
                                    </div>
                                    
                                        <div class="hover-effect">
                                            <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                                            <div class="hover-btn">
                                                <a href="<?php the_permalink()?>" class="btn">Voir</a>
                                            </div>
                                        </div>
                                       
                                </div>
                                
                           		 </li>
                                <?php 
					
								//wc_get_template_part( 'content', 'product' );
							}
						}
						 if(is_product_category()){ $term = get_queried_object();
						     $green = get_field('green_box',$term);
		                    if($green['enable']): 
						?>
						 <li  class="ST_Grid">
						 <div class="mattress_category">
                            <div class="hover-effect"> <span><?php echo $green['sub_title'];?></span>
                              <h3><?php echo $green['title'];?></h3>                             
                              <!--	<div class="hover-btn"> <a href="" class="btn" id="mattress_category_box">Demander un devis</a> </div>                         -->  
                              <div class="hover-btn"> <a href="<?php echo $green['link']['url'];?>" class="btn" id="">Demander un devis</a> </div>  
                            </div>
                          </div>
                          </li>
						<?php
						endif;
						 }
						woocommerce_product_loop_end();
					
						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					} else {
						/**
						 * Hook: woocommerce_no_products_found.
						 *
						 * @hooked wc_no_products_found - 10
						 */
						do_action( 'woocommerce_no_products_found' );
					}
					
					
					?>
			
			</div>
			<div class="cate-content text-center">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-10 col-12">
							<div class="desc">
								  <?php
									/**
									 * Hook: woocommerce_archive_description. 
									 *
									 * @hooked woocommerce_taxonomy_archive_description - 10
									 * @hooked woocommerce_product_archive_description - 10
									 */
									do_action( 'woocommerce_archive_description' );
									?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php 

if(get_field('services',$term)): ?>
	<section class="WFwrap service-section">
		<div class="container-lg">
			<div class="row justify-content-center">
				<div class="col-lg-11 col-12">
					<div class="service-block text-center">
						<ul class="row justify-content-center">
							<?php while(has_sub_field('services',$term)): ?>
	
							   
								<li class="col-md-3 col-sm-3 col-12">
									<div class="service-img">
										<figure><img src="<?php the_sub_field('image'); ?>" alt="service_img"></figure>
									</div>
									<div class="service-desc px-0">
										<h6><?php the_sub_field('title'); ?></h6>
										<p><?php the_sub_field('content'); ?></p>
									</div>
								</li>
							<?php endwhile; ?>
							
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php 
	$products = get_field('related_products',$term);

	if( $products ): ?>
<section class="WFwrap product-wrap">
	<div class="container">
		<h2 class="text-left">Pour une chambre 100% naturelle</h2>
		<div class="shop-content">
			
				<ul class="product-slider Wrap12">
				<?php foreach( $products as $product): 
					$product_object = get_post( $product );
	
						setup_postdata( $GLOBALS['post'] =& $product_object ); 
	
						wc_get_template_part( 'content', 'product' );
	
					endforeach; 
				?>
				</ul>
			
		</div>
	</div>
</section>
<?php endif;
wp_reset_postdata();
?>

 <?php }?>
	<?php
    /**
	 * Hook: woocommerce_after_main_content.
	 *
	 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
	 */
	do_action( 'woocommerce_after_main_content' );
					
get_footer( 'shop' );
