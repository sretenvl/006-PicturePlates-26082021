$(document).ready(function(){
	$('#logIn').click(function(){
		$('#LI').css("display", "block").animate({opacity : 1}, 1000);
	});
	$('#signIn').click(function(){
		$('#SI').css("display", "block").animate({opacity : 1}, 1000);
	});
	$("#cart").click(function(){
		$('#cartW').css("display", "block").animate({opacity : 1}, 1000);
	});
	$("#dodajProizvod").click(function(){
		$('#dodavanjeProizvodaProizvod').css("display", "block").animate({opacity : 1}, 1000);
	});
	$("#dodajProizvod").click(function(){
		$('#dodavanjeProizvodaProizvod').css("display", "block").animate({opacity : 1}, 1000);
	});
	$('#pozadinaAdd').click(function(){
		$('#drzacAdm').animate({opacity : 0}, 1000, function(){$(this).css("display", "none")});
	});
	$('#pozadinaUpdate').click(function(){
		$('#updejtProizvodaProizvod').animate({opacity : 0}, 1000, function(){$(this).css("display", "none")});
	});
	$('#pozadinaC').click(function(){
		$('#cartW').animate({opacity : 0}, 1000, function(){$(this).css("display", "none")});
	});
	$('#LI form button').hover(function(){
		$(this).css("background-color" , "#878484")
	},
	function(){
		$(this).css("background-color" , "#6A6A6A")
	});
	$('#SI form button').hover(function(){
		$(this).css("background-color" , "#878484")
	},
	function(){
		$(this).css("background-color" , "#6A6A6A")
	});
});