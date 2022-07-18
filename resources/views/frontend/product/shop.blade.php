@extends('frontend.master.master')
@section('title', 'Shop')
@section('content')
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-9 col-md-push-3">
						<div class="row row-pb-lg">
							@foreach($taba as $val)
							<div class="col-md-4 text-center">
								<div class="product-entry">
									<div class="product-img" style="background-image: url(/backend/images/{{ $val->img }});">

										<div class="cart">
											<p>
												<span class="addtocart"><a href="/cart/add?id_product={{ $val->id }}&quantity=1"><i
															class="icon-shopping-cart"></i></a></span>
												<span><a href="/product/{{ $val->slug }}.html"><i class="icon-eye"></i></a></span>
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
						<div class="row">
							<div class="col-md-12">
								{{$taba ->appends([
                                      'start'=> $start,
                                      'end'=> $end,
                                      'theloai'=>$theloai,
                                ]) ->links() }}

							</div>
						</div>
					</div>
					<div class="col-md-3 col-md-pull-9">
						<div class="sidebar">


								<form action="/filter" method="get" class="colorlib-form-2">
                                    <div class="side">
                                        <h2>Danh mục</h2>
                                        <div class="fancy-collapse-panel">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <select name="theloai">
                                                    <option value="">
                                                        tất cả
                                                    </option>
                                                    @foreach ($cate as $item)
                                                        <option value="{{$item->id }}" @if ($item->id == $theloai) selected @endif>
                                                            {{ $item->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="side">
                                    <h2>Khoảng giá</h2>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Từ:</label>
												<div class="form-field">
													<!-- <i class="icon icon-arrow-down3"></i> -->
													<input type="text" value="{{$start}}" name="start" id="people" class="form-control">

												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Đến:</label>
												<div class="form-field">
													<!-- <i class="icon icon-arrow-down3"></i> -->
													<input type="text" value="{{$end}}" name="end" id="people" class="form-control">

												</div>
											</div>
										</div>
									</div>
									<button type="submit" style="width: 100%;border: none;height: 40px;">Tìm
										kiếm</button>

							</div>
                        </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main -->
@endsection
