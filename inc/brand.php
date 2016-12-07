 <?php
    $Read->FullRead("SELECT brand_id,brand_title, brand_name FROM " . DB_PDT_BRANDS . " WHERE brand_id IN(SELECT pdt_brand FROM " . DB_PDT . " WHERE pdt_status = 1) ORDER BY brand_title ASC");
    if ($Read->getResult()):?>
 <?php
 $NavBrands=$Read->getResult();
 
foreach ($NavBrands as $NavBrand):
	$Read->FullRead("SELECT * FROM " . DB_PDT . " WHERE pdt_brand={$NavBrand['brand_id']}");
?>
<li > <a title="<?="{$NavBrand['brand_title']}";?>" href="<?=BASE . "/marca/{$NavBrand['brand_title']}"?>"> <span class="badge pull-right"><?=str_pad($Read->getRowCount(),3,'0',STR_PAD_LEFT);?></span> <?=$NavBrand['brand_title']?> </a> </li>
<?php  endforeach;
endif;