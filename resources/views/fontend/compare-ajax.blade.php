<div class="img-product">
    <a href="{{url("thiep/".$product->slug)}}">
        <img src="{{asset("img/product/".$product->image)}}" alt="{{$product->name}}" />
    </a>
</div>
<div class="content-product">
    <div class="product-name"><a href="{{url("thiep/".$product->slug)}}">{{$product->name}}</a></div>
    <div class="product-price">{{number_format($product->price)}} VND</div>
    <div class="product-style"></div>
</div>