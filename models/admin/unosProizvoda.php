<?php
if(isset($_POST["btnInsert"])){
    require_once "../../config/connection.php";
	$naziv = $_POST["naslov"];
    $kategorijaId = $_POST["ddlKat"];
    $cena = $_POST["tekst"];
    
    $slika = $_FILES["slika"];
    $slikaName = $_FILES["slika"]["name"];
    $slikaTmpName = $_FILES["slika"]["tmp_name"];
    $slikaSize = $_FILES["slika"]["size"];
    $slikaType = $_FILES["slika"]["type"];

    $slikaExp = explode('.', $slikaName);
    $slikaEkstenzija = strtolower(end($slikaExp));
    
    $dozvoljeno = array('jpg', 'jpeg', 'png');



    $validno = true;


    if(!in_array($slikaEkstenzija, $dozvoljeno)){
        $validno=false;
    }
	if(empty($naziv)){
		$validno = false;
	}
	
	if(empty($kategorijaId)){
		$validno = false;
	}
	if(empty($cena)){
		$validno = false;
    }
    
	if($validno){
        
       
        list($sirina,$visina) = getimagesize($slikaTmpName);
        
        $novaVisina=1486;
        $novaSirina=1200;
        if($slikaEkstenzija == "jpg"){
            $postojecaSlika = imagecreatefromjpeg($slikaTmpName);
            
        }
        if($slikaEkstenzija == "jpeg"){
            $postojecaSlika = imagecreatefromjpeg($slikaTmpName);
        }
        if($slikaEkstenzija == "png"){
            $postojecaSlika = imagecreatefrompng($slikaTmpName);
        }
        
        $praznaSlika = imagecreatetruecolor($novaSirina, $novaVisina);
       
        imagecopyresampled($praznaSlika,$postojecaSlika,0,0,0,0,$novaSirina,$novaVisina,$sirina,$visina);
        $novaSlika = $praznaSlika;
        
        $putanjaNovaSlika = "../../images/".$slikaName;
        
        if($slikaEkstenzija == "jpg"){
            imagejpeg($novaSlika,$putanjaNovaSlika,75);
        }
        if($slikaEkstenzija == "jpeg"){
            imagejpeg($novaSlika,$putanjaNovaSlika,75);
        }
        if($slikaEkstenzija == "png"){
            imagepng($novaSlika,$putanjaNovaSlika);
        }
        imagedestroy($slikaTmpName);
        $slikaZaUpis = "images/".$slikaName;

        
        
        $upitImg="INSERT INTO slike(src, alt) VALUES(:src, :alt)";
        $pripremaImg=$connection->prepare($upitImg);
        $pripremaImg->bindParam(":src", $putanjaNovaSlika);
        $pripremaImg->bindParam(":alt", $naziv);
        try{
            $pripremaImg->execute();
            $slikaZaUpis=$connection->lastInsertId();

            $upit="INSERT INTO lampe (naziv, cena, id_slika, id_kategorija)
            VALUES (:naziv, :cena, :slika, :kategorijaId)";
        
            $priprema = $conn->prepare($upit);
            $priprema->bindParam(':naziv', $naziv);
			$priprema->bindParam(':slika', $slikaZaUpis);
			$priprema->bindParam(':kategorijaId', $kategorijaId);
			$priprema->bindParam(':cena', $cena);
			$rezultat = $priprema->execute();
			
        }catch(PDOException $e){
			
			http_response_code(500);
            echo "Greska ".$e->getMessage();
        }
		
	}
}
header("Location: " . $_SERVER['HTTP_REFERER']);
?>