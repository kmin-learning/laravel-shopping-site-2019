function validate_quantity(){
    var counter = $("#quantity").val();
    var max_quantity =100;
    var min_quantity =1;
    //Check invalid number
    if ($.isNumeric(counter))
    {
        if(counter > max_quantity)
        {
            $("#quantity").val(max_quantity);
        }
        else if (counter < min_quantity)
        {
            $("#quantity").val(min_quantity);
        }
        else
        {
            $("#quantity").val();
        }
    }
    else
    {
        $("#quantity").val(min_quantity);
    }
}

function check_incr(){
    var counter = parseInt($("#quantity").val());
    var max_quantity =100;
    var min_quantity =1;

    if(counter >= min_quantity && counter < max_quantity){
        counter = ++counter;
        $("#quantity").val(counter);
    }
    else if(counter < min_quantity)
    {
        $("#quantity").val(min_quantity + 1);
    }
    else
    {
        $("#quantity").val(max_quantity);
    }
}

function check_decr(){
    var counter = parseInt($("#quantity").val());
    var max_quantity =100;
    var min_quantity =1;

    if(counter > min_quantity && counter <= max_quantity)
    {
        counter = --counter;
        $("#quantity").val(counter);
    }
    else if(counter > max_quantity)
    {
        $("#quantity").val(max_quantity -1);
    }
    else{
        $("#quantity").val(min_quantity);
    }
}

$("#quantity").blur(validate_quantity);
$("#increase").mousedown(function(e){ 
    e.preventDefault();
    check_incr();
});

$("#decrease").mousedown( function(e){
    e.preventDefault();
    check_decr();
});