@extends('layouts.client')
@section('content')
<div class="container mb20">
    <div class="row">
        <div class="span9 plr10 span-m12 span-t12">
            <div class="slide_home arr_bx">
                <a><img src="{{ asset('public/img/1.png') }}" alt=""></a>
                <a><img src="{{ asset('public/img/2.png') }}" alt=""></a>
            </div>
        </div>
        <script>
            $(document).ready(function(){
            $('.slide_home').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            });
            });
        </script>
        @if($list_slider->count()>0)
        <div class="span3 plr10 m-off t-off">
            <div class="cate_main">
                <ul>
                    @foreach ($list_slider as $slider )
                    <li><a href=""><img src="{{ url($slider->img_slider) }}" alt=""></a></li>
                    @endforeach
                    <li><a href=""><img src="{{ asset('public/img/4.jpg') }}" alt=""></a></li>
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="clear"></div>
<div class="fixf mb20">
    <div class="container">
        <div class="block_cate_home">
            <div class="head_cate">
                <h3>Sản Phẩm Nổi Bật</h3>
            </div>
            <div class="body_cate">
                <div class="row">
                    @if($light_hight->count()>0)
                    <ul class="block_prd">
                        @foreach ($light_hight as $item )
                        <li class="wrapper_prd p10">
                            <div class="item_prd">
                                <div class="image">
                                    <span class="percen">-30%</span>
                                    <a href=""><img src="{{ url($item->product_thumb)}}" alt=""></a>
                                </div>
                                <div class="info">
                                    <h4><a href="">{{$item->product_title  }}</a></h4>
                                    <p class="price">
                                        {{number_format($item->price_new , 0 ,'' , '.')."đ"}}
                                        <span> {{number_format($item->price , 0 ,'' , '.')."đ"}}</span>
                                    </p>
                                    <p class="txt_center">
                                        <button data-url="{{ url('cart/edit/home') }}" data-id ="{{ $item->id }}" id="buy_now" style="cursor: pointer" class="btn add_cart" rel="nofollow"><i class="fa fa-shopping-cart"></i>MUA HÀNG</button>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<div class="fixf mb20">
    @if($name_categary->status_id == 1)
    @if($list_categary->count() >0)
    <div class="container">
        <div class="block_cate_home">
            <div class="head_cate">
                <h3>{{ $name_categary->name }}<a href="{{ url("product/san-pham/rau-sach") }}" style="margin-left: 960px ;color: #649b15;">Xem tất cả</a></h3>
            </div>
            <div class="body_cate">
                <div class="row">
                    <ul class="block_prd">
                        @foreach ($list_categary as $item)
                        <li class="wrapper_prd p10">
                            <div class="item_prd">
                                <div class="image">
                                    <span class="percen">-30%</span>
                                    <a href=""><img src="{{ url($item->product_thumb)}}" alt=""></a>
                                </div>
                                <div class="info">
                                    <h4><a href="">{{$item->product_title }}</a></h4>
                                    <p class="price">
                                        {{number_format($item->price_new , 0 ,'' , '.')."đ"}}
                                        <span> {{number_format($item->price , 0 ,'' , '.')."đ"}}</span>
                                    </p>
                                    <p class="txt_center">
                                        <button data-url="{{ url('cart/edit/home') }}" data-id ="{{ $item->id }}" id="buy_now" style="cursor: pointer" class="btn add_cart" rel="nofollow"><i class="fa fa-shopping-cart"></i>MUA HÀNG</button>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>
<div class="fixf mb20">
    @if($name_categary1->status_id == 1)
    @if($list_categary2->count() >0)
    <div class="container">
        <div class="block_cate_home">
            <div class="head_cate">
                <h3>{{ $name_categary1->name }}<a href="{{ url("product/san-pham/hoa-qua-sach") }}" style="margin-left: 920px ;color: #649b15;">Xem tất cả</a></h3>
            </div>
            <div class="body_cate">
                <div class="row">
                    <ul class="block_prd">
                        @foreach ($list_categary2 as $item )
                        <li class="wrapper_prd p10">
                            <div class="item_prd">
                                <div class="image">
                                    <span class="percen">-30%</span>
                                    <a href=""><img src="{{ url($item->product_thumb)}}" alt=""></a>
                                </div>
                                <div class="info">
                                    <h4><a href="">{{$item->product_title  }}</a></h4>
                                    <p class="price">
                                        {{number_format($item->price_new , 0 ,'' , '.')."đ"}}
                                        <span> {{number_format($item->price , 0 ,'' , '.')."đ"}}</span>
                                    </p>
                                    <p class="txt_center">
                                        <button data-url="{{ url('cart/edit/home') }}" data-id ="{{ $item->id }}" id="buy_now" style="cursor: pointer" class="btn add_cart" rel="nofollow"><i class="fa fa-shopping-cart"></i>MUA HÀNG</button>
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>
<div class="clear"></div>
<div class="fixf mb20">
    <div class="container">
        <div class="row">
            @foreach ($list_post as $item )
            <div class="span6 plr10 span-m12" style="margin-bottom:10px">
                <div class="panel_default fixf">
                    <div class="head_cate">
                        <h3>{{ $item->post_title }}</h3>
                    </div>
                    <div class="body_cate fixf">
                        <div class="block_new">
                            <div class="clearfix item_new">
                                <div class="image_new plr10 mb10 span4 span-m12">
                                    <a href=""><img src="{{ url($item->thumbnail) }}" alt=""></a>
                                </div>
                                <div class="info plr10 span8 span-m12">
                                    <h4>
                                        <a href="">{{ $item->post_title }}</a>
                                    </h4>
                                    {!! $item->excerpts !!}
                                    <p class="link_watch">
                                        <a href="{{ url("post/$item->slug/$item->categary_id") }}" rel="nofollow">[ Xem thêm ]</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
