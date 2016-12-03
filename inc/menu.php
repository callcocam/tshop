<?php
require_once 'modal.php';
?>
<!-- Fixed navbar start -->
<div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">

                    <div class="pull-left ">
                        <ul class="userMenu ">
                            <li> <a href="#"> <span class="hidden-xs">HELP</span><i class="glyphicon glyphicon-info-sign hide visible-xs "></i> </a> </li>
                            <li class="phone-number">
                                <a  href="callto:+<?= SITE_ADDR_PHONE_A; ?>">
                                    <span> <i class="glyphicon glyphicon-phone-alt "></i></span>
                                    <span class="hidden-xs" style="margin-left:5px"> <?= SITE_ADDR_PHONE_A; ?> </span> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                    <div class="pull-right">
                        <ul class="userMenu">
                            <li> <a href="account-1.html"><span class="hidden-xs"> My Account</span> <i class="glyphicon glyphicon-user hide visible-xs "></i></a> </li><li> <a href="#"  data-toggle="modal" data-target="#ModalLogin"> <span class="hidden-xs">Sign In</span> <i class="glyphicon glyphicon-log-in hide visible-xs "></i> </a> </li>
                            <li class="hidden-xs"> <a href="#"  data-toggle="modal" data-target="#ModalSignup"> Create Account </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.navbar-top-->

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"> Toggle navigation </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> <span class="icon-bar"> </span> </button>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart"> <i class="fa fa-shopping-cart colorWhite"> </i> <span class="cartRespons colorWhite"> Cart ($210.00) </span> </button>
            <a class="navbar-brand " href="index.html"> <?= SITE_NAME ?> </a>

            <!-- this part for mobile -->
            <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                <div class="input-group">
                    <button class="btn btn-nobg" type="button"> <i class="fa fa-search"> </i> </button>
                </div>
                <!-- /input-group -->

            </div>
        </div>
        <?php require_once 'cart_desktop.php';?>
         <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a title="<?= SITE_NAME; ?>" href="<?= BASE; ?>">Home</a> </li>
                               <!-- change width of megamenu = use class > megamenu-fullwidth, megamenu-60width, megamenu-40width -->
                <?php
                $Read->FullRead("SELECT cat_id, cat_title, cat_name FROM " . DB_PDT_CATS . " WHERE cat_parent IS NULL AND cat_id IN(SELECT pdt_category FROM " . DB_PDT . " WHERE pdt_status = 1) ORDER BY cat_title ASC");
                if ($Read->getResult()):?>
                <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> DEPARTAMENTOS <b class="caret"> </b> </a>
                    <ul class="dropdown-menu">
                        <li class="megamenu-content">
                            <!-- megamenu-content -->
                            <h3 class="promo-1 no-margin hidden-xs"> 24+ HTML PAGES ONLY $8 || AVAILABLE ONLY AT WRAP BOOTSTRAP </h3>
                            <h3 class="promo-1sub hidden-xs"> Complete Parallax E-Commerce Boostrap Template, Responsive on any Device, 10+ color Theme + Parallax Effect </h3>
                            <?php
                            foreach ($Read->getResult() as $NavSectors):?>
                            <ul class="col-lg-2  col-sm-2 col-md-2 unstyled">
                                    <li class="no-border">
                                        <p> <strong> <?=$NavSectors['cat_title']?> </strong> </p>
                                    </li>
                                    <?php $Read->FullRead("SELECT cat_title, cat_name FROM " . DB_PDT_CATS . " WHERE cat_parent = :cat_id ORDER BY cat_title ASC", "cat_id={$NavSectors['cat_id']}");
                                    if ($Read->getResult()):
                                         foreach ($Read->getResult() as $NavProductsCat):?>
                                             <li><a title="<?=$NavProductsCat['cat_title'];?>" href="<?=BASE . "/produtos/{$NavProductsCat['cat_name']}";?>"><?=$NavProductsCat['cat_title'];?></a></li>
                                       <?php endforeach;?>
                                   <?php endif;?>
                                </ul>
                                <?php endforeach;?>
                         </li>
                    </ul>
                </li>
                <?php endif;?>
                <?php
                $Read->FullRead("SELECT brand_title, brand_name FROM " . DB_PDT_BRANDS . " WHERE brand_id IN(SELECT pdt_brand FROM " . DB_PDT . " WHERE pdt_status = 1) ORDER BY brand_title ASC");
                if ($Read->getResult()):?>
                    <li class="dropdown megamenu-fullwidth"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Fabricantes: <b class="caret"> </b> </a>
                        <ul class="dropdown-menu">
                            <li class="megamenu-content ">
                                <ul class="col-lg-3  col-sm-3 col-md-3 unstyled noMarginLeft newCollectionUl">
                                    <li class="no-border">
                                        <p class="promo-1"> <strong> NEW COLLECTION </strong> </p>
                                    </li>
                                    <?php
                                    foreach ($Read->getResult() as $NavBrand):?>
                                        <li><a title="<?="{$NavBrand['brand_title']}";?>" href="<?=BASE . "/marca/{$NavBrand['brand_title']}"?>"><?=$NavBrand['brand_title']?></a></li>
                                    <?php  endforeach; ?>
                                </ul>
                                <?php
                                 $Read->ExeRead(DB_PDT, "WHERE (pdt_inventory >= 1 OR pdt_inventory IS NULL) AND pdt_status = 1 ORDER BY pdt_title ASC LIMIT :limit OFFSET :offset", "limit=3&offset=1");
                                if ($Read->getResult()):
                                    foreach ($Read->getResult() as $LastPDT):
                                        extract($LastPDT);?>
                                <ul class="col-lg-3  col-sm-3 col-md-3  col-xs-4">
                                     <li>
                                        <a class="newProductMenuBlock" href="<?= (!empty($pdt_hotlink) ? $pdt_hotlink : BASE . "/produto/{$pdt_name}"); ?>" title="Ver detalhes de <?= $pdt_title; ?>">
                                            <img class="img-responsive" src="<?= BASE; ?>/tim.php?src=uploads/<?= $pdt_cover; ?>&w=<?= THUMB_W / 2; ?>&h=<?= THUMB_H / 2; ?>"  alt="Detalhes do produto <?= $pdt_title; ?>" title="Detalhes do produto <?= $pdt_title; ?>" >
                                            <span class="ProductMenuCaption"> <i class="fa fa-caret-right"> </i> <?= $pdt_title; ?> </span>
                                        </a>
                                    </li>
                                </ul>
                                <?php
                                    endforeach;
                                else:
                                       Erro("Ainda Não Existe Produtos Cadastrados. Por favor, volte mais tarde!", E_USER_NOTICE);
                                endif;
                                ?>
                            </li>
                        </ul>
                    </li>
                <?php endif;?>

                <?php
                $Read->FullRead("SELECT page_title, page_name FROM " . DB_PAGES . " WHERE page_status = 1 ORDER BY page_order ASC, page_name ASC");
                if ($Read->getResult()):
                    foreach ($Read->getResult() as $NavPage):
                        echo "<li><a title='{$NavPage['page_title']}' href='" . BASE . "/{$NavPage['page_name']}'>{$NavPage['page_title']}</a></li>";
                    endforeach;
                endif;
                ?>
                <li><a title="Fale Conosco" class="jwc_contact" href="#">Fale Conosco</a></li>
            </ul>
              <?php require_once 'cart_mobile.php';?>
        </div>
        <!--/.nav-collapse -->

    </div>
    <!--/.container -->

    <div class="search-full text-right"> <a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>
        <div class="searchInputBox pull-right">
            <input type="search"  data-searchurl="search?=" name="q" placeholder="start typing and hit enter to search" class="search-input">
            <button class="btn-nobg search-btn" type="submit"> <i class="fa fa-search"> </i> </button>
        </div>
    </div>
    <!--/.search-full-->

</div>