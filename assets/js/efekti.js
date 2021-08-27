$(document).ready(function(){
	$(".linkL").hover(function(){
		$(this).css({"background-color":"silver", "color":"black"});
	},
	function(){
		$(this).css({"background-color":"white", "color":"black"});
	});
	$(".donjiML").hover(function(){
		$(this).css("background-color" , "darkgray");
	},
	function(){
		$(this).css("background-color" , "silver");
	});
	$(".dugmeSort").hover(function(){
		$(this).css("background-color", "silver");
	},
	function(){
		$(this).css("background-color", "#e6e7e8");
	});
	$("#podlogaDB a").hover(function(){
		$("#dugmeDB").css({"background-color":"#e6e7e8", "color":"black", "font-weight":"bold"});
	},
	function(){
		$("#dugmeDB").css({"background-color":"transparent", "color":"white", "font-weight":"normal"});
	});
	$(".dugmeAdm").hover(function(){
		$(this).css({"background-color" : "#009344", "color" : "black"});
	},
	function(){
		$(this).css({"background-color" : "#009344", "color" : "white"});
	});
	$("#dodajProizvod").hover(function(){
		$(this).css({"background-color" : "#E6E7E8", "color" : "black"});
	},
	function(){
		$(this).css({"background-color" : "#A1A4A6", "color" : "white"});
	});
	$('.admPozadina').click(function(){
		$('#dodavanjeProizvodaProizvod').animate({opacity : 0}, 1000, function(){$(this).css("display", "none")});
	});
	$('#pozadinaL').click(function(){
		$('#LI').animate({opacity : 0}, 1000, function(){$(this).css("display", "none")});
	});
	$('#pozadinaS').click(function(){
		$('#SI').animate({opacity : 0}, 1000, function(){$(this).css("display", "none")});
	});
	$('#pozadinaPD').click(function(){
		$('#proizvodiPrikazProzor').animate({opacity : 0}, 1000, function(){$(this).css("display", "none")});
	});
	$(".linkCart").hover(function(){
		$(this).css({"background-color" : "green", "color" : "white"});
	},
	function(){
		$(this).css({"background-color" : "#e6e7e8", "color" : "black"});
	});
	$("#porukaPosalji").hover(function(){
		$(this).css({"background-color" : "#e6e7e8", "color" : "white"});
	},
	function(){
		$(this).css({"background-color" : "#888888", "color" : "black"});
	});
	$("#proizvodiPrikazProzor a").hover(function(){
		$(this).css({"background-color" : "darkgreen", "color" : "black"});
	},
	function(){
		$(this).css({"background-color" : "#009344", "color" : "white"});
	});
	$(window).scroll(function(){
		if($(this).scrollTop() > 100){
			$("#donjiNav").addClass("zalepljen");
		} else if($(this).scrollTop() <= 100) {
			$("#donjiNav").removeClass("zalepljen");
		}
	});
});