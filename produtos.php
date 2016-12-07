 <?php
$Read->ExeRead(DB_PDT_CATS, "WHERE cat_name = :cat", "cat={$URL[1]}");
if (!$Read->getResult()):
    require '404.php';
else:
    extract($Read->getResult()[0]);
    $departament = null;
    if ($cat_parent):
        $Read->FullRead("SELECT cat_title, cat_name FROM " . DB_PDT_CATS . " WHERE cat_id = :id", "id={$cat_parent}");
        $departament = " / <a title='{$Read->getResult()[0]['cat_title']} em " . SITE_NAME . "' href='" . BASE . "/produtos/{$Read->getResult()[0]['cat_name']}'>{$Read->getResult()[0]['cat_title']}</a>";
    endif;
     endif;
    ?>
<div class="container main-container headerOffset"> 
  <!-- Main component call to action -->
   <div class="row">
    <div class="breadcrumbDiv col-lg-12">
      <ul class="breadcrumb">
        <li><a title="<?= SITE_NAME; ?>" href="<?= BASE; ?>"><?= SITE_NAME; ?></a> </li>
        <li class="active"><?= $cat_title; ?> </li>
      </ul>
    </div>
  </div>  <!-- /.row  --> 
    <div class="row">
     <!--left column-->
      <div class="col-lg-3 col-md-3 col-sm-12">
       <?php require_once 'inc/sidebar.php';?>
      </div>
    <?php
      $Page = (!empty($URL[2]) && filter_var($URL[2], FILTER_VALIDATE_INT) ? $URL[2] : 1);
      $Pager = new Pager(BASE . "/produtos/{$URL[1]}/", "<<", ">>", 3);
      $Pager->ExePager($Page, 8);
      $Read->ExeRead(DB_PDT, "WHERE (pdt_category = :cat OR pdt_subcategory = :cat) AND (pdt_inventory >= 1 OR pdt_inventory IS NULL) AND pdt_status = 1 ORDER BY pdt_title ASC LIMIT :limit OFFSET :offset", "cat={$cat_id}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
      if ($Read->getResult()):
          $count=$Read->getRowCount();
      endif;
      ?>
    <!--right column-->
    <div class="col-lg-9 col-md-9 col-sm-12">      
      <div class="w100 productFilter clearfix">
        <p class="pull-left"> Mostrando <strong><?=$count;?></strong> produtos </p>
        <div class="pull-right ">
          <div class="change-view pull-right"> 
          <a href="#" title="Grid" class="grid-view"> <i class="fa fa-th-large"></i> </a> 
          <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a> </div>
        </div>
      </div> <!--/.productFilter-->
      <div class="row  categoryProduct xsResponse clearfix">
       <?php
          if ($Read->getResult()):
              foreach ($Read->getResult() as $LastPDT):
                  extract($LastPDT);
                   require 'inc/product.php';
              endforeach;
          else:
              $Pager->ReturnPage();
              Erro("Não existem produtos cadastrados em {$cat_title}. Mas temos outras opções! :)", E_USER_NOTICE);
          endif;
        ?>
    </div> <!--/.categoryProduct || product content end-->
      <div class="w100 categoryFooter">
        <div class="pagination pull-left no-margin-top">
      <?php 
      $Pager->ExePaginator(DB_PDT, "WHERE (pdt_category = :cat OR pdt_subcategory = :cat) AND (pdt_inventory >= 1 OR pdt_inventory IS NULL) AND pdt_status = 1", "cat={$cat_id}");
        echo $Pager->getPaginator();?>
        </div>
      </div> <!--/.categoryFooter-->
    </div><!--/right column end-->
  </div><!-- /.row  --> 
</div>