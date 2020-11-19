<div class="header">
    <div class="row">
        <div class="col-md-2 col-xs-3 text-center">
            <a href="{{url("/")}}">
                <img src="{{asset("logo.png")}}" width="150px" />
            </a>
        </div>
        <div class="col-md-10 col-xs-9">
            <div class="row">
                <div class="col-md-7">
                    <div class="header-box">
                        <div class="name-company">CÔNG TY TNHH IN BAO BÌ SALA THIỆP CƯỚI SALA</div>
                        <div class="info">79 Đông Hưng Thuận 05, Phường Tân Hưng Thuận, Quận 12, Tp.HCM</div>
                        <div class="info">0333.135.735 - 0907.000.008</div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="header-box-info">
                        <div class="row justify-content-end" style="margin-top: 10px">
                            <div class="col">
                                <div class="wrapper-search">
                                    <div class="wrapper-icon">
                                        <div class="icon">
                                            <span class="fas fa-phone fa-2x"></span>
                                        </div>
                                        <div class="icon-content" style="left: 25px;min-width: 130px">Liên hệ ngay</div>
                                    </div>
                                    <div class="wrapper-icon wrapper-cart-header">
                                        <div class="icon">
                                            <span class="fas fa-shopping-cart fa-2x"></span>
                                        </div>
                                        <div class="icon-content" style="left: 25px;min-width: 100px">Giỏ hàng</div>
                                        @if(session()->has('cart'))
                                            <div class="wrapper-cart-header-popup">
                                                @foreach(session()->get("cart") as $cart)
                                                    <div class="cart-header-popup-item">
                                                        <div class="cart-header-popup-item-img">
                                                            <div class="img-popup-cart" style="background-image: url({{asset("img/product/".$cart['img'])}});">

                                                            </div>
                                                        </div>
                                                        <div class="cart-header-popup-item-content">
                                                            <div class="name">{{$cart['name']}}</div>
                                                            <div class="price">{{number_format($cart['price'])}} VND</div>
                                                            <div class="qty">Số lượng: <b>{{number_format($cart['qty'])}}</b></div>
                                                            <div class="total">Thành tiền: <b>{{number_format($cart['qty']*$cart['price'])}} VND</b></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="cart-header-popup-footer">
                                                    <a href="{{url("cart/checkout")}}">Thanh toán</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row" style="padding-top: 30px">
                                    <div class="col-12 pd0">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control sala-input" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-main" id="basic-addon2"><span class="fas fa-search color-w"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 15px 0 15px 0;">
                <div class="col-12">
                    <h3>THIỆP CƯỚI ĐẸP - GIÁ RẺ - CHẤT LƯỢNG</h3>
                </div>
            </div>
        </div>
    </div>
</div>
