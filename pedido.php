<?php
if (!APP_ORDERS):
    require REQUIRE_PATH . '/404.php';
else:
    ?>
    <div class="container">
        <div class="content">
            <?php require '_cdn/widgets/tshop/cart.php'; ?>
            <div class="clear"></div>
        </div>
    </div>
<?php
endif;