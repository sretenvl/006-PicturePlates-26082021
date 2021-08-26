
<div id = "proizvodiW">
	<div id = "selectori">
		<div id = "prikaz">
			<div id = "manjePrikaz"><i class = "fas fa-th-large"></i></div>
			<div id = "vecePrikaz"><i class="fas fa-th"></i></div>
		</div>
		<div id = "tipProizvoda"></div>
		<button id = "sortirajRastuce">Sortiraj sve proizvode po rastućoj ceni</button>
		<button id = "sortirajOpadajuce">Sortiraj sve proizvode po opadajućoj ceni</button>
		<button id = "sortirajImeRastuce">Sortiraj sva imena proizvoda - rastuće</button>
		<button id = "sortirajImeOpadajuce">Sortiraj sva imena proizvoda - opadajuće</button>
	</div>
	<div id = "proizvodi"></div>
</div>

$(document).ready(function(){
	$("#vracanjePocetak").hover(
	function(){
		$("#vracanjePocetak").css("opacity",0.9);
	},
	function(){
		$("#vracanjePocetak").css("opacity",1);
	});
	$("#vracanjePocetak").click(function(){
		$(window).scrollTop(0);
	});
});

function validate(){

  //document.getElementById("cpr").innerHTML = "dobar dan";
  var ime = document.getElementById("ime").value;
  var email = document.getElementById("email").value;
  var predmet = document.getElementById("predmet").value;
  var poruka = document.getElementById("poruka").value;
  var tIme = /^([A-Z][a-z]{2,9})$/;
  var tEmail = /^[\w]+[\.\_\-\w]*\@[\w]+([\.][\w]+)+$/;
  var greske = [];
  if(tIme.test(ime) == false){
    greske.push("Ime");
    document.querySelector("#ime").style.border = "1px solid red";
  }
  else
  {
    document.getElementById("ime").style.border="1px solid green";
  }
  if(tEmail.test(email) == false){
    greske.push("email");
    document.querySelector("#email").style.border = "1px solid red";
  }
  else
  {
    document.getElementById("email").style.border="1px solid green";
  }

  if(poruka == ""){
    greske.push("poruka");
    document.querySelector("#poruka").style.border = "1px solid red";
  }
  else
  {
    document.getElementById("poruka").style.border="1px solid green";
  }
  if(greske.length==0)
  {
    alert("Vasa poruka je uspesno poslata.");
  }
}


$errors = [];
        $errLog = fopen("../assets/log/greskaLog.txt", 'ab1');
        if(!isset($username)){
            $errors[] = "Neuspešan updejt polja.";
        }
        if(!isset($password)){
            $errors[] = "Neuspešan updejt polja.";
        }
        if(!isset($email)){
            $errors[] = "Neuspešan updejt polja.";
        }
        if(count($errors)>0){
            $errorsLog = "Failed log attempt" . date("d/m/Y") . "\n". $errors[0]; 
            fwrite($errLog, $errorsLog);
            fclose($errLog);
            $_SESSION['greske'] = $errors;
            header("Location: ../index.php?provera=radi");
        }


        <?php
    if(isset($_GET['promena'])){
        $promena = $_GET['promena'];
            switch($promena){
                case "update":
                    include "views/update.php";
                    break;
                case "updateProizvod":
                    include "views/updateProizvod.php";
                    break;
                case "addProizvod":
                    include "views/addProizvod.php";
                    break;
            }
    }
?>

