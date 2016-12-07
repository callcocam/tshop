<?php
$Read->ExeRead(DB_PDT_COUPONS ," WHERE cp_start >= NOW() AND cp_end >= NOW() AND cp_coupon = :cp", "cp=blackfreind");
if ($Read->getResult()):
$Coupon = $Read->getResult()[0];
  extract($Coupon);?>
<div class="parallax-section parallax-image-1">
  <div class="container">
    <div class="row ">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="parallax-content clearfix">
          <h1 class="parallaxPrce"> <?=$cp_discount;?>% DE DISCONTO</h1>
          <h2 class="uppercase"><?=$cp_title;?></h2>
          <div style="clear:both"></div>
          <a class="btn btn-discover "> <i class="fa fa-ticket"></i> <?=$cp_coupon;?> </a> </div>
      </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.container--> 
</div>
<?php endif;