@extends('backend.layouts.master')

	@section('title','Buat Kuis')
	@section('content')
		<div class="span9">
			<div class="content">
				@if (Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<form action="{{route('exam.store')}}" method="POST">@csrf
					<div class="module">
						<div class="module-head">
							<h2>Buat Soal</h2>
						</div>
						<div class="module-body">
							<div class="control-group">
                                
								<label class="control-label">Pilih kuis</label>
								<div class="controls">
                                    <select name="quiz">
                                        @foreach (App\Models\Quiz::all() as $quiz)
                                            <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                        @endforeach
                                    </select>
								</div>
								@error('quiz')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

                                <label class="control-label">Pilih User</label>
                                <div class="controls">
                                    <select name="user_id" class="span8">
                                        @foreach (App\Models\User::all() as $user)
                                            @if ($user->is_admin ==0)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
								</div>
								@error('user')
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