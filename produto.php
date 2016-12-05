<?php
$Read->ExeRead(DB_PDT, "WHERE pdt_name = :nm AND pdt_status = 1", "nm={$URL[1]}");
if (!$Read->getResult()):
    header('Location: ' . BASE . "/404.php");
else:
    extract($Read->getResult()[0]);
    $CommentKey = $pdt_id;
    $CommentType = 'product';

    $PdtViewUpdate = ['pdt_views' => $pdt_views + 1, 'pdt_lastview' => date('Y-m-d H:i:s')];
    $Update = new Update;
    $Update->ExeUpdate(DB_PDT, $PdtViewUpdate, "WHERE pdt_id = :id", "id={$pdt_id}");

    $Read->FullRead("SELECT brand_name, brand_title FROM " . DB_PDT_BRANDS . " WHERE brand_id = :id", "id={$pdt_brand}");
    $Brand = ($Read->getResult() ? $Read->getResult()[0] : '');

    $Read->FullRead("SELECT cat_name, cat_title FROM " . DB_PDT_CATS . " WHERE cat_id = :id", "id={$pdt_subcategory}");
    $Category = ($Read->getResult() ? $Read->getResult()[0] : '');

    $Read->FullRead("SELECT cat_name, cat_title FROM " . DB_PDT_CATS . " WHERE cat_id = :id", "id={$pdt_subcategory}");
    $Category = ($Read->getResult() ? $Read->getResult()[0] : '');

    $CommentModerate = (COMMENT_MODERATE ? " AND (status = 1 OR status = 3)" : '');
    $Read->FullRead("SELECT id FROM " . DB_COMMENTS . " WHERE pdt_id = :pid{$CommentModerate}", "pid={$pdt_id}");
    $Aval = $Read->getRowCount();

    $Read->FullRead("SELECT SUM(rank) as total FROM " . DB_COMMENTS . " WHERE pdt_id = :pid{$CommentModerate}", "pid={$pdt_id}");
    $TotalAval = $Read->getResult()[0]['total'];
    $TotalRank = $Aval * 5;
    $getRank = ($TotalAval ? (($TotalAval / $TotalRank) * 50) / 10 : 0);
    $Rank = str_repeat("&starf;", intval($getRank)) . str_repeat("&star;", 5 - intval($getRank));

    if ($pdt_hotlink):
        header("Location: {$pdt_hotlink}");
    endif;
endif;
?>

