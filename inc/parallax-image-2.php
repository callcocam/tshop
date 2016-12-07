<?php
$Read->FullRead("SELECT cp_id, cp_title, cp_discount, cp_hits FROM " . DB_PDT_COUPONS . " WHERE cp_start <= NOW() AND cp_end >= NOW() AND cp_coupon = :cp", "cp=1");
if ($Read->getResult()):
  $Coupon = $Read->getResult()[0];
  $_SESSION['wc_cupom'] = $Coupon['cp_discount'];
  $_SESSION['wc_cupom_code'] = $POST['cupom_id'];
  $UpdateCupom = ['cp_hits' => $Coupon['cp_hits'] + 1];
  $Update->ExeUpdate(DB_PDT_COUPONS, $UpdateCupom, "WHERE cp_id = :cp", "cp={$Coupon['cp_id']}");
  $jSON['trigger'] = AjaxErro("Parabéns, o seu cupom <b>{$Coupon['cp_title']}</b> com <b>{$Coupon['cp_discount']}% de desconto</b> foi aplicado com sucesso :)");
?>
<div class="parallax-section parallax-image-2">
  <div class="w100 parallax-section-overley">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="parallax-content clearfix">
            <h1 class="xlarge"> Trusted Seller 500+ </h1>
            <h5 class="parallaxSubtitle"> Lorem ipsum dolor sit amet consectetuer </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif;