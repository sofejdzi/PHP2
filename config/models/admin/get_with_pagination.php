<?php

header("Content-Type: application/json");

if(isset($_GET['limit'])){
    require_once "../../config/connection.php";
    include "../functions.php";

    $limit = $_GET['limit'];
    $lampe = dohvati_lampe($limit);
    $num_of_lamp = get_pagination_count();

    echo json_encode([
        "lampe" => $lampe,
        "num_of_lamp" => $num_of_lamp
    ]);
} else {
    echo json_encode(["message"=> "Limit not passed."]);
    http_response_code(400);
}