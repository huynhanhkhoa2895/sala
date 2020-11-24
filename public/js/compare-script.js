$(document).ready(function(){
    $("#select-compare").on("change",function(){
        let val = $(this).val()
        $.ajax({
            method : "get",
            type: "get",
            url: document.location.origin+"/compare/ajax",
            data: {id : val},
            success: function(kq){
                $(".ajax-compare-product").html(kq)
            }
        })
    })
})