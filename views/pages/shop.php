

	<div class="fs_menu_overlay"></div>

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

			

				<!-- Sidebar -->

				<div class="sidebar">

				<!-- Categories -->
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Kategorije</h5>
						</div>
						<ul class="sidebar_categories">
						<li><a class="filtriranje" data-idFilter="0" href="#">SVE</a></li>
						<?php
							// include "models/functions.php";
							$linkovi = dohvati_sve_kategorije();
							foreach($linkovi as $link):
            			?>
								<li><a class="filtriranje" data-idFilter="<?= $link->idKategorije ?>" href="#" <?= $link->parametar?>><?= $link->naziv?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>

					<!-- Sort product -->
					<div class="sidebar_section">
						<select name="sortiranje" id="sortiranje" class="form_input">
							<option value="sort">- Sortiraj -</option>
							<option value="low-high">Cena: rastuće</option>
							<option value="high-low">Cena: opadajuće</option>
						</select>
					</div>

					<!-- Search product -->
					<div class="sidebar_section">
						<input type="search" name="pretraga" id="pretraga" placeholder="Pretraga" class="form_input">
						<input type="button" name="pretrazi" id="pretrazi" value="Pretraži" class="red_button message_submit_btn trans_300">
					</div>
				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row" id="listaLampi">
							<div class="col" >

								<!-- Product Grid -->
								
								<div class="product-grid" >

									<!-- Product 1 -->
									<?php
										// include "models/functions.php";
									$linkovi = dohvati_sve_lampe();
									foreach($linkovi as $link):
            						?>	
									<div class="product-item men" id="<?= $link->idLampe?>">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="<?= $link->src?>" alt="<?= $link->alt?>">
											</div>
											<div class=""></div>
											<div class="product_info">
												<h6 class="product_name"><a href="index.php?page=shop"><?= $link->naziv?></a></h6>
												<div class="product_price"><?= $link->cena?></div>
											</div>
										</div>
										<?php if(isset($_SESSION['korisnik'])):?>
										<div class="red_button add_to_cart_button">
											<a class="shopBtn korpa " data-id="<?= $link->idLampe?>" href="#">Dodaj u korpu</a>
										</div>
											<?php endif;?>
									</div>
									<?php endforeach; ?>

							</div>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	<!-- Pagination -->            
	<ul class="pagination m-auto" id="pagination">
			<?php
			$brojProizvoda = get_pagination_count();
			for($i = 0; $i < $brojProizvoda; $i++):
			?>
			<li class="page-item">
				<a href="#" class="lamp-pagination" data-limit="<?= $i ?>"><?= $i+1 ?></a> 
			</li>
			<?php endfor; ?>
		</ul>     
		<!--// Pagination --> 
		<script src="js/filter_sort.js"></script>



	

