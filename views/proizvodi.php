<?php
    include "models/proizvodi.php";
    $upitVelicina = "SELECT idVelicine, velicina FROM velicina";
    $velicine = $konekcija->query($upitVelicina)->fetchAll();
?>


<div id = "drzacProizvoda">
<div id = "proizvodiW" class = "row">
        <div id = "selectori" class = "col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <h2>Filters</h2>
            <div id = "tipProizvoda" class = "col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>
                <div id = "ceneProizvoda">
                <form action="#" method="GET">
                    <i class="icon-eur"></i><lable> Cena u opsegu</lable>
                    <input type = "range" min = "0" max ="5000" value = "0" id = "cenaOpseg"/>
                    <span id = "trenutnaCena">0</span>

                </form>
                <div id="cardCont">
                    <i class="icon-resize-vertical"></i><lable> Izaberite velicine:</lable>
                    <br/>
                    <form action="#">
                        <?php
                            foreach($velicine as $velicina):
                        ?>
                        <div class = "row proveraCheckW">
                            <input type="checkbox" class = "filterVelicine" name="<?=$velicina->velicina?>" value="<?=$velicina->idVelicine?>">
                            <span class = "cenaLable"> <?=$velicina->velicina?></span><br>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </form> 
                </div>
            </div>
            <div id = "selekcijaKartica">
                <i class="icon-sort"></i><lable> Sortirajte po:</lable>
                <br/>
                <br/>
                <select id='proizvodDropSort' class = "col-12 col-sm-12 col-mg-12 col-lg-12 col-xl-12">
                    <option value='1'>Sortiraj proizvode po rastućoj ceni</option>
                    <option value='2'>Sortiraj proizvode po opadajućoj ceni</option>
                    <option value='3'>Sortiraj imena proizvoda - rastuće</option>
                    <option value='4'>Sortiraj imena proizvoda - opadajuće</option>
                </select>
            </div>
        </div>
        <div class="drzac col-12 col-sm-12 col-mg-12 col-lg-9 col-xl-9" id = "drzacKartice">
            <div id = "proizvodi" class = "row"></div>
            <div id = "proizvodPaginacija"></div>
        </div>
    </div>
</div>
<script src = "assets/js/jsonProizvodi.js"></script>
