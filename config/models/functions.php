<?php
function  dohvati_sve_kategorije(){
    return executeQuery("SELECT * FROM kategorije");
}
    function dohvati_navigacioni_meni(){
        return executeQuery("SELECT * FROM meni");
    }
    function dohvati_admin_meni(){
        return executeQuery("SELECT * FROM adminmeni");
    }
    function dohvati_glavni(){
        return executeQuery("SELECT * FROM uloguj");
    }
    function registracija_korisnika($ime,$prezime,$email,$lozinka){
        $lozinka = md5($lozinka);
        global $conn;
            $upit = "INSERT INTO korisnici(ime, prezime, email, lozinka) VALUES (:ime, :prezime, :email, :lozinka)";
            
            $stmt = $conn->prepare($upit);
            $stmt ->bindParam(":ime",$ime);
            $stmt ->bindParam(":prezime",$prezime);
            $stmt ->bindParam(":email",$email);
            $stmt ->bindParam(":lozinka",$lozinka);

           $rez= $stmt->execute();
           return $rez;
    }
    function logovanje_korisnika($email,$lozinka){
    $lozinka=md5($lozinka);
            global $conn;
            $upit="SELECT * FROM korisnici k INNER JOIN uloge u ON k.idUloga=u.idUloga WHERE email=:email AND lozinka=:password ";

            $stmt=$conn->prepare($upit);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":password",$lozinka);

            $stmt->execute();
            $user = $stmt->fetch();
            return $user;
    }

    function  dohvati_sve_lampe(){
        return executeQuery("SELECT * FROM lampe l INNER JOIN slike s ON l.idSlike = s.idSlika");
    }
    
    function dohvati_lampeKategorija($id){
        global $conn;
        try{
            $select = $conn->prepare("SELECT * FROM lampe l INNER JOIN slike s ON l.idSlike = s.idSlika INNER JOIN kategorije k ON l.idKategorije = k.idKategorije WHERE k.idKategorije=:id ");
    
    
            $select->bindParam(":id",$id); 
    
            $select->execute(); 
    
            $lamp = $select->fetchAll();
    
            return $lamp;
        }
        catch(PDOException $ex){
            return null;
        }
    }

    function dohvati_sve($tabela){
        return executeQuery("SELECT * FROM $tabela");
    }
    
    function dohvati_jedan_zapis($tabela,$kolona,$id){
        global $conn;
        $upit="SELECT * FROM $tabela WHERE $kolona = ?" ;

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$id);
        
        $stmt->execute();
        $rez = $stmt->fetch();
        return $rez;
        
    }
    function edit_kategorije($naziv, $id){
        global $conn;
        $upit="UPDATE kategorije SET naziv = ? WHERE idKategorije=?" ;

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$naziv);
        $stmt->bindValue(2,$id);
        
        $rez = $stmt->execute();
        return $rez;
        
    }

    function brisanje_jednog_zapisa($tabela,$kolona,$id){
        global $conn;
        $upit="DELETE FROM $tabela WHERE $kolona = ?";

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$id);

        $rez = $stmt->execute();
        return $rez;
    }
   
//SLIKE
function getOne($id){
    global $conn;
    $result = $conn->prepare("SELECT * FROM slike WHERE id = ?");
    $result->execute([$id]);
    return $result->fetch();
}

function insert($putanjaOriginalnaSlika, $putanjaNovaSlika){
   
    global $conn; 
    $insert = $conn->prepare("INSERT INTO slike VALUES('', ?, ?)");
    $isInserted = $insert->execute([$putanjaOriginalnaSlika, $putanjaNovaSlika]);
    $last_id = $conn->lastInsertId();

    return $last_id;
}

function upis_proizvoda($naziv,$cena,$idKat,$idS){
        global $conn;
        $upit="INSERT INTO lampe(naziv,cena,idKategorije,idSlike) VALUES (?,?,?,?)";

        $stmt=$conn->prepare($upit);
        $stmt->bindValue(1,$naziv);
        $stmt->bindValue(2,$cena);
        $stmt->bindValue(3,$idKat);
        $stmt->bindValue(4,$idS);

        $rez = $stmt->execute();
        return $rez;
        
}


define("LAMP_OFFSET", 3);
function get_num_of_lamp(){
    return executeQueryOneRow("SELECT COUNT(*) AS num_of_lamp FROM lampe");
}

function get_pagination_count(){
    $result = get_num_of_lamp();
    $num_of_lamp = $result->num_of_lamp;

    return ceil($num_of_lamp / LAMP_OFFSET);
}
 

function dohvati_lampe($limit = 0){
    global $conn;
    try{
        $select = $conn->prepare("SELECT * FROM lampe l INNER JOIN slike s ON l.idSlike = s.idSlika LIMIT :limit, :offset");

        $limit = ((int) $limit) * LAMP_OFFSET;

        $select->bindParam(":limit", $limit, PDO::PARAM_INT); 

        $offset = LAMP_OFFSET;
        $select->bindParam(":offset", $offset, PDO::PARAM_INT);

        $select->execute(); 

        $lamp = $select->fetchAll();

        return $lamp;
    }
    catch(PDOException $ex){
        return null;
    }
}


?>