$(document).ready(function(){
    let param = coverQueryParamToJson();
    if(param['color'] != null) $("#select-color").val(param['color'])
    if(param['price'] != null) $("#select-price").val(param['price'])
    $('.product-list-kind-item').on("mouseenter",function(){
        if($(this).hasClass("no-bg")){
            $(this).removeClass("no-bg");
        }
    })
    $('.product-list-kind-item').on("mouseleave",function(){
        if(!$(this).hasClass("no-bg")){
            $(this).addClass("no-bg");
        }
    })
    $("#search").on("keyup",function(e){
        if(e.keyCode === 13){
            searchKey($(this).val())
        }
    })
    $("#select-color").on("change",function(){
        param['color'] = $(this).val()
        if($(this).val() == 0) delete param['color']
        document.location.href = window.location.origin+"/search?"+$.param(param);
    })
    $("#select-price").on("change",function(){
        param['price'] = $(this).val()
        if($(this).val() == 0) delete param['price']
        document.location.href = window.location.origin+"/search?"+$.param(param);
    })
    
})
function coverQueryParamToJson(){
    let search = location.search.substring(1);
    return search != null && search != "" ? JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}') : {}
}
function searchKey(val){
    document.location.href = window.location.origin+"/search?slug="+val;
}
function handleClickSendEmailContact(){
    $(".send-success-message").show();
    $(".send-success .input-group").hide();
}
function changeQty(it,type){
    let input = $(it).closest(".input-group").find("input");
    let val = $(it).closest(".input-group").find("input").val();
    if(type === "plus"){
        $(input).val(Number(val)+1)
    }else{
        if(val <= 1){
            $(input).val(1)
        }else{
            $(input).val(Number(val)-1)
        }
    }
}
function addToCart(id){
    const url = window.location.origin+"/cart/add";
    const cart = $(".product-content-container-item .product-update")
    const qty = $(cart).find(".qty-input").val();
    $.ajax({
        url: url,
        method : "post",
        type: "post",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {id : id,qty : qty},
        success: function(){
            window.location.reload();
        }
    })
}