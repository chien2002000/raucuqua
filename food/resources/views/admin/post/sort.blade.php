
<thead>
    <tr>
        <th scope="col">
            <input name="checkall" type="checkbox">
        </th>
        <th scope="col">#</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Danh mục</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Trạng thái</th>
        @if(request()->input('status') != 'trash')
        <th scope="col">Chi tiết</th>
        <th scope="col">Tác vụ</th>
        @endif
    </tr>
</thead>
<tbody>
 @error('list_check')
    <div class="form-text text-danger"style="margin:0px">{{'Hãy chọn ít nhất 1 bài viết'}}</div>
@enderror
    @foreach ($list_post as $item)
        <tr>
            <td>
                <input type="checkbox" name="list_check[]" value="{{ $item->id }}">
            </td>
            <td scope="row">1</td>
            <td><img width="80px" height="80" src="{{ url($item->thumbnail) }}" alt=""></td>
            <td style="width:300px"><a href="">{{ $item->post_title }}</a></td>
            <td>{{$item->categary->name }}</td>
            <td>{{ $item->created_at }}</td>
            @if(request()->input('status') != 'trash')
            <td>{{ $item->status->name }}</td>
            @else
            <td>{{ 'Xoá tạm thời'}}</td>
            @endif
            @if(request()->input('status') != 'trash')
            <td data-url="{{ url('admin/post/detail') }}"  data-toggle="modal" data-id="{{ $item->id }}" data-target="#exampleModal" id="post-detail-sort" style="cursor: pointer;padding-left: 25px;">
                <img width="30" src="{{asset('dau-detail.png')}}">
            </td>
            <td>
                <a href="{{ route('post/edit' , $item->id)  }}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="{{ route('post/delete' , $item->id)  }}" onclick="return confirm('Bạn có chắc chắn muốn xoá bài viết ?')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
            </td>
            @endif
        </tr>
    @endforeach
</tbody>
<script>
    $(document).ready(function(){
    $('td#post-detail-sort').click(function(){
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var data = {id:id};
        $.ajax(
            {
              url: url,
              method: 'GET',
              data: data,
              dataType: 'json',
              success: function (data) {
                $('.modal .modal-body .img img').attr('src' ,data.img);
                $('.modal .modal-body ul li .user p').text(data.fullName);
                $('.modal .modal-body ul li .id p').text(data.id);
                $('.modal .modal-body ul li .categary p').text(data.categary);
                $('.modal .modal-body ul li .title p').text(data.title);
                $('.modal .modal-body ul li .hight p').text(data.hightlight);
                $('.modal .modal-body ul li .status p').text(data.status);
                $('.modal .modal-body ul li .create p').text(data.time);
              },
            }
        )
    })
})

</script>
