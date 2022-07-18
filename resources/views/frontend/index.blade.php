@extends('frontend.master.master')
@section('title', 'Home')
@section('content')
<!-- main -->
<div id="colorlib-featured-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="/product/shop" class="f-product-1" style="background-image: url(images/i1.jpg);">
					<div class="desc">
						<h2>Mẫu <br>cho <br>Nam</h2>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<a href="" class="f-product-2" style="background-image: url(images/i2.jpg);">
							<div class="desc">
								<h2> <br>Váy <br> Mới</h2>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="" class="f-product-2" style="background-image: url(images/i3.jpg);">
							<div class="desc">
								<h2>Sale <br>20% <br>off</h2>
							</div>
						</a>
					</div>
					<div class="col-md-12">
						<a href="" class="f-product-2" style="background-image: url(images/i4.jpg);">
							<div class="desc">
								<h2>Giầy <br>cho <br>Nam</h2>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/banner-1.jpg);"
data-stellar-background-ratio="0.5">
<div class="overlay"></div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="intro-desc">
				<div class="text-salebox">
					<div class="text-lefts">
						<div class="sale-box">
							<div class="sale-box-top">
								<h2 class="number">45</h2>
								<span class="sup-1">%</span>
								<span class="sup-2">Off</span>
							</div>
							<h2 class="text-sale">Sale</h2>
						</div>
					</div>
					<div class="text-rights">
						<h3 class="title">Dặt hàng hôm nay,nhận ngay khuyến mãi!</h3>
						<p>Đã có hơn 1000 đơn hàng được gửi đi ở khắp quốc gia.</p>
						<p>
							<a href="/product/shop" class="btn btn-primary">Mua ngay</a>
							<a href="#" class="btn btn-primary btn-outline">Đọc thêm</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
				<h2><span>Sản phẩm Nổi bật</span></h2>
				<p>Đây là những sản phẩm được ưa chuộng nhất năm 2021</p>
			</div>
		</div>
		<div class="row">
			@foreach($prd_featered as $val)
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(/backend/images/{{ $val->img  }});">
						<div class="cart">
							<p>
								<span class="addtocart">
									<a href="/cart/add?id_product={{ $val->id }}&quantity=1">
										<i
										class="icon-shopping-cart"></i>
									</a>
								</span>
								<span>
									<a href="/product/{{ $val->slug }}.html">
										<i class="icon-eye"></i>
									</a>
								</span>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="/product/{{ $val->slug }}.html">{{ $val->name }}</a></h3>
						<p class="price"><span>{{ number_format($val->price)  }} đ</span></p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
				<h2><span>Sản phẩm mới</span></h2>
				<p>Đây là những sản phẩm mới của năm năm 2021</p>
			</div>
		</div>

		<div class="row">
			@foreach($prd_new as $val)
			<div class="col-md-3 text-center">
				<div class="product-entry">
					<div class="product-img" style="background-image: url(/backend/images/{{ $val->img }});">
						<p class="tag"><span class="new">New</span></p>
						<div class="cart">
							<p><span class="addtocart"><a href="/cart/add?id_product={{ $val->id }}&quantity=1"><i
								class="icon-shopping-cart"></i></a></span>
								<span>
									<a href="/product/{{ $val->slug }}.html">
										<i class="icon-eye"></i>
									</a>
								</span>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="/product/{{ $val->slug }}.html">{{ $val->name }}</a></h3>
						<p class="price"><span>{{ number_format($val->price) }} đ</span></p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- end main -->

@endsection
