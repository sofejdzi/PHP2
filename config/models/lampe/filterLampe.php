<?php

header("Content-Type: application/json");

if(isset($_POST['id'])){
    require_once "../../config/connection.php";
    include "../functions.php";

    $id = $_POST['id'];
    if($id=="0"){
        $lampe = dohvati_sve_lampe();
    }
    else{
        $lampe = dohvati_lampeKategorija($id);
    }
    

    echo json_encode($lampe);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400);
}