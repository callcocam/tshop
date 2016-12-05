
<footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-3 col-sm-4 col-xs-6">
                    <h3> Support </h3>
                    <ul>
                        <li class="supportLi">
                            <p> Lorem ipsum dolor sit amet, consectetur </p>
                            <h4> <a class="inline" href="callto:+<?= SITE_ADDR_PHONE_A; ?>"> <strong> <i class="fa fa-phone"> </i> <?= SITE_ADDR_PHONE_A; ?> </strong> </a> </h4>
                            <h4> <a class="inline" href="mailto:<?= SITE_ADDR_EMAIL; ?>"> <i class="fa fa-envelope-o"> </i> <?= SITE_ADDR_EMAIL; ?> </a> </h4>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Shop </h3>
                    <ul>
                        <li> <a href="index.html"> Home </a> </li>
                        <li> <a href="category.html"> Category </a> </li>
                        <li> <a href="sub-category.html"> Sub Category </a> </li>
                        <li> <a href="product-details.html"> Product Details </a> </li>
                        <li> <a href="product-details-style2.html"> Product Details Version 2 </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Information </h3>
                    <ul>
                        <li> <a href="cart.html"> Cart </a> </li>
                        <li> <a href="about-us.html"> About us </a> </li>
                        <li> <a href="about-us-2.html"> About us 2 </a> </li>
                        <li> <a href="contact-us.html"> Contact us </a> </li>
                        <li> <a href="contact-us-2.html"> Contact us 2 </a> </li>
                        <li> <a href="terms-conditions.html"> Terms &amp; Conditions </a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> My Account </h3>
                    <ul>
                        <li> <a href="account-1.html"> Account Login </a> </li>
                        <li> <a href="account.html"> My Account </a> </li>
                        <li> <a href="my-address.html"> My Address </a> </li>
                        <li> <a href="wishlist.html"> Wisth list </a> </li>
                        <li> <a href="order-list.html"> Order list </a> </li>
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                    <h3> Stay in touch </h3>
                    <ul>
                        <li>
                            <div class="input-append newsLatterBox text-center">
                                <input type="text" class="full text-center"  placeholder="Email ">
                                <button class="btn  bg-gray" type="button"> Subscribe <i class="fa fa-long-arrow-right"> </i> </button>
                            </div>
                        </li>
                    </ul>
                    <ul class="social">
                       <?php if (SITE_SOCIAL_FB):?>
                         <li> <a target="_blank" href="https://www.facebook.com/<?=SITE_SOCIAL_FB_PAGE;?>" title="No Facebook"> <i class=" fa fa-facebook"> &nbsp; </i> </a> </li>
                    <?php endif;

                    if (SITE_SOCIAL_TWITTER):?>
                     <li> <a target="_blank" href="https://www.twitter.com/<?=SITE_SOCIAL_TWITTER;?>" title="No Twitter"> <i class="fa fa-twitter"> &nbsp; </i> </a> </li>
                   <?php endif;

                    if (SITE_SOCIAL_GOOGLE):?>
                    <li> <a target="_blank" href="https://plus.google.com/<?=SITE_SOCIAL_GOOGLE_PAGE;?>" title="No Google Plus"> <i class="fa fa-google-plus"> &nbsp; </i> </a> </li>
                    <?php endif;
                    if (SITE_SOCIAL_YOUTUBE):?>
                        <li> <a target="_blank" href="https://www.youtube.com/user/<?=SITE_SOCIAL_YOUTUBE;?>" title="No YouTube"> <i class="fa fa-youtube"> &nbsp; </i> </a> </li>
                    <?php endif; ?>
                </ul>
            </div>
                       
                    </ul>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> &copy; TSHOP 2014. All right reserved. </p>
            <div class="pull-right paymentMethodImg"> <img height="30" class="pull-right" src="images/site/payment/master_card.png" alt="img" > <img height="30" class="pull-right" src="images/site/payment/paypal.png" alt="img" > <img height="30" class="pull-right" src="images/site/payment/american_express_card.png" alt="img" > <img  height="30" class="pull-right" src="images/site/payment/discover_network_card.png" alt="img" > <img  height="30" class="pull-right" src="images/site/payment/google_wallet.png" alt="img" > </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>