<?php if (!empty($_SESSION['wc_order'])):?>
    <?php 
        $CartTotal = 0;
        $tr=[];
        foreach ($_SESSION['wc_order'] as $ItemId => $ItemAmount):
            $Read->ExeRead(DB_PDT, "WHERE pdt_status = 1 AND (pdt_inventory IS NULL OR pdt_inventory >= 1) AND pdt_id = (SELECT pdt_id FROM " . DB_PDT_STOCK . " WHERE stock_id = :id)", "id={$ItemId}");
            if ($Read->getResult()):
                extract($Read->getResult()[0]);
                $Read->FullRead("SELECT stock_code, stock_inventory FROM " . DB_PDT_STOCK . " WHERE stock_id = :id", "id={$ItemId}");
                $StockInventory = ($Read->getResult() ? $Read->getResult()[0]['stock_inventory'] : 0);
                $ItemVariation = ($Read->getResult() && $Read->getResult()[0]['stock_code'] != 'Default' ? " <span class='wc_cart_tag'>Tamanho: {$Read->getResult()[0]['stock_code']}</span>" : '');
                $ItemPrice = ($pdt_offer_price && $pdt_offer_start <= date('Y-m-d H:i:s') && $pdt_offer_end >= date('Y-m-d H:i:s') ? $pdt_offer_price : $pdt_price);
                $CartTotal += $ItemPrice * $ItemAmount;
                    $tr[]='<tr class="miniCartProduct workcontrol_cart_list_item_'.$ItemId.'">';
                    $tr[]='<td style="20%" class="miniCartProductThumb">';
                    $tr[]='<div> <a href="'.BASE.'/produto/'.$pdt_name.'">'; 
                    $tr[]='<img src="'.BASE.'/tim.php?src=uploads/'.$pdt_cover.'" alt="'.$pdt_name.'"> </a> </div>';
                    $tr[]='</td>';
                    $tr[]='<td style="40%"><div class="miniCartDescription">';
                            $tr[]='<h4><a href="'.BASE.'/produto/'.$pdt_name.'">'.$pdt_title.'</a></h4>';
                            $tr[]='<span class="size"> '.$ItemVariation.' </span>';
                            $tr[]='<div class="price">'; 
                      if($pdt_price != $ItemPrice):
                       $tr[]='<span class="discount">De R$ <strike>'.number_format($pdt_price, '2', ',', '.').'</strike></span>Por';
                      endif;
                       $tr[]='R$ '.number_format($ItemPrice, '2', ',', '.').' </div>';
                        $tr[]='</div></td>';
                    $tr[]='<td  style="10%" class="miniCartQuantity"><a > X '.$ItemAmount.' </a></td>';
                    $tr[]='<td  style="15%" class="miniCartSubtotal wc_item_price_'.$ItemId.'"><span> R$ '.number_format($ItemAmount * $ItemPrice, '2', ',', '.').' </span></td>';
                $tr[]='</tr>';
            else:
                unset($_SESSION['wc_order'][$ItemId]);
            endif;
        endforeach;
       endif;
        ?>
<!--- this part will be hidden for mobile version -->
<div class="nav navbar-nav navbar-right hidden-xs">
    <?php if(isset($tr)):?>
    <div class="dropdown  cartMenu "> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-shopping-cart"> </i> <span class="cartRespons wc_cart_total"> Cart (R$ <span><?=$CartTotal;?></span>) </span> <b class="caret"> </b> </a>
        <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
            <div class="w100 miniCartTable scroll-pane">
                <table>
                    <tbody>
                    <?php 
                        echo implode(PHP_EOL, $tr);
                    ?>
                    </tbody>
                </table>
            </div>
            <!--/.miniCartTable-->
            <div class="miniCartFooter text-right">
                <h3 class="text-right subtotal wc_cart_total"> Subtotal: R$ <span><?=$CartTotal;?></span> </h3>
                <a href="<?= BASE; ?>/pedido/home#cart" class="btn btn-sm btn-danger"> <i class="fa fa-shopping-cart"> </i> Fechar Pedido! </a></div>
            <!--/.miniCartFooter-->
        </div>
        <!--/.dropdown-menu-->
    </div>
    <?php endif;?>
    <!--/.cartMenu-->
    <div class="search-box">
        <div class="input-group">
            <button class="btn btn-nobg" type="button"> <i class="fa fa-search"> </i> </button>
        </div>
        <!-- /input-group -->
    </div>
    <!--/.search-box -->
</div>
<!--/.navbar-nav hidden-xs-->