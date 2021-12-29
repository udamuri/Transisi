@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">Create Companies</div>

	<div class="card-body">
		<form method="POST" action="{{ route('admin.companies.store') }}" class="m-t-40" enctype="multipart/form-data" >
			@csrf
			@include('admin.company.form', ['button' => 'Save', 'mode' => 'create'])
		</form>
	</div>
</div>


@endsection
