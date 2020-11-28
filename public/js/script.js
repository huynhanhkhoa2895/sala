
var audio = document.getElementById("music");
// document.getElementById("music").autoplay
// document.getElementById('music').autoplay = true;
console.log(`audio`, $(audio))

$(document).ready(function () {
    audio.volume = 0.3;

    let param = coverQueryParamToJson();
    if (param['color'] != null) $("#select-color").val(param['color'])
    if (param['price'] != null) $("#select-price").val(param['price'])
    $('.product-list-kind-item').on("mouseenter", function () {
        if ($(this).hasClass("no-bg")) {
            $(this).removeClass("no-bg");
        }
    })
    $('.product-list-kind-item').on("mouseleave", function () {
        if (!$(this).hasClass("no-bg")) {
            $(this).addClass("no-bg");
        }
    })
    $("#search").on("keyup", function (e) {
        if (e.keyCode === 13) {
            searchKey($(this).val())
        }
    })
    $("#select-color").on("change", function () {
        param['color'] = $(this).val()
        if ($(this).val() == 0) delete param['color']
        document.location.href = window.location.origin + "/search?" + $.param(param);
    })
    $("#select-price").on("change", function () {
        param['price'] = $(this).val()
        if ($(this).val() == 0) delete param['price']
        document.location.href = window.location.origin + "/search?" + $.param(param);
    })

})
function coverQueryParamToJson() {
    let search = location.search.substring(1);
    return search == null || search == "" ? {} : JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"') + '"}')
}
function searchKey(val) {
    document.location.href = window.location.origin + "/search?slug=" + val;
}
function handleClickSendEmailContact() {
    $(".send-success-message").show();
    $(".send-success .input-group").hide();
}
function changeQty(it, type) {
    let input = $(it).closest(".input-group").find("input");
    let val = $(it).closest(".input-group").find("input").val();
    if (type === "plus") {
        $(input).val(Number(val) + 1)
    } else {
        if (val <= 1) {
            $(input).val(1)
        } else {
            $(input).val(Number(val) - 1)
        }
    }
    InputQtyHandleChange()
}
function addToCart(id) {
    const url = window.location.origin + "/cart/add";
    const cart = $(".product-content-container-item .product-update")
    const qty = $(cart).find(".qty-input").val();
    $.ajax({
        url: url,
        method: "post",
        type: "post",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { id: id, qty: qty },
        success: function () {
            window.location.reload();
        }
    })
}
function InputQtyHandleChange() {
    let val = $("#input-qty").val();
    if (isNaN(val)) {
        val = val.replace(/[^0-9]/g, "");
        $("#input-qty").val(val)
        InputQtyHandleChange();
    }else{
        let price = $("#price").data("price")

        $("#sub_price").html(number_format(Number(price) * Number(val)));
    }



}
function updateCart(it, id) {
    const url = window.location.origin + "/cart/update";
    const qty = $(it).closest(".product-update").find(".qty-input").val();
    if (isNaN(qty)) {
        alert("Ô nhập phải để số")
        return false
    } else {
        $.ajax({
            url: url,
            method: "put",
            type: "put",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: { id: id, qty: qty },
            success: function () {
                window.location.reload();
            }
        })
    }
}
function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
function toogleMusic() {
    if (audio.duration > 0 && !audio.paused) {
        audio.pause()

    } else {
        audio.play()
    }
}
function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}