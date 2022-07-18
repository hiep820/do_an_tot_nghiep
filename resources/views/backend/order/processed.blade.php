@extends('backend.master.master')
@section('title', 'Processed')
@section('content')

	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/admin"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Đơn hàng</li>
			</ol>
		</div>
		<!--/.row-->
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đơn đặt hàng đã xử lý</div>
					@if(session('thongbao'))
						<div class="alert bg-success" role="alert">
							<svg class="glyph stroked checkmark">
								<use xlink:href="#stroked-checkmark"></use>
							</svg>{{ session('thongbao') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
						</div>
					@endif
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="/admin/order" class="btn btn-warning"><span class="glyphicon glyphicon-gift"></span>Đơn Chưa xử lý</a>
								<table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>Địa chỉ</th>
                                            <th>Thời gian</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($order as $val)
                                        <tr>
                                            <td>{{ $val->id }}</td>
                                            <td>{{ $val->full }}</td>
                                            <td>{{ $val->email }}</td>
                                            <td>{{ $val->phone }}</td>
                                            <td>{{ $val->address }}</td>
                                            <td>{{ Carbon\Carbon::parse($val->updated_at)->format('d-m-Y') }}</td>
                                            <td>

												<a href="/admin/order/detail/{{ $val->id }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>xem chi tiết</a>
											</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
							</div>
						</div>
						<div class="clearfix"></div>
						<div align="right">
							{{ $order->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->


	</div>
	<!--end main-->
@endsection
