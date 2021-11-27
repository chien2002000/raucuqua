@extends('layouts.client')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-12">
                <div class="block_left plr10 ">
                    <div class="breadcrumb">
                        <ul class="fixf">
                            <li><a href="" rel="nofollow">Trang chủ</a></li>
                            <li><a href="">Thanh toán</a></li>
                        </ul>
                    </div>
                    <div class="success">
                        <h3 class="text-success">Bạn đã mua hàng thành công</h3>
                       <div class="img">
                           <img src="{{ url('public/uploads/img.png') }}">
                       </div>
                       <span class="notification">Nhân viên chúng tôi sẽ liên hệ với bạn sớm nhất!
                        Trân trọng cảm ơn!</span>
                        <div class="click">
                            <a href="{{ url('?') }}"  class="buy-next">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<style>
    .success{
        padding: 100px 0px;
    }
    .buy-next{
        margin: 42%;
        text-align: center;
        margin-top: 26px;
        padding: 14px;
        border: none;
        border-radius: 5px;
        background: #008000a6;
        color: white;
        font-size: 16px;
        cursor: pointer;
        display: inline-block;
    }
    .text-success{
        color: #28a745!important;
        text-align: center;
        /* min-height: 400px; */
        font-size: 20px;
    }
    .img{
        width: 200px;
        text-align: center;
        margin-left: 488px;
    }
     span.notification
    {
        margin-left: 325px;
        font-size: 16px;
        font-weight: bold;
    }
</style>
@endsection