$upitCenaMax = "SELECT cena FROM posteri";
    $sveCene = $konekcija->query($upitCenaMax)->fetchAll();
    $maxCena = 0;
    $sveCene.forEach($c => {
        if($maxCena < ${c.cena}{
            $maxCena == ${c.cena};
        }
    }
    var_dump($maxCena);

    $universityIndex = 
$university =
$city =
$description =

$upitProizvodi = "SELECT count(*) AS broj FROM posteri";
    $strane = $konekcija->prepare($upitProizvodi);
    $strane->bindParam(":idU", $_SESSION['username']);
    $strane->execute();
    $brStrana = $strane->fetch();
    $brProizvodaNaStrani = 3;
    $brLinkova = ceil($brStrana->broj/$brProizvodaNaStrani);
    $trenutnaStrana = isset($_GET['page']) ? $_GET['page']:2;
    $kolko = $brProizvodaNaStrani * ($trenutnaStrana - 1);
    

    $upitProizvodi = "SELECT count(*) AS broj FROM users";
    $strane = $konekcija->prepare($upitProizvodi);
    $strane->bindParam(":idU", $_SESSION['username']);
    $strane->execute();
    $brStrana = $strane->fetch();
    $brProizvodaNaStrani = 3;
    $brLinkova = ceil($brStrana->broj/$brProizvodaNaStrani);
    $trenutnaStrana = isset($_GET['page']) ? $_GET['page']:2;
    $kolko = $brProizvodaNaStrani * ($trenutnaStrana - 1);


    $str = mb_convert_encoding($str, "Windows-1250");


    
   function downloadAuthor($dir){
    $data = "KRISTINA NANUSESKI 3/18\n\n
    I'm a twenty-something web developer, a level thirty-six Pokemon trainer and a
   somewhat proud mother of two dumb dogs and an annoying cat.\n
    I enjoy making websites and I'm currently studying at the ICT College of Vocational
   Studies in Belgrade. I like working as a team member as well as independently; a team
   leader and a team player. I am curious and constantly learning.";
    $word= new COM("word.application") or die("Unable to create Word document");
    $word->Visible = 0;
    $word->Documents->Add();
    //$word->Selection->Font->Name = 'Garamond';
    $word->Selection->Font->Size = 13;
    $word->Selection->TypeText("$data");
    //("authorKN318.doc");
    $strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"])));
    if(file_exists($strPath."/../../data/"."authorKN318.doc")){
    unlink($strPath."/../../data/"."authorKN318.doc");
    }
    //}
    $word->Documents[1]->SaveAs($strPath."/../../data/"."authorKN318.doc");
    $word->quit();
   }
   

   <?php
 require "../../config/connection.php";
 require "../functions.php";
 if($_GET['data']=='excel'){

 $field = getColumnsIngredients();
 $data = all('ingredients');
 $timestamp = time();
 $filename = 'ingredientsKN318' . $timestamp . '.xls';
 header("Content-Type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=\"$filename\"");
 foreach($field as $d)
 echo $d->COLUMN_NAME."\t";
 echo "\n";
 foreach($data as $d)
 echo $d->id."\t".$d->name."\t".$d->description."\n";

 exit();
 /* host ne pronalazi COM klasu
 $dir = "ingredients.xls";
 header("Content-Type: application/xls");
 makeExcelFile($dir);
 header("Content-Disposition: attachment; filename=ingredients.xls");
 echo file_get_contents("../../data/ingredients.xsl");
 */
 }
 elseif($_GET['data']=='word'){

 $timestamp = time();
 $filename = 'documentKN318' . $timestamp . '.doc';
 header("Content-type: application/vnd.ms-word");
 header("Content-Disposition: attachment; filename=\"$filename\"");
 echo "Kristina Nanuseski 3/18 \n";
 echo "I'm a twenty-something web developer, a level thirty-six Pokémon trainer
and a somewhat proud mother of two dumb dogs and an annoying cat.\n
 I enjoy making websites and I'm currently studying at the ICT College of
Vocational Studies in Belgrade. I like working as a team member as well as
independently; a team leader and a team player. I am curious and constantly learning.";

 exit();
 /*
 $dir = "authorKN318.doc";
 header("Content-type: application/vnd.ms-word");
 downloadAuthor($dir);
 header("Content-Disposition: attachment;Filename=authorKN318.doc");
 echo file_get_contents("../../data/authorKN318.doc");*/
 }
 else{
 e


 <textarea rows = "5" cols = "40" name = "poruka">Unesite poruku ovde...</textarea>
            <br/>
            <input type = "submit" id = "porukaPosalji" name = "posalji"/>

  <div id = "drzacInfoSLika" class = "drzacGlavniDeo">
  <div class = "drzacInfoTekst">
  </div>
</div>





$url = $data[0];
$url = explode("?", $url);
$mainUrl = $url[0];
$visited = explode("/", $mainUrl);
$index = $visited[count($visited)-1];
if($index != "index.php"){
continue;
}
if(count($url)==1){ 
$mainPages["home"]++;
$total++;
}
else{
$page = $url[1]; 
$page = explode("&", $page)[0]; 
$page = explode("=", $page); 
if($page[0]=="page" && count($page)>1 ){
if(array_key_exists($page[1], $mainPages)){
$mainPages[$page[1]]++;
$total++;
if(inTheLast24H($data[1]))
$mainPages24[$page[1]]++;
}
}
}
}
$logins = loggedInToday();
$registeredUsers = registeredusers();
$totalOrders = totalOrders();
$stats= ["overallViews" => $mainPages, "todayViews" => $mainPages24, "todayLogin"=>
$logins, "registeredUsers" => $registeredUsers, "totalOrders" => $totalOrders];
echo json_encode($stats);