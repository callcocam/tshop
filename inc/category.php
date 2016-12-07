<?php
$Read->FullRead("SELECT cat_id, cat_title, cat_name FROM " . DB_PDT_CATS . " WHERE cat_parent IS NULL AND cat_id IN(SELECT pdt_category FROM " . DB_PDT . " WHERE pdt_status = 1) ORDER BY cat_title ASC");
if ($Read->getResult()):
foreach ($Read->getResult() as $value):?>
 <?php $Read->FullRead("SELECT cat_title, cat_name FROM " . DB_PDT_CATS . " WHERE cat_parent = :cat_id ORDER BY cat_title ASC", "cat_id={$value['cat_id']}");?>
<li class="active dropdown-tree open-tree" >
 <a  class="dropdown-tree-a" > 
 <span class="badge pull-right"><?=str_pad($Read->getRowCount(),3,'0',STR_PAD_LEFT);?></span> <?=$value['cat_title'];?> </a>
  <ul class="category-level-2 dropdown-menu-tree">
  <?php
    if ($Read->getResult()):
         foreach ($Read->getResult() as $NavProductsCat):?>
             <li><a title="<?=$NavProductsCat['cat_title'];?>" href="<?=BASE . "/produtos/{$NavProductsCat['cat_name']}";?>"><?=$NavProductsCat['cat_title'];?></a></li>
       <?php endforeach;?>
   <?php endif;?>        
  </ul>
</li>
<?php 
    endforeach;
endif;