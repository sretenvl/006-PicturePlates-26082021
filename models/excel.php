<?php
    include_once "../config/connection.php";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=proizvodi.xls");
    $query="SELECT p.idP AS idP, p.naziv AS naziv, p.opis AS opis, p.cena AS cena, v.velicina AS velicina FROM posteri AS p INNER JOIN velicina AS v ON
    p.velicina = v.idVelicine";
    $posteri=$konekcija->query($query)->fetchAll();
    foreach($posteri as $poster)
        echo $poster->idP."\t".$poster->naziv."\t".$poster->cena."\t".$poster->opis. "\t" . $poster->velicina ."\n";
    exit();

//     try{
        
//         $query="SELECT * FROM posteri";
//         $result=$konekcija->query($query)->fetchAll();
//         echo json_encode($result);
        
//         $excel = new COM("Excel.Application") or die('Did not open filename');
        
//         // Da bi se fizički videlo otvaranje fajla 
//         $excel->Visible = 1;
        
//         // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
//         $excel->DisplayAlerts = 1;
        
//         // Otvaranje Excel fajla
//         $workbook = $excel->Workbooks->Add();
        
//         // Otvaranje Sheet
//         $sheet = $workbook->Worksheets('Sheet1');
//         $sheet->activate;
        
//         $br = 1;
//         foreach($result as $poster){
//             // U A kolonu upisujemo ID
//             $polje = $sheet->Range("A{$br}");
//             $polje->activate;
//             $polje->value = $poster->idP;
        
//             // U B kolonu upisujemo TITLE
//             $polje = $sheet->Range("B{$br}");
//             $polje->activate;
//             $polje->value = $poster->naziv;
        
//             // U C kolonu upisujemo DESCRIPTION
//             $polje = $sheet->Range("C{$br}");
//             $polje->activate;
//             $polje->value = $poster->cena;
        
//             // U D kolonu upisujemo TRAILER
//             $polje = $sheet->Range("D{$br}");
//             $polje->activate;
//             $polje->value = $poster->opis;
//             $br++;
//         }
 
//         // Cuvanje promena u fajla
//         $workbook->_SaveAs("D:\\menu_items.xls", -4143);
//         $workbook->Save();
        
//         // Zatvaranje Excel fajla
//         $workbook->Saved=true;
//         $workbook->Close;
        
//         $excel->Workbooks->Close();
//         $excel->Quit();
        
//         unset($sheet);
//         unset($workbook);
//         unset($excel);
//         header("Location:../index.php");
        
//         }
//         catch(COMException $ex){
//            echo $ex->getMessage();
//         }

// ?>