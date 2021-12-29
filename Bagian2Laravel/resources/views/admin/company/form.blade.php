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
			<label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

			<div class="col-md-6">
				<input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website', $model->website ?? null ) }}"  >

				@error('website')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
		</div>

		<div class="form-group row">
			<label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

			<div class="col-md-6">
				<input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo"  >

				@error('logo')
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