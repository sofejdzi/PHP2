
	<div class="fs_menu_overlay"></div>

<!-- Hamburger Menu -->


<div class="container contact_container">
    


    <!-- Contact Us -->

    <div class="row">

        <div class="col-lg-6 contact_col">
            <div class="contact_contents">
                <h1>Kontaktirajte nas</h1>
                <div>
                    <p>064/1234567</p>
                    <p>sofija.stolic.339.17@ict.edu.rs</p>
                </div>
                <div>
                    <p>Radno vreme: 8.00-20.00 Pon-Pet</p>
                    <p>Nedelja: Zatvoreno</p>
                </div>
            </div>

            <!-- Follow Us -->

            <div class="follow_us_contents">
                <h1>Follow Us</h1>
                <ul class="social d-flex flex-row">
                    <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>

        </div>

        
        <!-- Contact Form -->
        <div class="col-lg-6 get_in_touch_col">
            <div class="get_in_touch_contents">
            <?php if(isset($_SESSION['korisnik'])){ ?>
                <form action="#" method="POST" id="contactForm">
                    <div>
                        <input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="Ime i prezime" required="required" data-error="Name is required.">
                        <input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="Email" required="required" data-error="Valid email is required.">
                        <textarea id="input_message" class="input_ph input_message" name="message"  placeholder="Poruka" rows="3" required data-error="Please, write us a message."></textarea>
                    </div>
                    <div>
                        <button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Pošalji poruku</button>
                    </div>
                </form>
                <?php } else{?>
				<p>Morate biti ulogovani da biste nas kontaktirali.</p>
			<?php } ?>
            </div>
        </div>

    </div>
</div>
<!--<script src="js/contact.js"></script>-->



