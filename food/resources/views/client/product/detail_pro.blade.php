@extends('layouts.client')
@section('content')
<div class="container">
    <div class="row">
        <div class="block_left plr10 span9 span-t8 span-m12">
            <div class="breadcrumb">
                <ul class="fixf">
                    <li><a href="" rel="nofollow">Trang chủ</a></li>
                    <li><a href="">Sản phẩm</a></li>
                    <li><a href="">{{ $product_by_id->product_title }}</a></li>
                </ul>
            </div>
            <div class="block_prd_view">
                <div class="fixf mb20">
                    <div class="row">
                        <div class="prd_view_left plr10 span6 span-t12 span-m12">
                            <div class="slide_view" style="border: 1px solid #80808096; ">
                                <a href="" class="fancybox" data-fancybox-group="list1">
                                    <img src="{{ url($product_by_id->product_thumb) }}" alt="">
                                </a>
                                <a href="img/12.jpg" class="fancybox" data-fancybox-group="list1">
                                    <img src="{{ url($product_by_id->product_thumb) }}" alt="">
                                </a>
                            </div>
                            @if($detail_img->count() >0)
                            <div class="slide_nav">
                               @foreach ( $detail_img as $img )
                               <a class="thumb">
                                <img style="border: 1px solid #80808096;" src="{{ url($img->img_detail) }}" alt="">
                            </a>
                               @endforeach
                            </div>
                            @endif
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                            $('.fancybox').fancybox();	});
                            $('.slide_view').slick({
                              slidesToShow: 1,
                              slidesToScroll: 1,
                              arrows: false,
                              fade: true,
                              asNavFor: '.slide_nav'
                            });
                            $('.slide_nav').slick({
                              slidesToShow: 3,
                              slidesToScroll: 1,
                              asNavFor: '.slide_view',
                              dots: true,
                              centerMode: true,
                              focusOnSelect: true
                            });
                        </script>
                        <script language="javascript" src="js/jquery.fancybox.pack.js"></script>
                        <link rel="stylesheet" href="css/fancybox/jquery.fancybox.css">
                        <div class="prd_view_right plr10 span6 span-t12 span-m12">
                            <h3>{{ $product_by_id->product_title }}</h3>
                            <p class="price">{{number_format($product_by_id->price_new , 0 ,'' , '.')."đ"}}<span>{{number_format($product_by_id->price , 0 ,'' , '.')."đ"}}</span></p>
                            <div class="des fixf">
                                <p><b>Chính sách bán hàng</b></p>
                                <div class="short_des">
                                    <p>
                                        Nhấc máy gọi ngay Hotline <strong>MIỄN PHÍ: 18006608</strong><br/>
                                        Đổi trả <strong>MIỄN PHÍ</strong> trong 45 ngày – Chi tiết<br/>
                                        Giao hàng trong <strong>2-4 giờ</strong> đến nhà khách hàng (nếu cách Kids Plaza gần hơn 6Km) – Chi tiết<br/>
                                        Cam kết hoàn tiền chênh lệch các cửa hàng đồng hạng có giá thấp hơn – Chi tiết
                                    </p>
                                </div>
                            </div>
                            @if($product_by_id->quantity != 0)
                            <div class="group_pick_quantity fixf mb20">
                                <span style="display: inline-block;
                                background: #ddd;
                                padding: 3px 10px; margin-bottom:5px">{{ $status->name }}</span>
                                <span style="color: gray">{{ $product_by_id->quantity }} sản phẩm có sẵn</span>
                                <p>Số lượng:</p>
                                <form class="fixf" action="">
                                    <div class="pick span4">
                                        <button  onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--;return false;">-</button>
                                        <input type="text" name="soluong" value="1" class="input-control" id="qty" >
                                        <button  onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty<{{ $product_by_id->quantity  }}) result.value++ ;return false;">+</button>
                                    </div>
                                    <button id="addCat"   data-url1="{{ url('cart/show') }}"  data-url="{{ url('cart/add' , $product_by_id->id) }}"  class="btn btn_submit">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                            @else
                                <h2 style="color:red ; padding:5px">Sản phẩm đã hết hàng</h2>
                            @endif
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
                                <p class="tag mb20"><i class="fa fa-tags" aria-hidden="true"></i>:<a href="">Sản phẩm nổi bật</a>,<a href="">sữa kem</a>,<a href="">sản phẩm từ sữa</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- tab Mô tả sản phẩm & Bình luận -->
            <div class="fixf mb20">
                <ul class="tab_uidim tab_basic nostyle">
                    <li class="current"><a href="#table1">Mô tả</a></li>
                    <li><a href="#table2">Thông tin thêm</a></li>
                </ul>
                <div class="content_tab_basic content" id="table1">{!! $product_by_id->content !!}</div>
                <div class="content_tab_basic content" id="table2">{!! $product_by_id->excerpts !!}</div>
            </div>
            <script>
                function tab_uidim(){
                    $('.tab_uidim').each(function(){
                        var idactive = $(this).children('li.current').children('a').attr('href');
                        var a = $(this).children('li').children('a');
                        $(a).each(function(){
                            var id = $(this).attr('href');
                            $(id).hide();
                        });
                        $(idactive).show();
                    });
                }
                tab_uidim();
                $('.tab_uidim li a').click(function(n){
                    n.preventDefault();
                    $(this).parent('li').addClass('current');
                    $(this).parent('li').siblings().removeClass('current');
                    tab_uidim();
                });
            </script>
<!-- end tab Mô tả sản phẩm & Bình luận -->
            <div class="clear"></div>
<!-- Sản phẩm liên quan -->
            <div class="fixf mb20">
                <div class="head_panel mb10">
                    <h5>Sản phẩm liên quan</h5>
                </div>
                @if($product_related->count() >0)
                <div class="block_prd">
                    <div class="row">
                        @foreach ($product_related as $item )
                        @if($item->slug != $slug)
                            <div class="wrapper_prd mb20 plr10 span3 span-t4 span-m6">
                                <div class="item_prd">
                                    <div class="image">
                                        <span class="percen">-30%</span>
                                        <a href=""><img src="{{ url($item->product_thumb) }}" alt=""></a>
                                    </div>
                                    <div class="info">
                                        <h4><a href="">{{ $item->product_title }}</a></h4>
                                        <p class="price">{{number_format($item->price_new , 0 ,'' , '.')."đ"}}<span>{{number_format($item->price , 0 ,'' , '.')."đ"}}</span></p>
                                        <p class="txt_center">
                                            <a href="" class="btn add_cart" rel="nofollow"><i class="fa fa-shopping-cart"></i>MUA HÀNG</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                         @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="block_right plr10 span3 span-t4 span-m12">
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
                            <button data-url="{{ url('cart/edit/home') }}" data-id ="{{ $item->id }}" id="buy_now" class="buy-now">Mua ngay</button></li>
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
