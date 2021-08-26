<div id = "opisBlok" class = "drzacGlavniDeo row">
    <div id = "blok1" class = "col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
    </div>
    <div id = "tekstBlok1" class = "col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <h4>Sta je a Picture Plates?</h4>
        <p>Picture Plates je jedinstveni metalni poster dizajniran da uhvati vaše jedinstvene strasti. Napravili smo platno 21. vijeka koje je čvrsto, na magnet postavljeno i dovoljno izdržljivo da izdrži cijeli život intenzivnog zurenja. Ali buljenje je samo pola zabave! Možete ih prilagoditi, sakupljati i preuređivati po želji - potrebno je samo 20 sekundi da ih postavite bez električnih alata, bez oštećenja ili frustracija. Sada samo naprijed i potražite svog sljedećeg cimera među našim jedinstvenim i licenciranim umjetničkim djelima!</p>
    </div>
</div>

<div id = "karticeDrzac" class = "drzacGlavniDeo row">
    <div class = "opisDeo col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
        <img class = "slikeOpis" src = "assets/images/cena.png" alt = "cene"/>
        <h4>Dobre cene za svakog</h4>
        <span>Imamo postere za bilo kakav budžet</span>
    </div>
    <div class = "opisDeo col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
        <img class = "slikeOpis" src = "assets/images/dostava.png" alt = "dostava"/>
        <h4>Jeftina i brza dostava</h4>
        <span>Brza dostava na sve proizvode</span>
    </div>
    <div class = "opisDeo col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
        <img class = "slikeOpis" src = "assets/images/kvalitet.png" alt = "kvalitet"/>
        <h4>Odličan kvalitet</h4>
        <span>Potvrđeni kvalitet</span>
    </div>
    <div class = "opisDeo col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
        <img class = "slikeOpis" src = "assets/images/selekcija.png" alt = "selekcija"/>
        <h4>Odlična selekcija</h4>
        <span>Imamo sve na jednom mestu.</span>
    </div>
</div>



<div id = "porukeBlok" class = "drzacGlavniDeo row">
    <div class = "col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h4 id = "naslovPorukeBloka">Pošaljite pitanja</h4>
        <form action = "#" method = "POST">
            <div class="row justify-content-center">
                <div class="col-md-6 col-md-offset-3">
                    <input id="email" placeholder="Email" class="form-control">
                    <input id="subject" placeholder="Subject" class="form-control">
                    <textarea class="form-control" id="body" placeholder="Email Body"></textarea>
                    <input type="button" id = "porukaPosalji" onclick="sendEmail()" value="Send An Email">
                </div>
            </div>
        </form>
    </div>
</div>


<?php
    include "views/spisakProizvoda.php";
?>
<script src = "assets/js/mailer.js"></script>