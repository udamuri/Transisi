<div class="row" >
    <div class="col-md-8 col-12" >
		<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

			<div class="col-md-6">
				<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $model->name ?? null) }}"  >

				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

			<div class="col-md-6">
				<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $model->email ?? null) }}"  >

				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

			<div class="col-md-6">
				<select class="form-control" id="company_id" class="form-control @error('company_id') is-invalid @enderror" name="company_id"></select>

				@error('company_id')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>
		
		<div class="form-group row">
			<label class="col-md-4 col-form-label text-md-right">&nbsp;</label>

			<div class="col-md-6">
				<a href="{{route('admin.companies.index')}}" class="btn btn-rounded btn-outline-danger" >Cancel</a>&nbsp;&nbsp;
				<button type="submit" class="btn btn-rounded btn-outline-primary" >{{$button}}</button>
			</div>
		</div>
    </div>
</div>

@section('scripts-js')
var DataCategory = {!! $companyData !!};
   $('#company_id').select2({
        theme: "bootstrap",
        minimumInputLength: 0,
        allowClear: true,
        placeholder: 'Select Company',
        data:DataCategory ,
        ajax: {
           dataType: 'json',
           url: "{{route('admin.ajax.companies')}}",
           delay: 800,
           data: function(params) {
             return {
               search: params.term
             }
           },
           processResults: function (data, page) {
           return {
             results: data
           };
         },
       }
   }).on('select2:select', function (evt) {
      var data = $("#company_id option:selected").text();
   });
@endsection