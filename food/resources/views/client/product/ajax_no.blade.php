

 <div class="breadcrumb">
    <ul class="fixf">
        <li><a href="">Trang chủ</a></li>
        <li>{{ $categary_chil->name }}</li>
    </ul>
</div>
<div class="block_sort fixf mb20">
    <ul class="quantity_prd">
        <li>View:</li>
        <li class="current"><a href="">24</a></li>
        <li><a href="">48</a></li>
        <li><a href="">ALL</a></li>
    </ul>
    <div class="sort" >
        <a href="" class="btn_open"><span>Sắp xếp</span></a>
        <ul class="overact" id="sort">
            <li><a href="">Mặc định</a></li>
            <li><a href="">Theo giá thấp - cao</a></li>
            <li><a href="">Theo giá cao - thấp</a></li>
            <li><a href="">Sản phẩm bán chạy</a></li>

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
@if($product_ajax->count()>0)
<div class="block_prd">
    <div class="row" data-url="{{ url('product/ajax/sort/fetch_data1') }}">
        @foreach ( $product_ajax as  $item)
        @php
                     $categary =  $item->categary->slug;
         @endphp
        <div class="wrapper_prd span3 mb20 span-t4 span-m6">
            <div class="item_prd" data-id="{{ $id }}">
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
    {{ $product_ajax->links() }}
</div>
@else
    <div class="error_404">
        <img src="{{url('public/uploads/404.png')}}">
        <div class="redict">
        <a href="{{url('/')}}" style="color: #32ba43;" >Quay Lại Trang Chủ</a>
        </div>
    </div>
@endif
<script>
    $('#sort').change(function(e){
        event.preventDefault();
    })
    $('.pagination a').on('click', function(e){
        e.preventDefault();
        var  price_filter = $('[name="r-price"]:radio:checked').val();
        var page = $(this).attr('href').split('page=')[1];
        var id = $('.item_prd').attr('data-id');
        var url = $('.block_prd .row').attr('data-url');
        var data = {price_filter:price_filter ,id:id}
        $.ajax(
            {
              url: url+'?page='+page,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              data: data,
              dataType: 'text',
              success: function (data) {
                $('#ajax_sort').html(data);
              },
            }
        )
});
</script>
