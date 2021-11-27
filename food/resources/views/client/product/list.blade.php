@extends('layouts.client')
@section('content')
<div class="container">
    <div class="row">
        <div class="span9 block_right span-t8 plr10 span-m12" id="ajax_sort">
            <div class="breadcrumb">
                <ul class="fixf">
                    <li><a href="">Trang chủ</a></li>
                    <li>Sản phẩm</li>
                </ul>
            </div>
            <div class="block_sort fixf mb20">
                <ul class="quantity_prd">
                    <li>View:</li>
                    <li class="current"><a href="">24</a></li>
                    <li><a href="">48</a></li>
                    <li><a href="">ALL</a></li>
                </ul>
                <div class="sort">
                    <a href="#sort" class="btn_open"><span>Sắp xếp</span></a>
                    <ul class="overact" id="sort">
                        <li><a href="{{ url('product/san-pham') }}">Mặc định</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['status'=>'hight'])}}">Theo giá thấp - cao</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['status'=>'low'])}}">Theo giá cao - thấp</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['status'=>'light'])}}">Sản phẩm bán chạy</a></li>

                    </ul>
                </div>
                <script>
                    /* btn open */
                    $('.btn_open').click(function(n){
                        n.preventDefault();
                        var id = $(this).attr('href');
                        $(this).toggleClass('dropdown');
                        $(id).toggleClass('active');
                        $('.overact').not(id).removeClass('active');
                        $('.overact').not(id).siblings('.btn_open').removeClass('dropdown');
                    });
                    $(document).mouseup(function (e){
                        var container = $('.overact ,.btn_open');
                        if (!container.is(e.target) && container.has(e.target).length === 0){
                            $('.overact').removeClass('active');
                            $('.btn_open').removeClass('dropdown');
                        }
                    });
                </script>
            </div>
            <div class="clear"></div>
            @if($list_product->count()>0)
            <div class="block_prd">
                <div class="row">
                    @foreach ( $list_product as  $item)
                    @php
                            $categary =  $item->categary->slug;
                     @endphp
                    <div class="wrapper_prd span3 mb20 span-t4 span-m6">
                        <div class="item_prd">
                            <div class="image">
                                <span class="percen">-30%</span>
                                <a href="{{ url("san-pham/$categary/$item->slug") }}"><img src="{{ url($item->product_thumb) }}" alt=""></a>
                            </div>
                            <div class="info">
                                <h4><a href="{{ url("san-pham/$categary/$item->slug") }}">{{ $item->product_title }}</a></h4>
                                <p class="price">{{number_format($item->price_new , 0 ,'' , '.')."đ"}}<span>{{number_format($item->price , 0 ,'' , '.')."đ"}}</span></p>
                                <p class="txt_center">
                                    <a href="{{ url("san-pham/$categary/$item->slug") }}" class="btn add_cart" rel="nofollow"><i class="fa fa-shopping-cart"></i>MUA HÀNG</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $list_product->links() }}
            </div>
            @else
                <div class="error_404">
                    <img src="{{url('public/uploads/404.png')}}">
                    <div class="redict">
                    <a href="{{url('/')}}" style="color: #32ba43;" >Quay Lại Trang Chủ</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="span3 block_left span-t4 plr10 span-m12">
        <form method="POST" action="" id="filter" data-url="{{ url('product/ajax/sort') }}">
            <div class="block_panel mb20 ">
                <div class="head_panel">
                    <h5>LỌC THEO GIÁ</h5>
                </div>
                <div class="section-detail">
                        <table>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price" value="< 20000"></td>
                                    <td>Dưới 20.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="20000-50000"></td>
                                    <td>20.000đ - 50.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="50000-100000"></td>
                                    <td>50.000đ - 100.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="100000-200000"></td>
                                    <td>100.000đ - 200.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value=">200000"></td>
                                    <td>Trên 200.000đ</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="block_panel mb20 ">
                <div class="head_panel">
                    <h5>LỌC THEO THƯƠNG HIỆU</h5>
                </div>
                @if($categary_pro->count() >0)
                <div class="body_panel">
                    <table>
                        <tbody>
                            @foreach ($categary_pro as $categary )
                            @foreach ( $categary->categary_child as $item)
                            @if($item->status_id =1)
                            <tr>
                                <td><input type="radio" name="r-brand" value="{{ $item->id }}"></td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </form>
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
