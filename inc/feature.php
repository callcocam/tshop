<div class="container main-container"> 
   <!-- Main component call to action -->
    <?php
         $Read->ExeRead(DB_PDT, "WHERE (pdt_inventory >= 1 OR pdt_inventory IS NULL) AND pdt_status = 1 ORDER BY pdt_title ASC LIMIT :limit OFFSET :offset", "limit=12&offset=0");
            if ($Read->getResult()):?>
		<div class="row featuredPostContainer globalPadding style2">
		    <h3 class="section-title style2 text-center"><span>NEW ARRIVALS</span></h3>
		    	<div id="productslider" class="owl-carousel owl-theme">
		            <?php
		                foreach ($Read->getResult() as $LastPDT):
		                    extract($LastPDT);
		                ?>
                     <div class="item">
						<div class="product">
						  <div class="image"> 
							<a href="<?= BASE; ?>/produto/<?= $pdt_name; ?>" title="Ver detalhes de <?= $pdt_title; ?>">
							<img alt="Detalhes do produto <?= $pdt_title; ?>" title="Detalhes do produto <?= $pdt_title; ?>" src="<?= BASE; ?>/tim.php?src=uploads/<?= $pdt_cover; ?>&w=<?= THUMB_W / 2; ?>&h=<?= THUMB_H / 2; ?>"  class="img-responsive"/>
							</a> 
							<div class="promotion">
							 <?php require 'promotion.php'; ?>
	            		    </div>
						</div>
						    <div class="description">
						    <h4><a href="<?= BASE; ?>/produto/<?= $pdt_name; ?>" title="Ver detalhes de <?= $pdt_title; ?>"><?= $pdt_title; ?> </a></h4>
						    <p><?= Check::Words($pdt_subtitle, 10); ?> </p>
						    </div>
						    <?php require '_cdn/widgets/tshop/price.php'; ?>
						  <div class="action-control"> 
							<?php require '_cdn/widgets/tshop/cart.btn.php'; ?>
						   </div>
						</div>
					</div>
		             <?php endforeach;?>
		    </div>
		<!--/.productslider--> 
		</div>
		           <?php else:
		                  Erro("Ainda Não Existe Produtos Cadastrados. Por favor, volte mais tarde!", E_USER_NOTICE);
		            endif;?>
  <!--/.featuredPostContainer--> 
</div>