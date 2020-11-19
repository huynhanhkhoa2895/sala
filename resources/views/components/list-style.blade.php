<div class="product-list-kind">
    <div class="row" style="margin-bottom: 20px">
        <div class="col">
            <div class="product-list-kind-header">
                DANH MỤC SẢN PHẨM
            </div>
        </div>
    </div>
    @foreach ($style as $item)
    <div class="row">
        <div class="col">
            <div class="product-list-kind-item no-bg" style="background-image: url({{asset("img/style/".$item->img)}});background-size: cover;background-position: center;">
                <a href={{url("danh-muc/".$item->id)}}>{{$item->content}}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>