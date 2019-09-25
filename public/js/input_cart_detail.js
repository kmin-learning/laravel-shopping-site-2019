function submit_input() {
    $("#form_cart").submit();
}

$("#input_quantity").blur(submit_input);
//$("#remove").click(submit_input);