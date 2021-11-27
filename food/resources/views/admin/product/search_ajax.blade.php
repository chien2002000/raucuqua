
<div class="show">
    <div class="box">
        @if($search_ajax->count() >0)
        <ul style="padding-left:2px">
            @foreach ($search_ajax as $item)
            <li>
                <a href="{{ url('admin/product/list/detail', $item->id) }}"><img style="cursor: pointer;" width="50" src="{{ url($item->product_thumb) }}"></a>
                <div class="content-search">
                    <div data-url="{{ url('admin/product/by_id') }}" data-id=" {{ $item->id }} " style="cursor: pointer;" class="title-search" >{{ $item->product_title }}</div>
                    <div class="price-search"><span style="color:red">Giá:{{number_format($item->price  , 0 ,'' , '.')."đ"}}</span></div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <span  style="font-weight:bold ; text-algin:center ; color:red">Không tồn tại bản ghi bạn tìm</span>
        @endif
    </div>
</div>
<script>
    $(document).ready(function(){
    $('div.title-search').click(function(){
        var id = $(this).attr('data-id');
        var url =$(this).attr('data-url');
        var data ={id:id}
        $.ajax(
        {
          url: url,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          data:data,
          dataType: 'text',
          success: function (data) {
            $('table#sort_pro').html(data);
          },
        }
    )
    })
})
</script>
