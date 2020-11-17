@inject('home', 'App\Http\Controllers\Fontend\Home')
<?php 
    $style = $home->getListStyle();
?>
<div class="header-menu">
    <div class="row">
        <div class="col">
            <a href="{{url("/")}}">TRANG CHỦ</a>
        </div>
        <div class="col">
            <a href="#intro">GIỚI THIỆU</a>
        </div>
        <div class="col">
            <div class="header-menu-list pd0">
                <a href="#">CÁC LOẠI THIỆP</a>
                <ul class="header-menu-list-child">
                    @foreach ($style as $item)
                        <li><a href="#">{{$item->content}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col">
            <a href="#news">TIN TỨC</a>
        </div>
        <div class="col">
            <a href="#footer">LIÊN HỆ</a>
        </div>
    </div>
</div>
