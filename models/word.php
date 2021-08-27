<?php 
require_once "../config/connection.php";
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Author12317.doc");
$author=$konekcija->query("SELECT * FROM author")->fetch();
echo "Fullname: $author->fullName, $author->universityIndex  \n University: $author->university  \n City: $author->city \n About me: $author->description";
exit();

/*$author=$konekcija->query("SELECT * FROM author")->fetch();
$word= new COM("Word.Application") or die("Unable to create Word document");
$word->Visible = true;
$word->Documents->Add();
$wordTekst = mb_convert_encoding("Fullname: $author->fullName, $author->universityIndex  \n University: $author->university  \n City: $author->city \n About me: $author->description", "ISO-8859-2");
$word->Selection->TypeText($wordTekst);
$strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"])));
if(file_exists($strPath."/../../data/"."Autor12317.doc")){
    unlink($strPath."/../../data/"."Autor12317.doc");
}
$word->Documents[1]->SaveAs($strPath."/../../data/"."Author12317.doc");
$word->quit();
header("Location: ../index.php"); 