@extends('backend.layouts.master')

	@section('title','Buat Materi Pelajaran')
	@section('content')
		<div class="span9">
			<div class="content">
				@if (Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<form action="{{route('material.store')}}" method="POST" enctype="multipart/form-data">@csrf
					<div class="module">
						<div class="module-head">
							<h2>Buat Materi</h2>
						</div>
						<div class="module-body">
							<div class="control-group">

								<label class="control-label">Pilih Kategori</label>
								<div class="controls">
                                    <select name="category">
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
								</div>
								@error('category')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<label class="control-label">judul Materi</label>
								<div class="controls">
									<input type="text" name="title" class="span8"
									placeholder="Judul materi">
								</div>
								@error('title')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<!--Deskripsi-->
								<label class="control-label">Konten</label>
								<div class="controls">
									<textarea name="content" class="span8" rows="5" 
									placeholder="Kontent tidak boleh kosong" value="{{old('content')}}"></textarea>
								</div>
								@error('content')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<label class="control-label">File Materi</label>
								<div class="controls">
									<input type="file" name="document">
								</div>
								@error('document')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<label class="control-label">Video Materi</label>
								<div class="controls">
									<input type="file"  name="video">
								</div>
								@error('video')
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