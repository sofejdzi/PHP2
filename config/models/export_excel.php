<?php
require_once "../config/connection.php";
include "functions.php";

$kategorije = dohvati_sve("kategorije");

if(!class_exists('COM')){
    throw new ErrorException('COM class is not enable');
}

$excel = new COM("Excel.Application");

$excel->Visible = 1;

$excel->DisplayAlerts = 1;

$workbook = $excel->Workbooks->Open("http://localhost/Lamp-Shop/models/kategorije.xlsx") or die('Did not open filename');

$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;

$br = 1;
foreach($kategorije as $k){
    $polje = $sheet->Range("A{$br}");
    $polje->activate;
    $polje->value = $k->idKategorije;

    $polje = $sheet->Range("B{$br}");
    $polje->activate;
    $polje->value = $k->naziv;

    $br++;
}

$polje = $sheet->Range("E{$br}");
$polje->activate;
$polje->value = count($kategorije);

$workbook->_SaveAs("http://localhost/Lamp-Shop/models/kategorije.xlsx", -4143);
$workbook->Save();

$workbook->Saved=true;
$workbook->Close;

$excel->Workbooks->Close();
$excel->Quit();

unset($sheet);
unset($workbook);
unset($excel);