@extends('layouts.client')
@section('content')
<div class="container">
    @if (!empty($page_id))
    <div class="breadcrumb">
        <ul class="fixf">
            <li><a href="" rel="">Trang chủ</a></li>
            <li>{{ $page_id->page_title }}</li>
        </ul>
    </div>
    <div class="section" id="detail-blog-wp">
        <div class="section-head clearfix">
            <h3 class="section-title">{{ $page_id->page_title }}</h3>
        </div>
        <div class="section-detail">
            <span class="create-date">{{ $page_id->created_at }}</span>
            <div class="detail">
               {!! $page_id->content !!}
            </div>
        </div>
    </div>
    <div class="clear"></div>

    <div class="clear"></div>

</div>
@else
<div class="error_404">
    <img src="{{url('public/uploads/404.png')}}">
    <div class="redict">
       <a href="{{url('/')}}" style="color: #32ba43;" >Quay Lại Trang Chủ</a>
    </div>
</div>
    @endif
    <style>
        .error_404{
            width: 400px;
        display: block;
        margin: auto;
        padding-top: 17px;

        }

        .redict{
            width: 176px;
        margin: 0px auto;
        display: block;
        border: 1px solid #32ba43;
        text-align: center;
        height: 50px;
        font-weight: bold;
        padding-top: 12px;
        margin-top: 20px;

        }

    </style>
@endsection
