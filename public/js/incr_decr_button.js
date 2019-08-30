function validate_quanity(){
    var counter = $("#quanity").numbersOnly(val());
    var max_quanity =100;
    var min_quanity =1;
    //Check invalid number
    if ($.isNumeric(counter))
    {
        if(counter > max_quanity)
        {
            $("#quanity").val(max_quanity);
        }
        else if (counter < min_quanity)
        {
            $("#quanity").val(min_quanity);
        }
        else
        {
            $("#quanity").val();
        }
    }
    else
    {
        $("#quanity").val(min_quanity);
    }
}

function check_incr(){
    var counter = parseInt($("#quanity").val());
    var max_quanity =100;
    var min_quanity =1;

    if(counter >= min_quanity && counter < max_quanity){
        counter = ++counter;
        $("#quanity").val(counter);
    }
    else if(counter < min_quanity)
    {
        $("#quanity").val(min_quanity + 1);
    }
    else
    {
        $("#quanity").val(max_quanity);
    }
}

function check_decr(){
    var counter = parseInt($("#quanity").val());
    var max_quanity =100;
    var min_quanity =1;

    if(counter > min_quanity && counter <= max_quanity)
    {
        counter = --counter;
        $("#quanity").val(counter);
    }
    else if(counter > max_quanity)
    {
        $("#quanity").val(max_quanity -1);
    }
    else{
        $("#quanity").val(min_quanity);
    }
}

$("#quanity").blur(validate_quanity);
$("#increase").mousedown(function(e) {
    e.preventDefault();
    check_incr();
});

$("#decrease").mousedown(function(e){
    e.preventDefault();
    check_decr();
});