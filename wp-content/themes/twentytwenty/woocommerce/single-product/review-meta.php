<?php
/**
 * The template to display the reviewers meta data (name, verified owner, review date)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review-meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $comment;
$verified = wc_review_is_from_verified_owner( $comment->comment_ID );
$comment_author = get_comment_author($comment->comment_ID );
$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
?>
<div  class="review-left-block">
              <h3>
			  <?php print_r($comment_author); ?>
              <?php
					if ( 'yes' === get_option( 'woocommerce_review_rating_verification_label' ) && $verified ) {
						echo '<em class="woocommerce-review__verified verified">(' . esc_attr__( 'verified owner', 'woocommerce' ) . ')</em> ';
					}
			
			  ?>
              </h3>
              <div class="cnt_block">
                <div class="rating">
                <?php echo woocommerce_review_display_rating();?>                  
                </div>
              </div>
              <p><?php echo esc_html( get_comment_date( wc_date_format() ) ); ?></p>
              <span class="pro-size"><?php echo get_the_title()?></span> </div>
<?php
/*if ( '0' === $comment->comment_approved ) { ?>

	<p class="meta">
		<em class="woocommerce-review__awaiting-approval">
			<?php esc_html_e( 'Your review is awaiting approval', 'woocommerce' ); ?>
		</em>
	</p>

<?php } else { ?>

	<p class="meta">
		
		
		<span class="woocommerce-review__dash">&ndash;</span> <time class="woocommerce-review__published-date" datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>"><?php echo esc_html( get_comment_date( wc_date_format() ) ); ?></time>
	</p>

	<?php
}*/
