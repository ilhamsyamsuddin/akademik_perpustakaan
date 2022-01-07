@extends('backend.layouts.master')

	@section('title','Edit Materi Pelajaran')
	@section('content')
		<div class="span9">
			<div class="content">
				@if (Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<form action="{{route('material.update', [$material->id])}}" method="POST">@csrf
					{{method_field('PUT')}}
					<div class="module">
						<div class="module-head">
							<h2>Edit Materi</h2>
						</div>
						<div class="module-body">
							<div class="control-group">

								<label class="control-label">Pilih Kategori</label>
								<div class="controls">
                                    <select name="category" value="{{$material->category->id}}">
										default
                                        @foreach (App\Models\Category::all() as $category)
											@if ($material->category_id == $category->id)
												<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
								  			@else
												<option value="{{ $category->id }}">{{ $category->name }}</option>
								  			@endif
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
									placeholder="Judul materi" value="{{$material->title}}">
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
									placeholder="konten tidak boleh kosong">{{$material->content}}</textarea>
								</div>
								@error('content')
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