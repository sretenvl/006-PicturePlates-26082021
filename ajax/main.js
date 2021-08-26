$(document).ready(function(){

});
$(".update").hide();
$(".update-user").click(function(){
    $(".update").show();
    var idKor = $(this).data('id');

    $.ajax({
        method: "POST",
        url: "modules/ajax_get_user.php",
        dataType: "JSON",
        data:{
            id : idKor
        },
        success: function(podaci, status, jqXHR){
            console.log(jqXHR.status);
            $("#tbUser").val(podaci.username);
            $("#tbPass").val(podaci.password);
            $("#tbEmail").val(podaci.email);
        }
    })
})