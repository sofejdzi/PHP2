<?php
session_start();
    require_once "config/connection.php";
    include "views/fixed/head.php";
    include "views/fixed/header.php";


if(isset($_GET['page'])){
    switch($_GET['page'])
    {
    case 'pocetna':
        include "views/pages/pocetna.php";
        break;
    case 'shop': 
            include "views/pages/shop.php";
            break;
    case 'contact': 
            include "views/pages/contact.php";
            break;
    case 'logovanje': 
        include "views/pages/logovanje.php";
        break;
    case 'registracija': 
        include "views/pages/registracija.php";
        break;
    case 'korpa': 
        include "views/pages/cart.php";
        break;
    case 'autor': 
        include "views/pages/autor.php";
        break;
    case 'admin': 
        include "views/admin/adminProizvodi.php";
        break;
      
    }
  } else {
    include "views/pages/pocetna.php";
  }
        include "views/fixed/footer.php";
?>