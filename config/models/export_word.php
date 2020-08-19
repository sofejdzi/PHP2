<?php

    $word = new COM("Word.Application");
    $word->Visible = true;
    
    $word->Documents->Add();
    $word->Selection->TypeText("Sofija Stolić
    Godina rođenja: 12.07.1996.
    Škola: Visoka ICT škola
    Smer:Internet Tehnologije, modul Web Programiranje
    Broj indeksa: 339/17");
    header("Location: " . $_SERVER['HTTP_REFERER']);


?>