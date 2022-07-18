@extends('backend.master.master')
@section('title', 'Chi tiết đơn hàng')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng / Chi tiết đặt hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Chi tiết đặt hàng</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-blue">
												<div class="panel-heading dark-overlay">Thông tin khách hàng</div>
												<div class="panel-body">
													<strong><span class="glyphicon glyphicon-user" aria-hidden="true"></span> : {{ $order->full }}</strong> <br>
													<strong><span class="glyphicon glyphicon-phone" aria-hidden="true"></span> : Số điện thoại: {{ $order->phone }}</strong>
													<br>
													<strong><span class="glyphicon glyphicon-send" aria-hidden="true"></span> : {{ $order->address }}</strong>
												</div>
											</div>
										</div>
									</div>


								</div>
								<table class="table table-bordered" style="margin-top:20px;">
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Thông tin Sản phẩm</th>
											<th>Giá sản phẩm</th>
											<th>Thành tiền</th>

										</tr>
									</thead>
									<tbody>
										@foreach($order->prd_order as $val)
										<tr>
											<td>{{ $val->id }}</td>
											<td>
												<div class="row">
													<div class="col-md-4">
														<img width="100px" src="images/{{ $val->img }}" class="thumbnail">
													</div>
													<div class="col-md-8">
														<p><b>Mã sản phẩm</b>: {{ $val->code }}</p>
														<p><b>Tên Sản phẩm</b>: {{ $val->name }}</p>
														<p><b>Số lương</b> : {{ $val->quantity }}</p>
													</div>
												</div>
											</td>
											<td>{{ number_format($val->price) }} VNĐ</td>
											<td>{{ number_format($val->price * $val->quantity) }} VNĐ</td>

										</tr>
										@endforeach
									</tbody>

								</table>
								<table class="table">
									<thead>
										<tr>
											<th width='70%'>
												<h4 align='right'>Tổng Tiền :</h4>
											</th>
											<th>
												<h4 align='right' style="color: brown;">{{ number_format($order->total) }} VNĐ</h4>
											</th>

										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
                                @if($order->state==2)
								<div class="alert alert-primary" role="alert" align='right'>
									<a onClick="return processed()" class="btn btn-success" href="/admin/order/paid/{{ $order->id }}" role="button">Xử lý</a>
                                    <a onClick="return cancel()" class="btn btn-danger" href="/admin/order/cancel/{{ $order->id }}" role="button">hủy bỏ</a>
								</div>
                                @endif

							</div>
						</div>
						<div class="clearfix"></div>
					</div>
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
	function processed(){
		return confirm("Đơn hàng sau khi xử lý sẽ được tính vào doanh thu!!");
	}
</script>
<script>
	function cancel(){
		return confirm("Bạn chắc muốn hủy đơn hàng ?");
	}
</script>
@endsection
