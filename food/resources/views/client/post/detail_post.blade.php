@extends('layouts.client')
@section('content')
<div class="container">
    <div class="row">
        <div class="span9 block_left plr10 span-t8 span-m12">
            <div class="panel_body">
                <h3 class="title_body">{{ $post_detail->post_title }}</h3>
                <div class="content">
                    {!! $post_detail->content !!}
                </div>
            </div>
            <div class="fixf">
                <p class="share_small bor mb20">
                    Chia sẻ:
                    <a href="" title="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="" title="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="" title="">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                    <a href="" title="">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                </p>
                <p class="tag mb20"><i class="fa fa-tags" aria-hidden="true"></i>: <a href="">DIM GROUP</a></p>
            </div>
            <div class="block_panel mb20 ">
                <div class="title_panel">
                    <h5>Bài viết liên quan</h5>
                </div>
                @if($list_a->count()>0)
                <div class="body_panel">
                    <ul class="list_prd">
                        @foreach ( $list_a  as $item )
                        <li><a href="{{ url("post/{$item->slug}/{$item->categary_id}") }}">{{ $item->post_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="span3 block_right plr10 span-t4 span-m12">
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
                            <li><a href="{{ url("product/$categary->slug/$item->slug") }}">{{$item->name}}</a></li>
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
@endsection
