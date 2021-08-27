//var brUlaza = 0;
//var brGresaka = 0;
//var brUspesnihLog = 0;
var brojAdm = 0;
var brLogovan = 0;
var brGost = 0;
var brProizvod = 0;
$.ajax({
    url: "models/adminStatistika.php",
    method: "GET",
    dataType: "JSON",
    success: function(data){
        console.log(data);
        //brGresaka = parseInt(data.brojGresaka);
        //brUlaza = parseInt(data.brojUkupnihUcitavanja);
        //brUspesnihLog = parseInt(data.brojUspesnihLogovanja);
        
        brojAdm = parseInt(data.brojAdm);
        brLogovan = parseInt(data.brojLog);
        brGost = parseInt(data.brojGost);
        brProizvod = parseInt(data.brojProizvod);
    },
    error : function(xhr, error, status) {
        alert(status);
    }
});
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Task', 'Hours per Day'],
['Admin Panel', brojAdm],
['Glavnoj stranici logovan', brLogovan],
['Glavnoj stranici ne logovan', brGost],
['Stranici proizvoda', brProizvod]
]);

// Optional; add a title and set the width and height of the chart
var options = {'title':'Broj logova po fajlu', 'width':550, 'height':400};

// Display the chart inside the <div> element with id="piechart"
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
chart.draw(data, options);
}