<div class="container main-container headerOffset">
  <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a href="<?= BASE;?>">Home</a> </li>
        <li><a>DEPRATAMENTO</a> </li>
        <li><a href="<?= BASE . "/produtos/{$Category['cat_name']}"; ?>"><?=$Category['cat_title'];?></a> </li>
        <li class="active"><?=$pdt_title;?> </li>
      </ul>
    </div>
  </div>
  <div class="row transitionfx">
  
   <!-- left column -->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <!-- product Image and Zoom -->
      <div class="main-image sp-wrap col-lg-12 no-padding"> 
        <a href="<?=BASE . "/tim.php?src=uploads/{$pdt_cover}&w=2100&h=2527";?>"><img title="<?=$pdt_title;?>" src="<?=BASE . "/tim.php?src=uploads/{$pdt_cover}&w=500&h=600";?>" class="img-responsive" alt="<?=$pdt_title;?>"></a> 
        <?php
        $Read->ExeRead(DB_PDT_GALLERY, "WHERE product_id = :id", "id={$pdt_id}");
                if ($Read->getResult()):
                $i = 0;
                    foreach ($Read->getResult() as $PDTIMG):
                    $i++;
                    $image=$PDTIMG['image'];?>
                     <a  title="<?=$pdt_title;?> - Foto <?=$i;?>" href="<?=BASE . "/tim.php?src=uploads/{$image}&w=900&h=1127";?>">
                        <img title="<?=$pdt_title;?>" src="<?=BASE . "/tim.php?src=uploads/{$image}&w=500&h=600";?>" class="img-responsive" alt="<?=$pdt_title;?>">
                     </a> 
                <?php  
                    endforeach;
                endif;
                ?>
        
      </div>
    </div><!--/ left column end -->
    
    
    <!-- right column -->
    <div class="col-lg-6 col-md-6 col-sm-5">
    
      <h1 class="product-title"> <?=$pdt_title;?></h1>
      <h3 class="product-code">Product Code : <?= $pdt_code; ?></h3>
       <?php if ($Brand): ?>
                    <p>Marca: <a title="Mais produtos da marca <?= $Brand['brand_title']; ?>" href="<?= BASE . "/marca/{$Brand['brand_name']}"; ?>"><?= $Brand['brand_title']; ?></a></p>
                    <?php
                endif;
                if ($Category):
                    ?>
                    <p>Categoria: <a title="Mais produtos em <?= $Category['cat_title']; ?>" href="<?= BASE . "/produtos/{$Category['cat_name']}"; ?>"><?= $Category['cat_title']; ?></a></p>
                <?php endif; ?>
                <p>Estoque: <?= $pdt_inventory ? str_pad($pdt_inventory, 3, 0, STR_PAD_LEFT) : '+100'; ?> unidades</p>
                <p class="reviews"><?= $Rank; ?> - <a class="wc_goto" href="#comments" title="Ver Avaliações!"><?= str_pad($Aval, 2, 0, 0); ?> avaliações!</a></p>
      <div class="product-price"> 
           <?php
            $PdtPrice = null;
            if ($pdt_offer_price && $pdt_offer_start <= date('Y-m-d H:i:s') && $pdt_offer_end >= date('Y-m-d H:i:s')):
                $PdtPrice = $pdt_offer_price;
                    $de=number_format($pdt_price, '2', ',', '.') ;
                    $por=number_format($pdt_offer_price, '2', ',', '.');
               echo "<span class=\"price-sales\">R$ {$por}</span><span class=\"price-standard\"> R$ {$de}</span>";
            else:
                $PdtPrice = $pdt_price;
                $apenas=number_format($pdt_price, '2', ',', '.');
                echo "<span class=\"price-sales\">R$ {$apenas}</span>";
            endif;

            if (ECOMMERCE_PAY_SPLIT):
                $MakeSplit = intval($PdtPrice / ECOMMERCE_PAY_SPLIT_MIN);
                $NumSplit = (!$MakeSplit ? 1 : ($MakeSplit && $MakeSplit <= ECOMMERCE_PAY_SPLIT_NUM ? $MakeSplit : ECOMMERCE_PAY_SPLIT_NUM));
                $ParcSj = round($PdtPrice / $NumSplit, 2); // Valor das parcelas sem juros
                $ParcRest = (ECOMMERCE_PAY_SPLIT_ACN > 1 ? $NumSplit - ECOMMERCE_PAY_SPLIT_ACN : $NumSplit);
                $DiffParc = round(($PdtPrice * getFactor($ParcRest) * $ParcRest) - $PdtPrice, 2);
                $SplitPrice = number_format($ParcSj + ($DiffParc / $NumSplit), '2', ',', '.');
                echo "<p class='pdt_single_split'>Em até {$NumSplit}x de R$ {$SplitPrice}</p>";
            endif;
            ?>
      </div>
      
      <div class="details-description">
        <p><?= Check::Words($pdt_subtitle, 10); ?></p>
      </div>
      <hr>
     <!--  <div class="color-details"> 
        <span class="selected-color">
        <strong>COLOR</strong></span>
        <ul class="swatches Color">
          <li class="selected"> <a style="background-color:#f1f40e" > h</a> </li>
          <li> <a style="background-color:#adadad" >hh </a> </li>
          <li> <a style="background-color:#4EC67F" >tts </a> </li>
        </ul>
      </div> -->
      <!--/.color-details-->
       <?php require '_cdn/widgets/tshop/cart.add.php'; ?>
      <!--/.cart-actions-->
      <div class="clear"></div>
      
      <div class="product-tab w100 clearfix">
      
        <ul class="nav nav-tabs">
          <li class="active"><a href="#details" data-toggle="tab">Detalhes</a></li>
          <li><a href="#shipping" data-toggle="tab">Unidades Vendidas:</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="details"><?=$pdt_content;?></div>
          <div class="tab-pane" id="shipping">
           <table >
              <colgroup>
              <col style="width:45%">
              <col style="width:15%">
              <col style="width:40%">
              </colgroup>
              <tbody>
            <?php
            //Delivered By Car, Brand or All
               $Read->ExeRead(DB_ORDERS_ITEMS, "WHERE pdt_id=:pdt_id LIMIT 4", "pdt_id={$pdt_id}");
               $orden_items=$Read->getResult();
               if ($orden_items):
                $Read->FullRead("select SUM(item_amount) as qtd_vendido from ".DB_ORDERS_ITEMS." WHERE pdt_id=:pdt_id","pdt_id={$pdt_id}");
                $count=$Read->getResult();
                 foreach ($orden_items as $orden_item):
                    extract($orden_item);
                    $Read->ExeRead(DB_ORDERS, "WHERE order_id=:order_id", "order_id={$order_id}");
                    $orders_shippings=$Read->getResult();
                    if($orders_shippings):
                    foreach ($orders_shippings as $orders_shipping):
                        extract($orders_shipping);
                    ?>
                    <tr>
                    <td>Quantidade: <?=$count[0]["qtd_vendido"];?></td>
                    <td>Dia:</td>
                   <td><?=$order_date;?></td>
                    </tr>
                    <?php 
                    endforeach; 
                    endif;
                endforeach;
             endif;
            ?>
              </tbody>
              <tfoot>
                <tr>
                  <!-- <td colspan="3">* Free on orders of $50 or more</td> -->
                </tr>
              </tfoot>
            </table>
          </div>
          
        </div> <!-- /.tab content -->
        
      </div><!--/.product-tab-->
      
      <div style="clear:both"></div>
      
      <div class="product-share clearfix">
        <p> SHARE </p>
        <div class="socialIcon"> 
            <a href="#"> <i  class="fa fa-facebook"></i></a> 
            <a href="#"> <i  class="fa fa-twitter"></i></a> 
            <a href="#"> <i  class="fa fa-google-plus"></i></a> 
            <a href="#"> <i  class="fa fa-pinterest"></i></a> </div>
      </div>
      <!--/.product-share--> 
      
    </div><!--/ right column end -->
    
  </div>
  <!--/.row-->
    
  <div class="row recommended">
  
    <h1> SIMILARES </h1>
  <div id="SimilarProductSlider">
         <?php require 'inc/recommended.php';?>
  </div>  <!--/.recommended--> 
  </div>
  <div style="clear:both"></div>  
</div> <!-- /main-container -->

<div class="gap"></div>
