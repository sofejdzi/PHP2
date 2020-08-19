

	<div class="fs_menu_overlay"></div>

<!-- Hamburger Menu -->


<div class="container contact_container">
    <!-- Contact Us -->

    <div class="row">
        <div class="col-lg-6 get_in_touch_col">
            <div class="get_in_touch_contents">
                <h1>Uloguj se!</h1>
                <?php
                            if(isset($_SESSION['greskeLogovanje'])){
                                foreach($_SESSION['greskeLogovanje'] as $g){
                                    echo "<p>$g</p>";
                                }
                                unset($_SESSION['greskeLogovanje']);
                                // var_dump( $_SESSION['greskeLogovanje']);
                            }
                            if(isset($_SESSION['greskeUser'])){
                                echo $_SESSION['greskeUser'];
                                unset($_SESSION['greskeUser']);
                                // var_dump( $_SESSION['greskeLogovanje']);
                            }
                        ?>
                <form action="models/log.php" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Unesite e-mail...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="password" class="form-control span2" id="inputPassword" name="password" placeholder="Unesite lozinku...">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button id="review_submit" type="submit" class="red_button message_submit_btn trans_300 shopBtn"  name="prijaviSe">Ulogujte se</button>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                    <h4>Newsletter</h4>
                    <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="post">
                    <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                        <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                        <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

