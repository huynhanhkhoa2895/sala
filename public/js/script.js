$(document).ready(function(){

})
function handleClickSendEmailContact(){
    $(".send-success-message").show();
    $(".send-success .input-group").hide();
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