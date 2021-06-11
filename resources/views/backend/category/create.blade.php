@extends('backend.layouts.master')

	@section('title','Buat Kuis')
	@section('content')
		<div class="span9">
			<div class="content">
				@if (Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<form action="{{route('category.store')}}" method="POST">@csrf
					<div class="module">
						<div class="module-head">
							<h2>Buat Kategori</h2>
						</div>
						<div class="module-body">
							<div class="control-group">
								<label class="control-label">Nama Kategori</label>
								<div class="controls">
									<input type="text" name="name" class="span8"
									placeholder="Nama Kategori pelajaran" value="{{old('name')}}">
								</div>
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<!--Deskripsi-->
								<label class="control-label">Deskripsi Kategori</label>
								<div class="controls">
									<textarea name="description" class="span8" rows="5" 
									placeholder="Deskripsi Kategori(bisa kosong)" value="{{old('description')}}"></textarea>
								</div>
								@error('description')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<div class="controls">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	@endsection