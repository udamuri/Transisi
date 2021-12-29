@extends('layouts.app')
@section('page-title', 'Companies')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-6">
							Companies
						</div>
						<div class="col-6 text-right">
							<a class="btn btn-rounded btn-outline-primary btn-sm" href="{{route('admin.companies.create')}}">Add New</a>
						</div>
					</div>
					
				</div>

				<div class="card-body">
					<div class="row" >
						<div class="col-12" >
							<div class="table-responsive">
								<table class="table color-table primary-table">
									<thead>
										<tr>
											<th>No</th>
											<th>Image</th>
											<th>Name</th>
											<th>Email</th>
											<th>Website</th>
											<th class="text-center" width="15%">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($model as $value)
										<tr>
											<td>{{++$i}}</td>
											<td>{{$value->logoUrl}}</td>
											<td>{{$value->name}}</td>
											<td>{{$value->email}}</td>
											<td>{{$value->website}}</td>
											<td class="text-center">
												<a class="btn btn-rounded btn-outline-primary btn-sm" href="{{route('admin.companies.edit', $value->id)}}">Edit</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="row" >
								<div class="col-12 text-center" >
									{{ $model->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection