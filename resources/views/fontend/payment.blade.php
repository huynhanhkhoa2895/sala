@extends('layout.layout')
@section('css')
    <link href="{{asset("css/payment.css")}}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container">
        <div class="row" style="padding: 20px 0">
            <div class="col-12">
                <form action="{{route("post-checkout")}}" method="post">
                    {{ csrf_field() }}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                      <label>Họ và Tên</label>
                      <input name="name" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label >Số điện thoại</label>
                        <input name="phone" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label >Địa chỉ Nhận hàng</label>
                        <input name="address" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col pd0"><a style="color: #c8ad5b;padding-left: 0" href="{{url("cart/checkout")}}" class="btn btn-link"><span class="fas fa-arrow-left"></span> Quay về giỏ hàng</a></div>
                            <div class="col pd0 text-right"><button style="border-radius: 15px" type="submit" class="btn-payment">Thanh Toán</button></div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection