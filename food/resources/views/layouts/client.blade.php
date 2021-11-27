
<!DOCTYPE html>
<html itemscope itemtype="https://schema.org/WebSite" lang="vi">
<head>
    <title>Thực phẩm sạch</title>
    <meta charset="UTF-8">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('public/css/page.0.1.1.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <script language="javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script language="javascript" src="{{ asset('public/js/slick.min.js') }}"></script>
    <script language="javascript" src="{{ asset('public/js/slick.min.js') }}"></script>
</head>
<body>
    <header>
		<div class="container">
			<div class="top_hdr">
				<h2>
					Tư vấn miễn phí 24/7 : (+84) 466.819.555
				</h2>
			</div>
		</div>
		<div class="mid_hdr">
			<div class="container">
				<div class="row">
					<div class="span3 plr10 span-m12">
						<h1 class="logo">
							<a href="">
								<img src="{{ asset('public/img/logo.png') }}" alt="">siêu thị hạt giống nhập khẩu
							</a>
						</h1>
					</div>
					<div class="span9 plr10 span-m12">
						<div class="mid_hdr_right">
							<form class="form_search" action="" method="get" value="">
								<input type="search" class="search_field" name="" placeholder="Tìm Sản Phẩm ..."/>
								<input type="submit" class="search_submit" value="Tìm kiếm" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bot_hdr">
			<div class="container">
				<nav>
					<ul class="nav_lv0 nostyle t-off m-off">
						<li class="active"><a href="{{ url('?') }}" rel="nofollow">Trang chủ</a></li>
                        <li><a href="{{ url('page/gioi-thieu') }}">Giới thiệu</a></li>
                        @if($categary_pro->count()>0)
						<li>
                            @foreach ( $categary_pro as $item )
                            @if($item->parent_id == 0 && $item->status_id =1)
                            <a href="{{ url("product/$item->slug") }}">{{ $item->name }}<i class="fa fa-angle-down"></i></a>
                            @endif
                            @if($item->categary_child->count() >0)
							<ul class="nav_lv1">
                                @foreach ($item->categary_child  as $child )
                                @if($child->status_id == 1)
                                <li><a href="{{ url("product/$item->slug/$child->slug") }}">{{ $child->name }}</a></li>
                                @endif
                                @endforeach
                            </ul>
                            @endif
                            @endforeach
                        </li>
                        @endif
						<li><a href="{{ url('post/blog-kien-thuc') }}">Blog kiến thức</a></li>
						<li><a href="{{ url('page/lien-he') }}">Liên hệ</a></li>
					</ul>
					<div class="bar"><a><i class="fa fa-bars" aria-hidden="true"></i></a></div>
					<ul class="mnav nostyle">
						<li><a href="/" rel="nofollow">Trang chủ</a></li>
						<li><a href="/">Giới thiệu</a></li>
						<li class="hv">
							<a href="">Sản Phẩm</a>
							<ul class="mnav_1">
								<li><a href="/">Rau-Củ-Quả</a></li>
								<li><a href="/">Sữa-kem và sản phẩm từ sữa</a></li>
								<li><a href="/">Bánh kẹo-đồ ăn vặt-giải khát</a></li>
							</ul>
						</li>
						<li><a href="/">Blog kiến thức</a></li>
						<li><a href="/">Thông tin thanh toán</a></li>
					</ul>
					<div class="cart_hdr_tm t-on m-on">
						<a href="#" rel="nofollow">
							<i class="fa fa-shopping-cart"></i>
							<span>1</span>
						</a>
					</div>
					<div class="cart_hdr t-off m-off" >
						<a href="{{ url('cart/show') }}" rel="nofollow"><i style="font-size: 18px;" class="fa fa-shopping-cart"></i>
						<span id="count_cart" >({{ Cart::count() }})Sản phẩm</span>
						</a>
					</div>
				</nav>
				<script>
				$(".bar>a").click(function(){
				$(".mnav").toggleClass("dropdown");	});
				$(".hv>a").click(function(event){	event.preventDefault();
				if($(this).parent().hasClass("dropdown")){	$(this).parent().removeClass("dropdown");
				$(this).siblings().children().removeClass("dropdown");	}else{
				$(this).parent().addClass("dropdown");	$(this).parent().siblings().removeClass("dropdown");
				$(this).parent().siblings().children().children().removeClass("dropdown");	}	return false;
				});	$(document).mouseup(function (e){	var container = $('.mnav , .bar');
				if (!container.is(e.target) && container.has(e.target).length === 0){
				$('.mnav').removeClass('dropdown');	}
				});
				</script>
			</div>
		</div>
    </header>
    {{-- endheder --}}
    <div class="content_for_layout">
        @yield('content')
    </div>
    {{-- footer --}}
    <div class="container">
		<ul class="fixf owl arr_bx trademark nostyle">
			<li><a href=""><img src="{{ asset('public/img/5.jpg') }}" alt=""></a></li>
			<li><a href=""><img src="{{ asset('public/img/5.jpg') }}" alt=""></a></li>
			<li><a href=""><img src="{{ asset('public/img/5.jpg') }}" alt=""></a></li>
			<li><a href=""><img src="{{ asset('public/img/5.jpg') }}" alt=""></a></li>
			<li><a href=""><img src="{{ asset('public/img/5.jpg') }}" alt=""></a></li>
			<li><a href=""><img src="{{ asset('public/img/5.jpg') }}" alt=""></a></li>
		</ul>
	</div>
	<script>
	$(document).ready(function(){
	$('.trademark').slick({
	slidesToShow: 4,
	slidesToScroll: 1,
	autoplay: false,
	autoplaySpeed: 2000,
	responsive: [{ breakpoint: 768, settings: { slidesToShow: 2, slidesToScroll: 2, } },]
	});
	});
	</script>
    <footer>
		<div class="container">
			<div class="top_ft fixf center plr10 ptb10 mb20">
				<div class="form_email">
					<div class="span6 span-m12"><i class="fa fa-envelope-o" aria-hidden="true"></i>
						<h3>Đăng ký nhận email của chúng tôi</h3>
						<p>Để nhận ngay những chương trình khuyễn mãi</p>
					</div>
					<div class="span6 span-m12">
						<form action="" method="post">
							<input type="email" name="email" placeholder="Nhập email của bạn... ">
							<button type="submit">Đăng ký</button>
						</form>
					</div>
				</div>
			</div>
			<div class="mid_ft">
				<div class="row">
					<div class="span6 plr10 span-m12 mb20">
						<div class="image span-m12 mb10">
							<a href=""><img src="{{ asset('public/img/logo.png') }}" alt=""></a>
						</div>
						<div class="info">
							<p><strong><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ:</strong> Số 19 ngõ 52 Khu phố Thượng, Từ Sơn, Bắc Ninh.</p>
							<p><strong><i class="fa fa-phone" aria-hidden="true"></i>Điện thoại:</strong> 098 851 155-<strong>hotline:</strong>09888511556</p>
							<p><strong><i class="fa fa-envelope" aria-hidden="true"></i>Email:</strong> support@gmail.com</p>
							<p><strong><i class="fa fa-globe" aria-hidden="true"></i>website:</strong>demo.vn</p>
						</div>
                    </div>

					<div class="span6 mb20 span-m12">

						<div class="span6 span-m12 plr10 mb20">
							<h3>Thông tin hỗ trợ</h3>
							<ul class="list_link">
								<li><a href="{{ url('page/gioi-thieu') }}">Giới thiệu</a></li>
								<li><a href="{{ url('page/lien-he') }}">Liên hệ</a></li>
								<li><a href="{{ url('page/chinh-sach-bao-hanh') }}">Chính sách bảo hành</a></li>
							</ul>
                        </div>

						<div class="span6 span-m12 plr10 mb20">
							<h3>chính sách</h3>
							<ul class="list_link">
								<li><a href="{{ url('page/chinh-sach-doi-tra-tai-ismart') }}">Chính Sách đổi Trả Tại Ismart </a></li>
								<li><a href="{{ url('page/chinh-sach-su-dung') }}">Chính Sách Sử Dụng</a></li>
								<li><a href="{{ url('page/chinh-sach-bao-mat') }}">Chính Sách Bảo Mật</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="bot_ft">
                <p>© Copyright kars group</p>
                <p style="float:right">Design by <a href="" target="_blank" style="color:#fff">kars Group</a></p>
            </div>
        </div>
    </footer>

</body>
</html>
