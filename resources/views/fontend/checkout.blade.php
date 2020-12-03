@extends('layout.layout')
@section('css')
    <link href="{{asset("css/checkout.css")}}" rel="stylesheet" />
@endsection
@section('content')
    @php
        $total = 0;
        $totalQty = 0;
    @endphp
    <div class="row" style="padding-top: 10px">
        <div class="col-12">
            @if (session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            @foreach($product as $item)
                @php
                    $total += $item->price*$qtys[$item->id];
                    $totalQty += $qtys[$item->id];
                @endphp
                <div class="row">
                    <div class="col-12 ">
                        <a class="product-image" href="{{url("thiep/".$item->slug)}}">
                            <img src="{{asset("img/product/".$item->image)}}" alt="{{$item->name}}" />
                        </a>
                        <h3 class="text-center">{{$item->name}}</h3>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-12 text-center">
                    <b>Số lượng: </b> {{$totalQty}} thiệp
                </div>
                <div class="col-12 text-center">
                    <div class="total-price ">
                        <b>Phụ thu:</b>
                        @if($totalQty < 300 && $totalQty >= 200)
                            @php $total += 50000 @endphp
                            {{number_format(50000)}}
                        @elseif($totalQty < 200)
                            @php $total += 100000 @endphp
                            {{number_format(100000)}}
                        @else
                            {{0}}
                        @endif
                    VND</div>
                </div>
                <div class="col-12 text-center"><b>Tổng tiền:</b> {{number_format($total)}} VND</div>
            </div>
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
                <div class="row justify-content-md-center">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Họ và Tên người nhận hàng <span class="red">*</span></label>
                            <input name="name" type="text" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >Số điện thoại người nhận hàng <span class="red">*</span></label>
                            <input name="phone" type="text" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label >Địa chỉ nhận hàng <span class="red">*</span></label>
                            <input name="address" type="text" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <fieldset>
                            <legend>Nhà gái</legend>
                            <div class="form-group">
                                <label>Ông: <span class="red">*</span></label>
                                <input name="dad_girl" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >Bà: <span class="red">*</span></label>
                                <input name="mom_girl" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >Cô dâu: <span class="red">*</span></label>
                                <input name="girl" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >Địa chỉ <span class="red">*</span></label>
                                <input name="address_girl" type="text" class="form-control" required />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-12 col-md-6">
                        <fieldset>
                            <legend>Nhà Trai</legend>
                            <div class="form-group">
                                <label>Ông: <span class="red">*</span></label>
                                <input name="dad_boy" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >Bà: <span class="red">*</span></label>
                                <input name="mom_boy" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >Chú rể: <span class="red">*</span></label>
                                <input name="boy" type="text" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label >Địa chỉ: <span class="red">*</span></label>
                                <input name="address_boy" type="text" class="form-control" required/>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <h3>Trân trọng báo tin</h3>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div style="max-width: 400px;margin : auto">
                                        <div class="row">
                                            <div class="col-3">Lễ <span class="red">*</span></div>
                                            <div class="col-9">
                                                <select style="display: inline-block;max-width : 200px" name="title" class="form-control">
                                                    <option value="Vu Quy">Vu Quy</option>
                                                    <option value="Tân Hôn">Tân Hôn</option>
                                                    <option value="Thành Hôn">Thành Hôn</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div style="max-width: 400px;margin : auto">
                                        <div class="row">
                                            <div class="col-3">Chú rễ <span class="red">*</span></div>
                                            <div class="col-9">
                                                <select style="display: inline-block;max-width : 200px" name="vocative_boy" class="form-control">
                                                    <option value="trưởng">Trưởng</option>
                                                    <option value="thứ">Thứ</option>
                                                    <option value="út">Út</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div style="max-width: 400px;margin : auto">
                                        <div class="row">
                                            <div class="col-3">Cô Dâu <span class="red">*</span></div>
                                            <div class="col-9">
                                                <select style="display: inline-block;max-width : 200px" name="vocative_girl" class="form-control">
                                                    <option value="trưởng">Trưởng</option>
                                                    <option value="thứ">Thứ</option>
                                                    <option value="út">Út</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Thời gian tổ chức hôn lễ</label>
                            <div class="form-row">
                                <div class="col col-md">
                                    <div class="input-group mb-3">
                                        <input name="organize_h" type="number" class="form-control" placeholder="Giờ" value="15" required>
                                        <div class="input-group-append">
                                          <span class="input-group-text" >Giờ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-md">
                                    <div class="input-group mb-3">
                                        <input name="organize_m" type="number" class="form-control" placeholder="Phút" value="00" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" >Phút</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md">
                                    <input name="organize_d" type="date" class="form-control" placeholder="Ngày tổ chức" required/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nhằm ngày</label>
                            <div class="form-row">
                                <div class="col">
                                    <input name="organize_md" type="date" class="form-control" placeholder="Ngày tổ chức" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <h3>Nơi đãi tiệc</h3>
                        <div>
                            <select name="place" class="form-control">
                                <option value="Nhà Hàng">Tại nhà hàng</option>
                                <option value="Tư Gia">Tại tư gia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ <span class="red">*</span></label>
                            <input name="place_address" type="text" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Thời gian <span class="red">*</span></label>
                            <div class="form-row">
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input name="place_h" type="number" class="form-control" placeholder="Giờ" value="15" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" >Giờ</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input name="place_m" type="number" class="form-control" placeholder="Phút" value="00" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" >Phút</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <input name="place_d" type="date" class="form-control" placeholder="Ngày tổ chức" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nhằm ngày <span class="red">*</span></label>
                            <div class="form-row">
                                <div class="col">
                                    <input name="place_md" type="date" class="form-control" placeholder="Ngày tổ chức" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-payment">Đặt thiệp</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection