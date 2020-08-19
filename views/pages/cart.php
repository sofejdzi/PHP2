
	<div class="fs_menu_overlay"></div>

<!-- Hamburger Menu -->


<div class="container contact_container">
    

    <!-- Map Container -->

    <div class="row">
        <div class="col">
        <?php
if(!isset($_SESSION['korisnik'])){
	echo "Nemate pristup ovoj stranici.";
}
else{
	$upit = "SELECT * FROM korpa k JOIN lampe l ON k.idLampe = l.idLampe WHERE idKorisnik = :idK AND marker = 0";
	$stmt = $conn->prepare($upit);
	$stmt->bindParam(":idK",$_SESSION['korisnik']->idKorisnik);
	$stmt->execute();
	$rez = $stmt->fetchAll();
	if($rez){
			?>
            <table class="table table-bordered table-condensed korpa">
              <thead>
                <tr>
                  <th>Redni broj</th>
                  <th>Slika</th>
				 					<th>	Naziv </th>
                  <th>Cena</th>
								</tr>
              </thead>
              <tbody>
		<?php
		$redniBroj = 1;
		$suma = 0;
		foreach($rez as $r){
			?>
						<tr>
                  <td><?=$redniBroj?></td>
                  <td><img src="<?=$r->src?>" alt="<?=$r->alt?>"></td>
                  <td> <?=$r->naziv?> </td>
                  <td><?=$r->cena?></td>
						</tr>
						
						<?php
						$redniBroj++;
						
						@$suma += $r->cena;
		}
	
	
           ?>   
					 <tr>
                     <form method="POST" action="models/obradaKorpe.php">
							<td colspan="2"><button type="submit" name="potvrda" id="potvrda" value="Potvrdi kupovinu" class="btn btn-primary">Potvrdi kupovinu </td>
							<td><button type="submit" id="odustani" name="odustani" value="Odustani od kupovine" class="btn btn-primary">Odustani od kupovine</button></td>
							<td><?=$suma?>$</td>					 
					 	</form>
					 </tr>  
				</tbody>
                        </table>
                        <?php
					}
					else{
						echo "Trenutno nema proizvoda.";
					}
}

?>
						<br/>
        </div>
    </div>

</div>



