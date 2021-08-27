<div id = "glavnaPDrzac">
  <div id = "podlogaDB">
    <h2>ODABERITE METALNI POSTER ZA VAS RADNI ILI ŽIVOTNI PROSTOR</h2>
    <a href = "#proizvodi"><div id = "dugmeDB">ISTRAŽITE</div></a>
  </div>
</div>

<?php
  if(isset($_SESSION['USERAKT'])){
    if($_SESSION['USERAKT'] == 2){
      include "views/proizvodi.php";
    }
    else{
      include "views/inicijalnaStrana.php";
    }
  }
  else{
    include "views/inicijalnaStrana.php";
  }
?>