@extends('layouts.client')
@section('content')
@if($list_post_client->count()>0)
<div class="container">
    <div class="row">
        <div class="span9 block_right span-t8 span-m12 plr10">
            <div class="breadcrumb">
                <ul class="fixf">
                    <li><a href="">Trang chủ</a></li>
                    <li>Blog kiến thức</li>
                </ul>
            </div>
            <div class="block_panel mb20 ">
                <div class="head_panel">
                    <h5>Chuyên mục: blog kiến thức</h5>
                </div>
                <div class="body_panel">
                    @foreach ($list_post_client as $item )
                    @if($item->categary->status_id == 1)
                    <div class="block_new">
                        <div class="clearfix item_new">
                            <div class="row">
                                <div class="image_new plr10 mb10 span4 span-m12">
                                    <a href="{{ url("post/$item->slug/$item->categary_id") }}"><img src="{{ url($item->thumbnail) }}" alt=""></a>
                                </div>
                                <div class="info plr10 span8 span-m12">
                                    <a href="" style="color: #337ab7">{{ $item->categary->name }}</a>
                                    <h4>
                                        <a href="{{ url("post/$item->slug/$item->categary_id") }}">{{ $item->post_title }}</a>
                                    </h4>
                                    <p>{!! $item->excerpts !!}
                                    <a href="{{ url("post/$item->slug/$item->categary_id") }}">Chi tiết</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    {{ $list_post_client->links() }}
                </div>
            </div>
        </div>
        <div class="span3 block_left span-t4 span-m12 plr10">
            @if($lighthight_pro->count() >0)
            <div class="block_panel mb20 ">
                <div class="head_panel">
                    <h5>Sản Phẩm Nổi bật</h5>
                </div>
                <div class="body_panel">
                    <div class="wrapper_panel">
                        <ul class="list_prd_widget p10">
                            @foreach ($lighthight_pro as $item)
                            <li><a href=""><img src="{{ url($item->product_thumb) }}"></a><h4><a href="">{{ $item->product_title }}</a></h4><p>{{number_format($item->price_new , 0 ,'' , '.')."đ"}}</p>
                                <button data-url="{{ url('cart/edit/home') }}" data-id ="{{ $item->id }}" id="buy_now" class="buy-now">Mua ngay</button>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="block_panel mb20 ">
                <div class="head_panel">
                    <h5>Các Danh Mục Sản Phẩm</h5>
                </div>
                @if($categary_pro->count()>0)
                <div class="body_panel">
                    <ul class="list_prd">
                        @foreach ($categary_pro as $categary )
                            @foreach ( $categary->categary_child as $item)
                            @if($item->status_id ==1)
                            <li><a href="">{{$item->name}}</a></li>
                            @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="block_panel mb20 ">
                <div class="head_panel">
                    <h5>Hỗ trợ khách hàng</h5>
                </div>
                <div class="body_panel">
                    <div class="support_block">
                        <img src="img/hotline2.png" alt="">
                        <p>
                            <span>Hotline 1</span>
                            <a href="">0988.851.155</a>
                        </p>
                    </div>
                    <div class="support_block">
                        <img src="img/hotline2.png" alt="">
                        <p>
                            <span>Hotline 2</span>
                            <a href="">0988.851.155</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    #paging-wp{
        width: 200px;

    margin: 0px auto;
    }
    .pagination {
    display: -ms-flexbox;
    display: flex;
    padding-left: 0;
    list-style: none;
    margin-top: 55px;
}
    .page-link {
    position: relative;
    display: block;
    padding: .5rem .75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #e4e8ede6;
    background-color: #13040452;
    border: 1px solid #dee2e6;
    width: 40px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #040c15b3;
    border-color: #007bff;
}
li.page-item{
    padding-right: 5px;

}
.pagination {
    display: -ms-flexbox;
    display: flex;
    padding-left: 0;
    list-style: none;

}


</style>
@endsection
