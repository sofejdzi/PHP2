<?php
    require_once "../../config/connection.php";
    session_start();    
    header('Content-Type: application/json');

    if(isset($_POST['idLampe'])){
       
        $naziv = $_POST['naziv'];
        $id = $_POST['idLampe'];
        $cena=$_POST['cena'];

        $query = "UPDATE lampe SET naziv=:naziv, cena=:cena WHERE idLampe=:idLampe";
        
        try {
            require_once "../functions.php";
            $priprema = $conn->prepare($query);
            $priprema->bindParam(":naziv", $naziv);
            $priprema->bindParam(":cena", $cena);
            $priprema->bindParam(":idLampe", $id);
            $rezultat = $priprema->execute();
            
            if($rezultat){
                $query = "SELECT * from lampe LIMIT 10";
                $proizvodi = $conn->query($query);
                http_response_code(200);
                echo json_encode($proizvodi->fetchAll());
            }
            http_response_code(202); 

        }
        catch(PDOException $ex){
            echo json_encode(['poruka'=> 'Problem sa bazom: ' . $ex->getMessage()]);
            http_response_code(500);
        }
    } else {
        http_response_code(400);
    }
?>