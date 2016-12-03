<?php
$PdtStockeOut = ($pdt_inventory && $pdt_inventory <= 5 ? true : false);

if ($pdt_offer_price && $pdt_offer_start <= date('Y-m-d H:i:s') && $pdt_offer_end >= date('Y-m-d H:i:s')):
    $PdtDiscount = number_format(100 - ((100 / $pdt_price) * $pdt_offer_price), '0', '', '');
    $PdtIdentBox = (!empty($PdtStockeOut) ? ' single_pdt_offer_ident' : null);
    echo "<span class=\"discount\">{$PdtDiscount}% OFF</span>"; 
    //echo "<span class='single_pdt_offer{$PdtIdentBox}'>{$PdtDiscount}% OFF</span>";
endif;

if ($PdtStockeOut):
	echo "<span class=\"new-product\"> Últimas Unidades</span>"; 
   // echo "<span class='single_pdt_stock'>Últimas Unidades</span>";
endif;