@extends('layouts.admin')
@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div class="w2" style=" position: relative;">
    <div id="content" class="container-fluid" style="z-index: 1 ;position: absolute">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách sản phẩm</h5>
                <div class="form-search form-inline">
                    <form action="">
                        <input type="text"  data-url="{{ url('admin/product/search/ajax') }}" id="search"  name="search" value="{{request()->input('search') }}" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                        <div id="show_search" style="  position: absolute ;z-index: 2">

                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{request()->fullUrlWithQuery(['status'=>'all'])}}" class="text-primary">Tất cả<span class="text-muted">({{ $count[3] }})</span></a>
                    <a href="{{request()->fullUrlWithQuery(['status'=>'active'])}}" class="text-primary">Công khai<span class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{request()->fullUrlWithQuery(['status'=>'queue'])}}" class="text-primary">Chờ duyệt<span class="text-muted">({{ $count[1] }})</span></a>
                    <a href="{{request()->fullUrlWithQuery(['status'=>'trash'])}}" class="text-primary">Thùng rác<span class="text-muted">({{ $count[2] }})</span></a>
                </div>
                <form method="POST" action="{{ route('product/action') }}">
                    @csrf
                <div class="row" >
                        <div class="col-md-6">
                         @error('select1')
                            <div class="form-text text-danger"style="margin:0px">{{'Mời bạn chọn tác vụ'}}</div>
                       @enderror
                        <div class="form-action form-inline py-3">
                                <select class="form-control mr-1"  name="select1">
                                    <option value="">Chọn</option>
                                    @foreach ($list_check as $k=>$v)
                                    <option value="{{  $k  }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                             <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                         </div>
                        </div>

                        <div class="col-md-6"  style="padding-left: 280px;">
                            @if(request()->input('status') =='active')
                            <div class="form-action form-inline py-3">
                                <span style="font-size: 18px ;font-weight:bold ; padding-right:5px">Sort:</span>
                                <select class="form-control mr-1" id="sort_product" data-url="{{ url('admin/product/sort?status=active') }}" name="sort_pro">
                                    <option>Chọn</option>
                                    <option value="new_product">Sản phẩm mới nhất</option>
                                    <option value="price_hight">Giá cao xuống thấp</option>
                                    <option value="price_low">Giá thấp đến cao</option>
                                    <option value="hightlight">Sản phẩm nổi bật</option>
                                    <option value="selling">Sản phẩm bán chạy</option>
                                    <option value="stocking">Còn hàng</option>
                                    <option value="out_stocking">Hết hàng</option>
                                </select>
                            </div>
                            @else @if(request()->input('status') =='queue')
                            <div class="form-action form-inline py-3">
                                <span style="font-size: 18px ;font-weight:bold ; padding-right:5px">Sort:</span>
                                <select class="form-control mr-1" id="sort_product" data-url="{{ url('admin/product/sort?status=queue') }}" name="sort_pro">
                                    <option>Chọn</option>
                                    <option value="new_product">Sản phẩm mới nhất</option>
                                    <option value="price_hight">Giá cao xuống thấp</option>
                                    <option value="price_low">Giá thấp đến cao</option>
                                    <option value="hightlight">Sản phẩm nổi bật</option>
                                    <option value="selling">Sản phẩm bán chạy</option>
                                    <option value="stocking">Còn hàng</option>
                                    <option value="out_stocking">Hết hàng</option>
                                </select>
                            </div>
                            @else @if(request()->input('status') =='all' ||request()->input('status') =='')
                            <div class="form-action form-inline py-3">
                                <span style="font-size: 18px ;font-weight:bold ; padding-right:5px">Sort:</span>
                                <select class="form-control mr-1" id="sort_product" data-url="{{ url('admin/product/sort?status=all') }}" name="sort_pro">
                                    <option>Chọn</option>
                                    <option value="new_product">Sản phẩm mới nhất</option>
                                    <option value="price_hight">Giá cao xuống thấp</option>
                                    <option value="price_low">Giá thấp đến cao</option>
                                    <option value="hightlight">Sản phẩm nổi bật</option>
                                    <option value="selling">Sản phẩm bán chạy</option>
                                    <option value="stocking">Còn hàng</option>
                                    <option value="out_stocking">Hết hàng</option>
                                </select>
                            </div>
                            @endif
                            @endif
                            @endif
                    </div>
                </div>

                <table class="table table-striped table-checkall" id="sort_pro">
                    @if($list_product->count()>0)
                    <thead>
                        <tr>
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">#</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Tình trạng</th>
                            @if(request()->input('status') != 'trash')
                            <th scope="col">Chi tiết</th>
                            <th scope="col">Tác vụ</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                    @error('list_check')
                        <div class="form-text text-danger"style="margin:0px">{{'Hãy chọn ít nhất 1 sản phẩm'}}</div>
                    @enderror
                        @foreach ($list_product as $item)
                        <tr class="">
                            <td>
                                <input type="checkbox" name="list_check[]" value="{{ $item->id }}">
                            </td>
                            <td>1</td>
                            <td><img width="80px" height="80px" src="{{ url($item->product_thumb) }}" alt=""></td>
                            <td style="width:144px"><a href="#">{{ $item->product_title }}</a></td>
                            <td>{{number_format($item->price , 0 ,'' , '.')."đ"}}</td>
                            <td>{{ $item->categary->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->status->name }}</td>
                            @if($item->quantity!=0)
                            <td><span class="{{ $item->status2_product_id == 1?' badge badge-success':'badge badge-dark' }}">{{ $item->status2_product->name }}</span></td>
                            @else
                            <td><span class="badge badge-dark">Hết hàng</span></td>
                            @endif
                            @if(request()->input('status') != 'trash')
                            <td  data-url="{{ url('admin/product/detail') }}"  data-toggle="modal" data-id="{{ $item->id }}" data-target="#exampleModal" id="product-detail" style="cursor: pointer;padding-left: 25px;">
                                <img width="30" src="{{asset('dau-detail.png')}}">
                            </td>
                            <td>
                                <a href="{{ route('admin/product/eidt' ,$item->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin/product/delete' ,$item->id) }}" onclick="return confirm('Bạn có muốn xoá sản phẩm ?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                <span  style="font-weight:bold ; text-algin:center ; color:red">Không tồn tại bản ghi bạn tìm</span>
                @endif
                </table>
                </form>
                <nav aria-label="Page navigation example">
                  {{ $list_product->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-body ul li label {
    width: 100%;
    color: #fff;
    background: #0a73e2;
    margin-bottom: 20px;
    padding: 6px 15px;
    font-weight: 600;
    border-radius: 5px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
li{
    list-style: none
}
.modal-body ul li  p{
    width :  300px;
    color: #fff;
    margin-bottom: 20px;
    padding: 6px 15px;
    font-weight: 600;
    border-radius: 5px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    background: #5196de;
}
#show_search .show{
    position: relative;
    width: 233px;
    background: #f7f7f7;
    max-height: 100%;
}
.box ul li{
    display: flex;
    padding-bottom: 10px;
    border-bottom: 1px solid gray;
    flex-wrap: wrap;
    padding-top: 5px;
    padding-left: 5px;
}
.content-search{
     margin-left: 10px
}
.content-search .title-search{
    text-transform: none;
    font-weight: 500;
}
.content-search .price-search{
    text-transform: none;
    font-weight: 500;
}
.show ul li:hover{
    background-color: #f1d3d3;
}
</style>
<div   class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chi tiết bài viết</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="img" style="margin-left: 76px; padding-bottom: 15px; }">
                        <img width="300px" id="img" src="">
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="p-2 mb-0 shadow-lg">
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Người tạo</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">ID</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Danh mục</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Giá</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Giá khuyễn mãi</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Tiêu đề</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Số lượng</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Nổi bật</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Tình trạng</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Trạng thái</label>
                            </div>
                        </li>
                        <li>
                            <div class="row no-gutters">
                                <label for="id">Ngày Tạo</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8" style="padding-left: 0px">

                        <ul class=" p-2 mb-0 shadow-lg">
                            <li>
                                <div class="row no-gutters">

                             <div class="user"><p>sadasd</p></div>

                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="id"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="categary"><p>color</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="price"><p>color</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="price_new"><p>color</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="title"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="quantity"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="hight"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="status_2"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="status"><p>sadasd</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="row no-gutters">
                                    <div class="create"><p>sadasd</p></div>
                                </div>
                            </li>
                        </ul>

                </div>
            </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
@endsection
