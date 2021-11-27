@extends('layouts.admin');
@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div class="container-fluid py-5">
    <div class="row">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $count_success }}</h5>
                    <p class="card-text">Đơn hàng giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $count_Processing }}</h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">DOANH SỐ</div>
                <div class="card-body">

                    <h5 class="card-title">{{ !empty($total_all)?number_format( $total_all , 0 ,'' , '.'):''  }} VNĐ</h5>
                    <p class="card-text">Doanh số hệ thống</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">ĐƠN HÀNG HỦY</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $count_cancel }}</h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end analytic  -->
    <div class="card">
        <div class="card-header font-weight-bold">
            ĐƠN HÀNG MỚI
        </div>
        <div class="card-body">
            @if($order_list->count() >0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Chi tiet</th>
                        <th scope="col">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $temple = 0;
                    @endphp
                    @foreach ($order_list as $item )
                    @php
                        $temple ++;
                    @endphp
                    <tr>
                        <td>{{ $temple }}</td>
                        <td>{{ $item->code }}</td>
                        <td>
                            {{ $item->fullName }} <br>
                            {{ $item->phone }}
                        </td>
                        <td>{{ $item->count_total }}</td>
                        <td>{{  number_format($item->total , 0 ,'' , '.')  }}đ</td>
                        @if( $item->status_order ==4)
                        <td><span class="badge badge-success ">{{ $item->status_oder->name }}</span></td>
                        @else
                        @if($item->status_order ==5)
                        <td><span class="badge badge-dark ">{{ $item->status_oder->name }}</span></td>
                        @else
                        <td><span class="badge badge-warning ">{{ $item->status_oder->name }}</span></td>
                        @endif
                        @endif
                        <td>{{ $item->created_at }}</td>
                        <td><a href="{{ route('order/detail' , $item->id) }}" style="color: #007bff">Chi tiết</a></td>
                        <td>
                            <a href="{{ route('order/delete' , $item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng ?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            <nav aria-label="Page navigation example">
                {{ $order_list->links() }}
            </nav>
        </div>
    </div>

</div>

@endsection
