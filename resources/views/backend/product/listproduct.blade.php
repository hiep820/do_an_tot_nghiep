@extends('backend.master.master')
@section('title', 'Product')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách sản phẩm</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách sản phẩm</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								@if(session('thongbao'))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>{{ session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
								@endif
								<a href="/admin/product/add" class="btn btn-primary">Thêm sản phẩm</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Tình trạng</th>
											<th>Danh mục</th>

											<th width='18%'>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($products as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>
												<div class="row">
													<div class="col-md-3"><img src="images/{{ $row->img }}" alt="Áo đẹp" width="100px" class="thumbnail"></div>
													<div class="col-md-9">
														<p><strong>Mã sản phẩm : {{ $row->code }}</strong></p>
														<p>Tên sản phẩm: {{ $row->name }}</p>



													</div>
												</div>
											</td>
											<td>{{ number_format($row->price) }} VND</td>
											<td>
												@if($row->soluong >0)
													<a class="btn btn-success" href="#" role="button">Còn hàng</a>
												@else
													<a class="btn btn-danger" href="#" role="button">Hết hàng</a>
												@endif

                                                {{-- <p>Số lượng :{{ $row->soluong - $row->prd_order->where('order.state','=',2)->sum('quantity')}}</p> --}}

                                                <p>Số lượng còn : {{$row->soluong}}


                                                </p>
                                                <p>số lượng tổng : {{$row->soluong}}

                                                </p>
                                                @if($row->state == 1)
                                                    <a class="btn btn-success" href="#" role="button">Đang bán</a>
                                                @else
                                                    <a class="btn btn-danger" href="#" role="button">Ngừng bán</a>
                                                @endif
											</td>
											<td>{{ $row->category->name }}</td>
											<td>
												<a href="/admin/product/edit/{{ $row->id }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onClick="return del_prd('{{ $row->name }}')" href="/admin/product/delete/{{ $row->id }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>

										</tr>

										@endforeach

									</tbody>
								</table>
								<div align='right'>
									{{ $products->links() }}
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->
@endsection
@section('script')
@parent
<script>
	function del_prd(name){
		return confirm("Xác nhận xóa sản phẩm: "+name+"?");
	}
</script>

@endsection
