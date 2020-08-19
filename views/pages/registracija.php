
	<div class="fs_menu_overlay"></div>

<!-- Hamburger Menu -->



<div class="container contact_container">
    


    <!-- Contact Us -->

    <div class="row">

        <div class="col-lg-6 get_in_touch_col">
            <div class="get_in_touch_contents">
                <h1>Registrujte se ovde!</h1>
               
                <?php
                    if(isset($_SESSION['greskeRegistracija'])){
                    foreach($_SESSION['greskeRegistracija'] as $g){
                    echo "<p>$g</p>";
                    }
                    unset($_SESSION['greskeRegistracija']);
                    // var_dump( $_SESSION['greskeRegistracija']);
                    }

                ?>

<form method="POST" action="models/reg.php">      
		            <h3>Vaše informacije:</h3>
		
                    <div>

                        <input type="text" id="tbName input_name" class="form-control form_input input_name input_ph"  name="tbName" placeholder="Ime">

                        <input type="text" id="tbLast input_name" class="form-control form_input input_name input_ph"  name="tbLast" placeholder="Prezime">

                        <input type="email" class="form-control form_input input_email input_ph" id="tbEmail input_email" name="tbEmail" placeholder="Email">
                        
                        <input type="password" class="form-control form_input input_ph" id="tbPassword" name="tbPassword" placeholder="Password">
                    </div>
                    <div>
                        <input type="submit" name="submitAccount" value="Registruj se" class="red_button message_submit_btn trans_300">
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

