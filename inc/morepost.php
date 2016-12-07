<div class="container main-container"> 
  <!-- Main component call to action -->
  <div class="morePost row featuredPostContainer style2 globalPaddingTop " >
    <h3 class="section-title style2 text-center"><span>FEATURES PRODUCT</span></h3>
    <div class="container">
      <div class="row xsResponse">
        <?php
            $Read->ExeRead(DB_PDT, "WHERE (pdt_inventory >= 1 OR pdt_inventory IS NULL) AND pdt_status = 1 ORDER BY pdt_title ASC LIMIT :limit OFFSET :offset", "limit=8&offset=0");
            if ($Read->getResult()):
                foreach ($Read->getResult() as $LastPDT):
                    extract($LastPDT);
                      require 'product.php';
                endforeach;
                else:
                Erro("Ainda Não Existe Produtos Cadastrados. Por favor, volte mais tarde!", E_USER_NOTICE);
            endif;
            ?>
       </div>
      <!-- /.row --> 
      <div class="row">
      	<div class="load-more-block text-center">
             
         </div>
      </div>
      
    </div>
    <!--/.container--> 
  </div>
  <!--/.featuredPostContainer-->
  
  <hr class="no-margin-top">
  <div class="width100 section-block ">
    <div class="row featureImg">
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="#"><img src="<?=INCLUDE_PATH;?>/images/site/new-collection-1.jpg" class="img-responsive" alt="img" ></a> </div>
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="#"><img src="<?=INCLUDE_PATH;?>/images/site/new-collection-2.jpg" class="img-responsive" alt="img" ></a> </div>
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="#"><img src="<?=INCLUDE_PATH;?>/images/site/new-collection-3.jpg" class="img-responsive" alt="img" ></a> </div>
      <div class="col-md-3 col-sm-3 col-xs-6"> <a href="#"><img src="<?=INCLUDE_PATH;?>/images/site/new-collection-4.jpg" class="img-responsive" alt="img"></a> </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.section-block-->
  
  <div class="width100 section-block">
    <h3 class="section-title"><span> BRAND</span> <a id="nextBrand" class="link pull-right carousel-nav"> <i class="fa fa-angle-right"></i></a> <a id="prevBrand" class="link pull-right carousel-nav"> <i class="fa fa-angle-left"></i> </a> </h3>
    <div class="row">
      <div class="col-lg-12">
        <ul class="no-margin brand-carousel owl-carousel owl-theme">
          <li><a ><img src="<?=INCLUDE_PATH;?>/images/brand/1.gif" alt="img" ></a></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/2.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/3.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/4.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/5.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/6.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/7.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/8.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/1.gif" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/2.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/3.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/4.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/5.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/6.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/7.png" alt="img" ></li>
          <li><img src="<?=INCLUDE_PATH;?>/images/brand/8.png" alt="img" ></li>
        </ul>
      </div>
    </div>
    <!--/.row--> 
  </div>
  <!--/.section-block--> 
  </div>