<?php
$Read->ExeRead(DB_PDT, "WHERE pdt_status = 1 AND pdt_id != :id AND (pdt_id = :pr OR pdt_parent = :pr OR pdt_parent = :id) AND pdt_inventory >= 1", "pr={$pdt_parent}&id={$pdt_id}");
if ($Read->getResult()):
 
    foreach ($Read->getResult() as $Parent):?>
      <div class="item">
        <div class="product"> <a class="product-image" href="<?=BASE;?>/produto/<?=$Parent['pdt_name'];?>"> 
             <img src="<?=BASE;?>/tim.php?src=uploads/<?=$Parent['pdt_cover'];?>&w=<?=THUMB_W / 3;?>&h<?=THUMB_H / 3?>"  alt="<?=$Parent['pdt_name'];?>"> </a>
          <div class="description">
            <h4><a href="san-remo-spaghetti"><?=$Parent['pdt_title'];?></a></h4>
          </div>
        </div>
      </div><!--/.item-->      
  <?php  endforeach;
 endif;
 