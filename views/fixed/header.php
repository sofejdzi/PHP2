<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">
								<li class="account">
										<?php
                                    		if(isset($_SESSION['korisnik'])):
                                		?>
                                		<a href="models/logout.php">Izloguj se</a>
                                		<?php endif; ?>
									<a href="index.php?page=logovanje">Uloguj se</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="index.php">lamp<span>shop</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
							
								<?php
                                    include "models/functions.php";
                                    $linkovi = dohvati_navigacioni_meni(1);
                                    if(isset($_SESSION['korisnik'])){

                                    }
                                    // if(isset($_SESSION['korisnik'])&& $_SESSION['korisnik']->idUloga==1){
                                    //     $linkovi = dohvati_glavni_navigacioni_meni(2);
    
                                    //     }
                                    foreach($linkovi as $link):
                                ?>
                                    <li><a href="<?= $link->href?>"><?= $link->naziv?></a></li>
                                    <?php endforeach; ?>
									<?php 
										if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->email==="admin@gmail.com"):?>
										<a href="index.php?page=admin">ADMIN PANEL</a> 
									<?php endif;?>
							</ul>
							
							<ul class="navbar_user">
								<li class="checkout">
								<?php
									if(isset($_SESSION['korisnik'])){
									$upitKorpa = "SELECT COUNT(idKorpa) as broj FROM korpa WHERE idKorisnik=:idK AND marker=0";
									$stmt = $conn->prepare($upitKorpa);
        							$stmt->bindParam(":idK",$_SESSION['korisnik']->idKorisnik);
									$stmt->execute();
									$rezkorpa = $stmt->fetch();
									?>
						 <a href="index.php?page=korpa">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
								<?=$rezkorpa->broj?>
						</a>

						<?php
						 }
						?>	
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>