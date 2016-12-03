
        <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
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
        <!--/.item-->