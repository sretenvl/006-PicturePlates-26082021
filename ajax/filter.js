$(document).ready(function(){

    function filter_data()
    {
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var naziv = get_filter('naziv');
        console.log(maximum_price);
        ajaxBuild(minimum_price, maximum_price, naziv);
    }

    function ajaxBuild(minp, maxp, n){
        $.ajax({
            url:"models/fetch_data.php",
            method:"POST",
            data:{
                minimum_price:minp,
                maximum_price:maxp, 
                naziv:n
            },
            success:function(data){
                $('.filter_data').html($(data).val());
            },
            error:function(xhr,status,error){
                alert(error);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.opcijaTipa').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:0,
        max:5000,
        values:[0, 5000],
        step:100,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });


    filter_data();

});