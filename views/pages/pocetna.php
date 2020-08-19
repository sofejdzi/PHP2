


	<!-- Slider -->

	<div class="main_slider" style="background-image:url(images/slider.jpg)">
		
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/uvled.jpg)">
						<div class="banner_category">
							<a href="index.php?page=shop">UV/LED</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/led.jpg)">
					<div class="banner_category">
							<a href="index.php?page=shop">LED</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/uv.jpg)">
						<div class="banner_category">
							<a href="index.php?page=shop">UV</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	


	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Najprodavaniji proizvodi</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

							<!-- Slide 1 -->

							<!-- Slide 1 -->
							<?php
										// include "models/functions.php";
									$linkovi = dohvati_sve_lampe();
									foreach($linkovi as $link):
            						?>
							<div class="owl-item product_slider_item" id="<?= $link->idLampe?>">
								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="<?= $link->src?>" alt="<?= $link->alt?>">
										</div>
										<div class="product_info">
											<h6 class="product_name"><a href="index.php?page=shop"><?= $link->naziv?></a></h6>
											<div class="product_price"><?= $link->cena?></div>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Besplatna dostava</h6>
							<p>Vise od 3 proizvoda</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Najbolji na Internetu</h6>
							<p>Odmah saljemo proizvode</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>45 dana provera</h6>
							<p>Isprobajte da li odgovaraju</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>Svaki dan otvoreno</h6>
							<p>08 - 20h</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->


	