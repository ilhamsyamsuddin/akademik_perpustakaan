@extends('backend.layouts.master')

	@section('title','Buat Kelas ZOOM')
	@section('content')
		<div class="span9">
			<div class="content">
				@if (Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<form action="{{route('zoom.store')}}" method="POST" enctype="multipart/form-data">@csrf
					<div class="module">
						<div class="module-head">
							<h2>Buat kelas ZOOM</h2>
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

								<label class="control-label">Topik</label>
								<div class="controls">
									<input type="text" name="topic" class="span8"
									placeholder="Topik Kelas">
								</div>
								@error('topic')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<!--Deskripsi-->
								<label class="control-label">Waktu Mulai</label>
								<div class="controls">
                                    <input class="span8" type="datetime-local" name="start_time">
								</div>
								@error('start_time')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<label class="control-label">Durasi</label>
								<div class="controls">
									<input type="text" name="duration" class="span8"
									placeholder="Lama kelas(menit)">
								</div>
								@error('duration')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

								<label class="control-label">Password</label>
								<div class="controls">
									<input type="text" name="password" class="span8"
									placeholder="Password Kelas">
								</div>
								@error('password')
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