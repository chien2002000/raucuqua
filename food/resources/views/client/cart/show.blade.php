@extends('layouts.client')
@section('content')
<div class="container">
    <div class="row">
        @if(Cart::count() >0)
        <div class="block_left plr10 span9 span-t8 span-m12">
            <div class="breadcrumb">
                <ul class="fixf">
                    <li><a href="" rel="nofollow">Trang chủ</a></li>
                    <li><a href="">Đơn hàng của bạn</a></li>
                </ul>
            </div>
            <form method="POST" action="{{ route('cart/update') }}">
                @csrf
            <div class="cart_item mb20">
                <table class="m-off">
                    <thead>
                        <tr>
                            <th class="image">Mã sản phẩm</th>
                            <th class="image">Ảnh sp</th>
                            <th class="title">Sản phẩm</th>
                            <th class="quantity">Số lượng</th>
                            <th class="price">Giá bán</th>
                            <th class="total">Tổng cộng</th>
                            <th class="delete">Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach (Cart::content() as $item )
                        <tr>
                            <td><h4 class="title4"><a href="">{{ $item->options->code }}</a></h4></td>
                            <td><a><img class="imgf" src="{{ url($item->options->thumb) }}" alt="" ></a></td>
                            <td><h4 class="title4"><a href="">{{ $item->name }}</a></h4></td>
                            <td>
                                <input data-url="{{ url('cart/update_ajax') }}" id="update_ajax" data-id="{{ $item->rowId }}" type="number" name="qty[{{ $item->rowId }}]" value="{{ $item->qty }}" min="1" max="{{ $item->options->quantity }}"  class="input_control">
                                <input type="submit" value="Cập nhật" class="button red">
                            </td>
                            <td><span class="price"> {{number_format($item->price , 0 ,'' , '.')."đ"}} </span></td>
                            <td><span  class="price_sum" id="subtotal-{{ $item->rowId }}">{{number_format($item->total , 0 ,'' , '.')."đ"}}</span></td>
                            <td><a href="{{ route('cart/delete' , $item->rowId) }}"><span class="ico4"><i class="fa fa-trash"></i></span></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box" style="display:flex ;justify-content: space-between;">
                <div class="clearfix">
                    <p id="total-price" class="fl-right">Tổng giá: <span>{{number_format(Cart::total() , 0 ,'' , '.')}} đ</span></p>
                </div>
                <div class="fl-right">
                    <input type="submit" id="update-cart" value="Cập nhật giỏ hàng">
                </div>
            </div>
            </form>
            <div class="clear"></div>
            <div class="mb20 title_center">
                <h3>THÔNG TIN KHÁCH HÀNG</h3>
            </div>
            <form id="signupForm" action="{{ route('oder/store') }}" method="post" class="form_contact">
                @csrf
                <div class="form_group">
                    @error('name')
                        <div style="color: red ; margin-left:210px"  class="form-text text-danger">{{$message}}</div>
                    @enderror
                    <div class="fg1">Họ và tên (<span style="color: #f00">*</span>)</div>
                    <div class="fg2"><input type="text" class="form_text3" name="name" id="name" placeholder="Tên của bạn"></div>
                </div>
                <div class="clear"></div>
                <div class="form_group">
                    @error('phone')
                        <div style="color: red ; margin-left:210px" class="form-text text-danger">{{$message}}</div>
                    @enderror
                    <div class="fg1">Số điện thoại (<span style="color: #f00">*</span>)</div>
                    <div class="fg2"><input type="text" class="form_text3" name="phone" id="phone" placeholder="Số điện thoại liên lạc"></div>
                </div>
                <div class="clear"></div>
                <div class="form_group">
                    @error('email')
                        <div style="color: red ; margin-left:210px" class="form-text text-danger">{{$message}}</div>
                    @enderror
                    <div class="fg1">Email (<span style="color: #f00">*</span>)</div>
                    <div class="fg2"><input type="email" class="form_text3" name="email" id="email" placeholder="Địa chỉ email"></div>
                </div>
                <div class="clear"></div>
                <div class="form_group">
                    @error('address')
                        <div style="color: red ; margin-left:210px" class="form-text text-danger">{{$message}}</div>
                    @enderror
                    <div class="fg1">Địa chỉ nhận hàng</div>
                    <div class="fg2"><input type="text" class="form_text3" name="address" id="address" placeholder="Địa chỉ nhận hàng"></div>
                </div>
                <div class="clear"></div>
                <div class="form_group">
                    <div class="fg1">Ghi chú</div>
                    <div class="fg2"><textarea class="form_text4" rows="3" name="content"></textarea></div>
                </div>
                <div class="clear"></div>

                    <div class="clear"></div>
                <div class="form_group">
                    <div class="fg1"> &nbsp </div>
                    <div class="fg2">
                        <input type="hidden" value="" name="total">
                        <button type="submit" class="confirmed_orders">Thực hiện đặt hàng <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
        @else
            <img class="img1" src="{{asset('uploads/empty-cart.png')}}">

        @endif
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
        p#total-price{
            font-size: 18px;
            text-transform: uppercase;
            margin: 11px 0px 20px 0px;
            padding-right: 22px;
        }
        #total-price span {
    color: #ad0000;
    font-family: 'Roboto Medium';
}
    #update-cart{

    display: inline-block;
    padding: 12px 25px;
    color: #333;
    text-transform: uppercase;
    font-size: 13px;
    border-radius: 3px;
    background: #ececec;
    margin-right: 5px;
    border: 1px solid #d6d6d6;
    font-family: 'Roboto Bold';
    font-weight: normal;
    cursor: pointer;
    }
    #update-cart:hover{
        background-color: #e6cdcd;
    }
    .img{
         width: 114px;
        height: 109px;
        margin-left: 190px
    }
    .imgCat1{
        width: 500px;
        margin: 0px auto;
        padding-top: 40px;
        text-align: center
    }
    .img1 {
    width: 486px;
    height: 348px;
    margin-left: 169px;
    margin-top: 87px;
}
    .box{
        border: 1px solid #34a105;
        display: inline-block;
        padding: 11px;
        text-transform: uppercase;
        margin-top: 16px;
        text-align: center;
        margin-bottom: 20px
    }
    .box .box-title{
        color: #34a105
    }
</style>
@endsection
