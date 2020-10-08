<?php 
global $product;


$reviews = yopto_get_product_reviews($product->get_ID());

$yopto_settings = yopto_settings();


$average = $reviews['response']['bottomline']['average_score'];

$star_distribution  = $reviews['response']['bottomline']['star_distribution'];
$count = $reviews['response']['bottomline']['total_review'];
$per_page = $reviews['response']['pagination']['per_page'];
$yopto_pages = ceil($count/$per_page);
?>
<div class="review-block <?php if($count == 0){echo 'pt-5 pb-5';}?>">
  <div class="container">
  	<?php if($count > 0){?>
    <div class="review-info">
      <div class="review-cms">
          <h2>Vos avis</h2>
          <div class="cnt_block">
            <div class="rating">
              <ul>
            <?php
			
			for($i=1;$i<=5;$i++){
				$class = (round($average) >= $i ) ? 'ratingstar' : 'emptystar';
				echo '<li class="'.$class.'"><a></a></li>';
			}?>
              </ul>
            </div>
            <div class="review-cnt"><?php echo (number_format((float)$average, 1, '.', '')+0);?>/5</div>
            <div class="total-review">
            <?php	echo sprintf( esc_html( _n( '%1$s avis clients', '%1$s avis clients', $count, 'woocommerce' ) ), esc_html( $count ));?>
            </div>
          </div>
          <div class="text-btn"> <a href="<?php echo $yopto_settings['review_page_link']?>">Voir tous les avis</a> </div>
        </div>
         <?php  if($star_distribution){	 krsort($star_distribution)  ?>
          <div class="review-bar">
            <?php foreach($star_distribution as $key=>$star){ $per = round(($star * 100) / $count);?>
            <div class="review-progress"> <span><?php echo  $key.' étoiles';?></span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $per.'%';?>"> </div>
              </div>
              <span><?php echo $star .' avis';?></span> </div>
            <?php }?>        
          </div>
       <?php }?>
    </div>
    <div class="review-slider">
      <div id="yopto-review-list"></div>      
      <div class="pagination_grid">
        <ul class="pagination">
          <li class="previous paginate "><a></a></li>
          <?php for($i = 1;$i<=$yopto_pages;$i++){?>
          <li class="paginate yoptopaginate <?php echo ($i == 1) ? ' active ': ''; ?>" id="yoptopage_<?php echo $i;?>"><a href="javascript:void(0)" onclick="get_product_review(<?php echo $i;?>)"><?php echo $i;?></a></li>
          <?php }?>         
          <li class="next paginate"><a></a></li>
        </ul>
      </div>
    </div>
    <?php }else{
		echo '<h3 class="text-center">Aucun avis trouvé</h3>';
	}?>
  </div>
</div>