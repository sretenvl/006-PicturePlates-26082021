window.onload = function(){
    proizvodi();
	dohvatiSveProizvode();
    listaProizvoda();
    document.getElementById("dvekolona").addEventListener("click", function(){
        $(".proizvod").css("width", "50%");
    });
    document.getElementById("trikolona").addEventListener("click", function(){
        $(".proizvod").css("width", "33%");
    });
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
var brojProizvodaKojisePrikazuju = 7;

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
            let select = `
            <br/>
            <br/>
            <i class="icon-archive"></i><b> Izaberite tip proizvoda</b>
            <select id='proizvodDrop'>`;

            for(let m of tipP) {
                select += `<option value='${m.marka}'>${m.marka}</option>`;
            }
            select += `</select>
            <br/>
            <br/>
            <i class="icon-search"></i><b> Pretražite po imenu proizvoda</b>
            <input type = "text" id = "searchFiltera" placeholder = "Upisite ime proizvoda"/>`;
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
            dodajInicijalneProizvode(nizPrikazanihProizvoda);
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
            dodajInicijalneProizvode(nizPrikazanihProizvoda);
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
                dodajInicijalneProizvode(data);
            }
            else{
                dodajInicijalneProizvode(pretrazeniProizvodi);
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
            dodajInicijalneProizvode(nizPrikazanihProizvoda);
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
            dodajInicijalneProizvode(nizPrikazanihProizvoda);
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
    dodajInicijalneProizvode(tempNiz);
}

//OSNOVNO SORTIRANJE PO CENI OD VECE KA MANJE
function sortirajSveOpadajuce() {
    let tempNiz = nizPrikazanihProizvoda;
    tempNiz.sort((a,b) => {
        if(a.cena == b.cena)
            return 0;
        return a.cena > b.cena ? -1 : 1;
    });
    dodajInicijalneProizvode(tempNiz);
}

//OSNOVNO SORTIRANJE A-Z
function sortirajImeRastuce() {
    let tempNiz = nizPrikazanihProizvoda;
    tempNiz.sort((a,b) => {
        if(a.naziv == b.naziv)
            return 0;
        return a.naziv < b.naziv ? -1 : 1;
    });
    dodajInicijalneProizvode(tempNiz);
}

//OSNOVNO SORTIRANJE Z-A
function sortirajImeOpadajuce() {
    let tempNiz = nizPrikazanihProizvoda;
    tempNiz.sort((a,b) => {
        if(a.naziv == b.naziv)
            return 0;
        return a.naziv > b.naziv ? -1 : 1;
    });
    dodajInicijalneProizvode(tempNiz);
}

//ISPISUJE SVE PROIZVODE
function dohvatiSveProizvode() {
    $.ajax({
        url : "assets/log/proizvodi.json",
        method : "GET",
        type : "json",
        success : function(data) {
            dodajInicijalneProizvode(data);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

//PROIZVODI ISPIS
function dodajInicijalneProizvode(products){
    document.querySelector("#proizvodiZaPrikaz").innerHTML = pripremiDiv();
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
                    <img src=${p.slika} alt=${p.altSlike}>
                    <div class="card__details">
                        <div class="name">${p.naziv}</div>
                        <p class = "cena">Cena:${p.cena} RSD</p>
                        <div class="cenaW">
                            <a href = "#"  type="button" class = "buttonKupi logStartDiv">KUPI</a>
                        </div> 
                    </div>
                </div>
            </div>`
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