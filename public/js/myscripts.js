/**
 * Created by ejay010 on 3/17/15.
 */
/**
$(document).ready(function(){
    $("#addToCart").click(function(){
        event.preventDefault();
        var url = window.location;
        var bookdata = {id: $('input[name=id]').val(), _token: $('meta[name=_TOKEN]').attr('content')};
        $.ajax({
            method: "POST",
            url: url + "/addToCart",
            data: bookdata,
            success: function(response){
                $('#myCartLink').css("display", "inline").fadeIn().delay(2000);
                $('#myCartValue').text("My Cart (" + response + ")");
            }
        });
    });
});
 */