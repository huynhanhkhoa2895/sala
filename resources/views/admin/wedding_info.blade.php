@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.preview') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid d-print-none">
    	<a href="javascript: window.print();" class="btn float-right"><i class="la la-print"></i></a>
		<h2>
	        <span class="text-capitalize">Thông tin tiệc cưới</span>
	        <small>{!! $crud->getSubheading() ?? mb_ucfirst(trans('backpack::crud.preview')).' '.$crud->entity_name !!}.</small>
	        @if ($crud->hasAccess('list'))
	          <small class=""><a href="{{ url($crud->route) }}" class="font-sm"><i class="la la-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
	        @endif
	    </h2>
    </section>
@endsection

@section('content')
<div class="row">
	<div class="{{ $crud->getShowContentClass() }}">

	<!-- Default box -->
	  <div class="">
	    <div class="card no-padding no-border">
			<table class="table table-striped mb-0">
		        <tbody>
                    <tr>
                        <td>Thiệp</td>
                        <td><a href="{{url("admin/wedding_invitation/".$info->product."/show")}}">{{$info->name}}</a></td>
                    </tr>
                    <tr>
                        <td>Số lượng Thiệp</td>
                        <td>{{$info->qty}}</td>
                    </tr>
                    <tr>
                        <td>Tiêu đề</td>
                        <td>{{$info->title}}</td>
                    </tr>
                    <tr>
                        <td>Chú Rể</td>
                        <td>{{$info->boy}}</td>
                    </tr>
                    <tr>
                        <td>Thứ bậc chú rể</td>
                        <td>{{$info->vocative_boy}}</td>
                    </tr>
                    <tr>
                        <td>Cha chú rể</td>
                        <td>{{$info->dad_boy}}</td>
                    </tr>
                    <tr>
                        <td>Mẹ chú rể</td>
                        <td>{{$info->mom_boy}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ chú rể</td>
                        <td>{{$info->address_boy}}</td>
                    </tr>
                    <tr>
                        <td>Cô dâu</td>
                        <td>{{$info->girl}}</td>
                    </tr>
                    <tr>
                        <td>Thứ bậc cô dâu</td>
                        <td>{{$info->vocative_girl}}</td>
                    </tr>
                    <tr>
                        <td>Cha cô dâu</td>
                        <td>{{$info->dad_girl}}</td>
                    </tr>
                    <tr>
                        <td>Mẹ cô dâu</td>
                        <td>{{$info->mom_girl}}</td>
                    </tr>
                    <tr>
                        <td>Địa chỉ cô dâu</td>
                        <td>{{$info->address_girl}}</td>
                    </tr>
                    <tr>
                        <td>Ngày</td>
                        <td>{{$info->organize_date}}</td>
                    </tr>
                    <tr>
                        <td>Nhằm ngày</td>
                        <td>{{$info->organize_mdate}}</td>
                    </tr>
                    <tr>
                        <td>Tại</td>
                        <td>{{$info->place}}</td>
                    </tr>
                    <tr>
                        <td>Tổ chức tiệc cưới ngày</td>
                        <td>{{$info->place_date}}</td>
                    </tr>
                    <tr>
                        <td>Tổ chức tiệc cưới nhằm ngày</td>
                        <td>{{$info->place_mdate}}</td>
                    </tr>
                    <tr>
                        <td>Tổ chức tiệc cưới tại địa chỉ</td>
                        <td>{{$info->place_address}}</td>
                    </tr>
		        </tbody>
			</table>
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->

	</div>
</div>
@endsection


@section('after_styles')
	<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/show.css') }}">
@endsection

@section('after_scripts')
	<script src="{{ asset('packages/backpack/crud/js/crud.js') }}"></script>
	<script src="{{ asset('packages/backpack/crud/js/show.js') }}"></script>
@endsection
