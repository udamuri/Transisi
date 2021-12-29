@extends('layouts.app')
@section('page-title', 'Companies')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-2">
							Companies
						</div>
						<div class="col-8 text-center">
							<form method="GET">
								<div class="col-12" >
									<div class="input-group">
										<div class="form-outline">
										  <input type="search" name="search" value="{{$search ?? null}}" id="form1" class="form-control" placeholder="Search..." />
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-2 text-right">
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
												<a class="btn btn-rounded btn-outline-danger btn-sm" href="{{route('admin.pdf.employees', ['company_id' => $value->id])}}" target="_BLANK">Employee Pdf</a><br>
												<a class="btn btn-rounded btn-outline-primary btn-sm mt-4" href="{{route('admin.companies.edit', $value->id)}}">Edit</a>
												<button class="btn btn-rounded btn-outline-danger btn-sm jquery-postback mt-4" 
													data-href="{{route('admin.companies.destroy', $value->id)}}"
													data-redirect="{{route('admin.companies.index')}}"
												>Delete</button>
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


@section('scripts-js')
$( ".jquery-postback" ).bind( "click", function(e) {
	if (confirm("Are you sure you want to delete this company?") == true) {
		var urlD = $(this).data('href');
		var redirectUrl = $(this).data('redirect');
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			method: 'DELETE',
			url: urlD,
			success: function(){
				window.location.href=redirectUrl;
			}
		});
	} else {
		console.log("You canceled!");
	}

	
});
@endsection