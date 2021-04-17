@extends('backend.layouts.master')

	@section('title','Buat Kuis')
	@section('content')
		<div class="span9">
			<div class="content">
				<div class="module">
					<div class="module-head">
						<h2>Buat Kuis</h2>
					</div>
					<div class="module-body">
						<div class="control-group">
							<label class="control-label">Nama Kuis</label>
							<div class="controls">
								<input type="text" name="name" class="span8"
								placeholder="Nama Kuis" value="{{old('name')}}">

								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<!--Deskripsi-->
							<label class="control-label">Deskripsi Kuis</label>
							<div class="controls">
								<textarea name="description" class="span8" rows="10" 
								placeholder="Deskripsi Kuis" value="{{old('description')}}"></textarea>

								@error('description')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<!--waktu-->
							<label class="control-label">Waktu Kuis</label>
							<div class="controls">
								<input type="text" name="minutes" class="span8"
								placeholder="Waktu kuis(Menit)" value="{{old('minutes')}}">

								@error('minutes')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							<div class="controls">
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	@endsection