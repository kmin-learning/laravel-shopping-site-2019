$(document).ready(function(){
    var counter =0;
    //$("#quanity").val(counter);
    //Increase quanities
    $("#increase").click(function(){
        counter = counter +1;
        $("#quanity").val(counter);
    });
    //Decrease quanities
    $("#decrease").click(function(){
        counter = counter-1;
        if(counter >0)
        {
            $("#quanity").val(counter);
        }
        else{
            counter =0;
            $("#quanity").val(counter);
        }
    });
});
