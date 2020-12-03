@extends('layout.layout')
@section('content')
    <div class="news-container">
        <div class="row" style="margin-top: 20px">
            <div class="col-12">
                <h3 class="color text-center">{{$news->title}}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div style="margin : auto;text-align: center">
                    <img src="{{asset("img/news/".$news->img)}}" alt="{{$news->title}}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{$news->content}}
            </div>
        </div>
    </div>
@endsection