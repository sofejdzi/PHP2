<?php

require_once "config.php";

zabeleziPristupStranici();

try {
    $conn = new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}

function executeQuery($query){
    global $conn;
    return $conn->query($query)->fetchAll();
}
function executeQueryOneRow($query){
    global $conn;
    return $conn->query($query)->fetch();
}
function zabeleziPristupStranici(){
    $open = fopen(LOG_FAJL, "a");
    if($open){
        $date = date('d-m-Y H:i:s');
        fwrite($open, "{$_SERVER['PHP_SELF']}\t{$date}\t{$_SERVER['REMOTE_ADDR']}\t\n");
        fclose($open);
    }
}
function zabeleziGreske($data){
    $file = fopen(ERROR_FAJL, "a");
    $write = "";
    for($i=0; $i<count($data); $i++){
        $write.="{$data[$i]}\n";
    }
    if($file){
        fwrite($file, $write);
        fclose($file);
    }
}
