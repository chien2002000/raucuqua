@extends('layouts.admin')
@section('content')
@if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
@endif
    <div class="container" style="margin: 21px;">
        <div class="row" style="width:1215px">
            <div id="content" class="detail-exhibition fl-right" style="width:100% ; background: white; padding-left: 13px;">
                <div class="section" id="info">
                    <div class="section-head">
                        <h3 class="section-title">Thông tin đơn hàng</h3>
                    </div>
                    <ul class="list-item" style="list-style:none ;padding-left:10px">
                        <li>
                            <h3 class="title" style="font-size:16px">Mã đơn hàng</h3>
                            <span class="detail">{{ $order_by_id->code }}</span>
                        </li>
                        <li>
                            <h3 class="title"  style="font-size:16px">Địa chỉ nhận hàng</h3>
                            <span class="detail">{{ $order_by_id->address }} / {{ $order_by_id->phone }}</span>
                        </li>
                        <li>
                            <h3 class="title"  style="font-size:16px">Thông tin vận chuyển</h3>
                            <span class="detail">{{ $order_by_id->pay->name_pay }}</span>
                        </li>
                        <form method="POST" action="{{ route('order/status/detail' ,$order_by_id->id ) }}">
                            @csrf
                            <li>
                                <h3 class="title"  style="font-size:16px">Tình trạng đơn hàng</h3>
                                <select name="status" style="background: #ff0000b8;
                                color: white; font-size:15px">
                                @foreach ($status_order as $status )
                                @if($status->id == $order_by_id->status_order)
                                    <option  selected  value='{{ $status->id }}'>{{ $status->name }}</option>
                                    @else
                                    <option value='{{ $status->id }}'>{{ $status->name }}</option>
                                    @endif
                                @endforeach
                                </select>
                                <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                            </li>
                        </form>
                    </ul>
                </div>
                <div class="section">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm đơn hàng</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table info-exhibition">
                            <thead>
                                <tr>
                                    <td class="thead-text">STT</td>
                                    <td class="thead-text">Ảnh sản phẩm</td>
                                    <td class="thead-text">Tên sản phẩm</td>
                                    <td class="thead-text">Đơn giá</td>
                                    <td class="thead-text">Số lượng</td>
                                    <td class="thead-text">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $temple = 0
                                @endphp
                                @foreach ($detail_order as  $item )
                                    @php
                                        $temple ++
                                    @endphp
                                <tr>
                                    <td class="thead-text">{{ $temple }}</td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="{{ url($item->product_thumb) }}" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text">{{ $item->product_title }}</td>
                                    <td class="thead-text">{{number_format($item->price_new , 0 ,'' , '.')."đ"}}</td>
                                    <td class="thead-text">{{ $item->quantity }}</td>
                                    <td class="thead-text">{{  number_format($item->amount , 0 ,'' , '.')  }} đ</td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="section">
                    <h3 class="section-title">Giá trị đơn hàng</h3>
                    <div class="section-detail">
                        <ul class="list-item clearfix" style="list-style:none">
                            <li>
                                <span class="total-fee">Tổng số lượng</span>
                                <span class="total">Tổng đơn hàng</span>
                            </li>
                            <li>
                                <span class="total-fee">{{ $order_by_id->count_total }} sản phẩm</span>
                                <span class="total">{{  number_format($order_by_id->total , 0 ,'' , '.')  }} đ</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
<style>
    /*DETAIL ORDER*/
.detail-exhibition .section{
    margin-bottom: 20px;
    font-size: 15px;
}
.detail-exhibition .section:last-child{ padding: 0; margin-bottom: 0;}
.detail-exhibition .section .list-item .title, .detail-exhibition .section .section-title{
    position: relative;
    padding-left: 30px;
    color: #272727;
    font-family: 'Roboto Medium';
}
.detail-exhibition .section .list-item .detail{
    color: #444;
    font-size: 14px;
}
.detail-exhibition .section .list-item .detail select{ width: 180px;}
.detail-exhibition .section .list-item li .title:before{
    position: absolute;
    font-family: 'Fontawesome';
    top: 0;
    left: 0;
    color: #07adc6;
    font-size: 17px;
}
.detail-exhibition .section .list-item li:nth-child(1) .title:before{content: '\f02a';}
.detail-exhibition .section .list-item li:nth-child(2) .title:before{content: '\f041';}
.detail-exhibition .section .list-item li:nth-child(3) .title:before{content: '\f23d';}
.detail-exhibition .section .list-item li:nth-child(4) .title:before{ content: '\f1fe';}
.detail-exhibition .section .section-title{
    padding: 0;
    line-height: inherit;
    border-bottom: none;
}
.detail-exhibition .section .section-detail{ padding: 0;}
.detail-exhibition .section .section-detail .list-item{ border-top: 1px solid #f5f5f5; border-bottom: 1px solid #f5f5f5; }
.detail-exhibition .section .section-detail .list-item li{ float: left; padding: 12px 24px; border-left: 1px solid #f5f5f5;}
.detail-exhibition .section .section-detail .list-item li:nth-child(1){ width: 20%; text-align: right; border-left: none;}
.detail-exhibition .section .section-detail .list-item li:nth-child(2){ width: 80%; text-align: left;}
.detail-exhibition .section .section-detail .list-item li span{ display: block; padding-bottom: 5px; color: #333; font-size: 14px;}
.detail-exhibition .section .section-detail .list-item li .total{
    font-size: 16px;
    color: #e60000;
    padding-bottom: 0;
    font-family: 'Roboto Medium';
    font-weight: normal;
}
.detail-exhibition .info-exhibition thead tr td{
    color: #272727;
    font-family: 'Roboto Medium';
    font-weight: normal;
    text-transform: uppercase;
}
.detail-exhibition .info-exhibition thead tr td:nth-child(1){ width: 5%;}
.detail-exhibition .info-exhibition thead tr td:nth-child(n+4){ width: 12%;}
.detail-exhibition .info-exhibition tbody tr td{ color: #333; font-size: 14px; vertical-align: middle;}
.detail-exhibition .info-exhibition tbody tr td:nth-child(2) .thumb{ display: inline-block;}
.detail-exhibition .info-exhibition tr td:nth-child(2){ width: 15%; text-align: center;}
.detail-exhibition .info-exhibition tr td:nth-child(5) { text-align: center;}
.table{ margin-bottom: 0!important;}
.detail-exhibition .thumb{ margin-top: 0!important;}
.detail-exhibition .section#info .list-item li{ margin-bottom: 10px;}
.detail-exhibition .section#info .list-item li:last-child{ margin-bottom: 0!important;}
.info-exhibition .thumb img{ width: 80px; height: 80px; border: 1px solid #ccc;}
#info select{
    border: 1px solid #ccc;
    padding: 5px 20px;
    font-size: 13px;
    color: #666;
    border-radius: 3px;
}
#info input[type="submit"]{
    font-size: 13px;
    padding: 3px 10px;
    border: none;
    background: #0183f3;
    color: #fff;
    font-family: 'Roboto Medium';
    font-weight: normal;
    line-height: 23px;
    border-radius: 3px;
}
.detail-exhibition .section .section-title{
    font-weight: normal;
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
}
</style>
@endsection
