function auto_fill() {
    var data_search = $("#search").val();
    console.log(data_search);
    if(data_search !='')
    {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "http://localhost:8000/auto_fill",
            method: "POST",
            data: {data_search:data_search, _token:_token}
        })
        .done(function(data){
            $("#suggestion_box").show();
			$("#suggestion_box").html(data);
			$("#search").css("background","#FFF");
                //alert(data);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // If fail
            alert(errorThrown);
        });
    }
}

function hide_suggestion_box(data) {
        $("#search").val(data);
        $("#suggestion_box").css('display','none');
}
function erase_suggestion_box(){
    $("#suggestion_box").css('display','none');
}
$("#search").keyup(auto_fill);
$(document).on("click",erase_suggestion_box);
