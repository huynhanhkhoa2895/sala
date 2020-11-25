<div class="img-product">
    <a href="{{url("thiep/".$product->slug)}}" id="product-img-compare">
        <img src="{{asset("img/product/".$product->image)}}" alt="{{$product->name}}" />
    </a>
    <div class="product-img-zoom-container" id="product-img-zoom-container-compare"></div>
</div>
<div class="content-product">
    <div class="product-name"><a href="{{url("thiep/".$product->slug)}}">{{$product->name}}</a></div>
    <div class="product-price">{{number_format($product->price)}} VND</div>
    <div class="product-style"><i>{{$product->style_name}}</i></div>
</div>
<script>
    $(document).ready(function(){
        let width = $(document).width();
        var options = {
            width: ($(document).width() > 500 ? 500 : "100%"), // required
            zoomContainer: document.getElementById("product-img-zoom-container-compare"),
            // zoomPosition: 'left',
            zoomPosition: 'left',
        };
        new ImageZoom(document.getElementById("product-img-compare"), options);
    })

</script>