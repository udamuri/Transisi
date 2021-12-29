@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">Create Companies</div>

	<div class="card-body">
		<form method="POST" action="{{ route('admin.companies.update', $model->id) }}" class="m-t-40" enctype="multipart/form-data" >
			@csrf
			<input type="hidden" name="_method" value="PUT" />
			@include('admin.company.form', ['button' => 'Save Change', 'mode' => 'update', 'model' => $model])
		</form>
	</div>
</div>
@endsection
