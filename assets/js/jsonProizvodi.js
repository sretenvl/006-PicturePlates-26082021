window.onload = function(){
    proizvodi();
	dohvatiSveProizvode();
    listaProizvoda();
    document.getElementById("cenaOpseg").addEventListener("change", function(){
        filtriranjeCene(this.value);
        $("#trenutnaCena").html(this.value);
    });
    $(".filterVelicine ").click(function(){
        if(this.checked){
            filtrirajPoVeliciniDodaj(this.value);
        }else{
            filtrirajPoVeliciniObrisi(this.value);
        }
    });
};
var nizPrikazanihProizvoda = [];
var nizVelicinaPostera = [];
var nizTipaPostera = [];
var brojProizvodaKojisePrikazuju = 8;

var paginacija = 1;
let currentURL = new URLSearchParams(window.location.search);
if(currentURL.get('pages') == null){
    paginacija = 1;
}
else{
    paginacija = parseInt(currentURL.get('pages'));
}

//ISPISIVANJE DROPDOWN LISTE MARKI
function proizvodi(){
    $.ajax({
        url : "assets/log/proizvodi.json",
        method : "GET",
        type : "json",
        success : function(tipP) {
            let select = "<select id='proizvodDrop'>";

            for(let m of tipP) {
                select += `<option value='${m.marka}'>${m.marka}</option>`;
            }
            select += `</select>
            <input type = "text" id = "searchFiltera"/>`;
            document.querySelector("#tipProizvoda").innerHTML = select;
            document.getElementById("proizvodDrop").addEventListener("change", function(){
                filtrirajPoTipu(this.value);
            });
            document.getElementById("searchFiltera").addEventListener("change", function(){
                filtrirajSearch(this.value);
            });
            document.getElementById("proizvodDropSort").addEventListener("change", function(){
                if(this.value == 1){
                    sortirajSveRastuce();
                }
                else if(this.value == 2){
                    sortirajSveOpadajuce();
                }
                else if(this.value == 3){
                    sortirajImeRastuce();
                }
                else if(this.value == 4){
                    sortirajImeOpadajuce();
                }
            });
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

function listaProizvoda(){
    $.ajax({
        url : "assets/log/proizvodi.json",
        method : "GET",
        type : "json",
        success : function(data) {
            nizPrikazanihProizvoda = data;
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}


//FILTRIRANJE PO VELICINI
function filtrirajPoVeliciniDodaj(vrednost){
    $.ajax({
        url: "assets/log/proizvodi.json",
        method: "GET",
        type : "json",
        success:function(data){
            nizVelicinaPostera.push(vrednost);
            nizPrikazanihProizvoda = [];
            data.forEach(proizvod => {
                nizVelicinaPostera.forEach(tip => {
                    if(proizvod.velicina == tip){
                        nizPrikazanihProizvoda.push(proizvod);
                    }
                });
            });
            prikaziProizvode(nizPrikazanihProizvoda);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

function filtrirajPoVeliciniObrisi(vrednost){
    $.ajax({
        url: "assets/log/proizvodi.json",
        method: "GET",
        type : "json",
        success:function(data){
            let i = 0;
            nizVelicinaPostera.forEach(tip => {
                i += 1;
                if(vrednost == tip){
                    nizVelicinaPostera.splice(i-1 , 1);
                }
            })
            nizPrikazanihProizvoda = [];
            data.forEach(proizvod => {
                nizVelicinaPostera.forEach(tip => {
                    if(proizvod.velicina == tip){
                        nizPrikazanihProizvoda.push(proizvod);
                    }
                });
            });
            prikaziProizvode(nizPrikazanihProizvoda);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

//FILTRIRAJ PO SEARCH BARU
function filtrirajSearch(vrednost) {
    $.ajax({
        url : "assets/log/proizvodi.json",
        method : "GET",
        type : "json",
        success : function(data) {
            let pretrazeniProizvodi = [];
            data.forEach(proizvod => {
                if(proizvod.naziv.indexOf(vrednost) == 0){
                    pretrazeniProizvodi.push(proizvod);
                }
            });
            if(pretrazeniProizvodi == []){
                prikaziProizvode(data);
            }
            else{
                prikaziProizvode(pretrazeniProizvodi);
            }
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

//FILTRIRANJE PO MARKI
function filtrirajPoTipu(vrednost) {
    $.ajax({
        url : "assets/log/proizvodi.json",
        method : "GET",
        type : "json",
        success : function(data) {
            let izabranaMarka = vrednost;
            nizPrikazanihProizvoda = [];

            if(izabranaMarka != '0'){
                data.forEach(proizvod => {
                    if(proizvod.marka == izabranaMarka){
                        nizPrikazanihProizvoda.push(proizvod);
                    }
                });
            }
            else { 
                nizPrikazanihProizvoda = data;
                dohvatiSveProizvode();
            }
            prikaziProizvode(nizPrikazanihProizvoda);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

//FILTRIRANJE CENE
function filtriranjeCene(cenaMax){
    $.ajax({
        url : "assets/log/proizvodi.json",
        method : "GET",
        type : "json",
        success : function(data){
            nizPrikazanihProizvoda = [];
            if(cenaMax != '0'){
                data.forEach(proizvod => {
                    if(proizvod.cena <= cenaMax){
                        nizPrikazanihProizvoda.push(proizvod);
                    }
                });
            }
            else { 
                nizPrikazanihProizvoda = [];
            }
            if(cenaMax <= '1000'){
                nizPrikazanihProizvoda = [];
            }
            prikaziProizvode(nizPrikazanihProizvoda);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

//OSNOVNO SORTIRANJE PO CENI OD MANJE KA VECE
function sortirajSveRastuce() {
    let tempNiz = nizPrikazanihProizvoda;
    tempNiz.sort((a,b) => {
        if(a.cena == b.cena)
            return 0;
        return a.cena < b.cena ? -1 : 1;
    });
    prikaziProizvode(tempNiz);
}

//OSNOVNO SORTIRANJE PO CENI OD VECE KA MANJE
function sortirajSveOpadajuce() {
    let tempNiz = nizPrikazanihProizvoda;
    tempNiz.sort((a,b) => {
        if(a.cena == b.cena)
            return 0;
        return a.cena > b.cena ? -1 : 1;
    });
    prikaziProizvode(tempNiz);
}


//OSNOVNO SORTIRANJE A-Z
function sortirajImeRastuce() {
    let tempNiz = nizPrikazanihProizvoda;
    tempNiz.sort((a,b) => {
        if(a.naziv == b.naziv)
            return 0;
        return a.naziv < b.naziv ? -1 : 1;
    });
    prikaziProizvode(tempNiz);
}

//OSNOVNO SORTIRANJE Z-A
function sortirajImeOpadajuce() {
    let tempNiz = nizPrikazanihProizvoda;
    tempNiz.sort((a,b) => {
        if(a.naziv == b.naziv)
            return 0;
        return a.naziv > b.naziv ? -1 : 1;
    });
    prikaziProizvode(tempNiz);
}

//ISPISUJE SVE PROIZVODE
function dohvatiSveProizvode() {
    $.ajax({
        url : "assets/log/proizvodi.json",
        method : "GET",
        type : "json",
        success : function(data) {
            prikaziProizvode(data);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

//PROIZVODI ISPIS
function prikaziProizvode(products) {
    
    document.querySelector("#proizvodi").innerHTML = pripremiDiv();
    document.querySelector("#proizvodPaginacija").innerHTML = paginacijaDiv();

    $(".drzacSlike img").hover(function(){
        $(this).animate({width : '100%'}, 800);
    },
    function(){
        $(this).animate({width : '80%'}, 800);
    });
    $(".buttonKupi").hover(function(){
        $(this).css({"color": "black",
            "background-color": "darkgreen",
            "box-shadow": "3px 5px 4px #888888"
        });
    },
    function(){
        $(this).css({"background-color":"#009344",
            "color":"white",
            "box-shadow": "none"
        });
    });
    $(".logStartDiv").click(function(){
		$('#LI').css("display", "block").animate({opacity : 1}, 1000);
	});

    function pripremiDiv() {
        let html = "";
        let offset = (paginacija - 1) * brojProizvodaKojisePrikazuju;
        let brojPostera = products.length;
        let final = [];
        for(let i = 0; i < brojPostera; i++){
            if((i >= offset)&&(i <= offset + brojProizvodaKojisePrikazuju)){
                final.push(products[i]);
            }
        }
        final.forEach(p => {
            html +=
            `<div id="cardCont">
                <div class="card ">
                    <a class = "linkSlike" href = "index.php?proizvodID=${p.idP}">
                        <img src=${p.slika} alt=${p.altSlike}>
                    </a>
                    <div class="card__details">
                        <div class="name">${p.naziv}</div>
                        <p class = "cena">Cena:${p.cena} RSD</p>
                        <div class="cenaW">
                            <a href = "models/dodavanjeCart.php?idP=${p.idP}&cartDodavanje=1" type="button" class = "buttonKupi">KUPI</a>
                        </div> 
                    </div>
                </div>
            </div>`;
        });
        return html;
    }

    function paginacijaDiv(){
        let html = "";
        let brojac = Math.ceil(products.length / brojProizvodaKojisePrikazuju);
        let brojPostera = products.length;
        for(let i = 1; i <= brojac; i++){
            html += `<a class = "linkPagProizvoda" href = "index.php?pages=${i}">${i}</a>`;
        }
        return html;
    }
}