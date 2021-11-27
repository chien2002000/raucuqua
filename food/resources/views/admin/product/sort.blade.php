@if($list_product_sort->count()>0)
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
        <th scope="col">Chi tiết</th>
        <th scope="col">Tác vụ</th>
    </tr>
</thead>
<tbody>
@error('list_check')
    <div class="form-text text-danger"style="margin:0px">{{'Hãy chọn ít nhất 1 bài viết'}}</div>
@enderror
    @foreach ($list_product_sort as $item)
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
        <td><span class="{{ $item->status2_product_id == 1?' badge badge-success':'badge badge-dark' }}">{{ $item->status2_product->name }}</span></td>
        <td data-url="{{ url('admin/product/detail') }}"  data-toggle="modal" data-id="{{ $item->id }}" data-target="#exampleModal" id="product-detail-sort" style="cursor: pointer;padding-left: 25px;">
            <img width="30" src="{{asset('dau-detail.png')}}">
        </td>
        <td>
            <a href="{{ route('admin/product/eidt' ,$item->id) }}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
            <a href="{{ route('admin/product/delete' ,$item->id) }}" onclick="return confirm('Bạn có muốn xoá sản phẩm ?')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
</tbody>
@else
<span  style="font-weight:bold ; text-algin:center ; color:red">Không tồn tại bản ghi bạn tìm</span>
@endif
<script>
    $(document).ready(function(){
    $('td#product-detail-sort').click(function(){
        var id = $(this).attr('data-id');
        var url =$(this).attr('data-url');
        var data = {id:id}
        $.ajax({
            url: url,
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data: data,
            dataType: 'json',
            success: function (data) {
                $('img#img').attr('src' , data.img);
                $('.modal .modal-body ul li .user p').text(data.fullName),
                $('.modal .modal-body ul li .id p').text(data.id)
                $('.modal .modal-body ul li .categary p').text(data.categary)
                $('.modal .modal-body ul li .price p').text(data.price)
                $('.modal .modal-body ul li .price_new p').text(data.price_new)
                $('.modal .modal-body ul li .title p').text(data.title)
                $('.modal .modal-body ul li .hight p').text(data.lightHight)
                $('.modal .modal-body ul li .status_2 p').text(data.status2)
                $('.modal .modal-body ul li .status p').text(data.status)
                $('.modal .modal-body ul li .create p').text(data.time)
            },
        })
    })
})

</script>
