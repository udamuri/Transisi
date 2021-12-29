@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">Create Employee</div>

	<div class="card-body">
		<form method="POST" action="{{ route('admin.employees.update', $model->id) }}" class="m-t-40" enctype="multipart/form-data" >
			@csrf
			<input type="hidden" name="_method" value="PUT" />
			@include('admin.employee.form', ['button' => 'Save Change', 'mode' => 'update'])
		</form>
	</div>
</div>
@endsection
