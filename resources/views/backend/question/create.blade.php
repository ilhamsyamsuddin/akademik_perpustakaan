@extends('backend.layouts.master')

	@section('title','Buat Kuis')
	@section('content')
		<div class="span9">
			<div class="content">
				@if (Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<form action="{{route('question.store')}}" method="POST">@csrf
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

                                <label class="control-label">Pertanyaan</label>
								<div class="controls">
									<input type="text" name="question" class="span8"
									placeholder="isi Pertanyaan" value="{{old('question')}}">
								</div>
								@error('question')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

                                <label class="control-label">Pilihan Jawaban</label>
								<div class="controls">
                                    @for ($i = 0; $i < 4; $i++)
                                    <input type="text" name="options[]" class="span7"
									placeholder="pilihan jawaban {{$i+1}}" value="{{old('options.[$i]')}}" required>

                                    <input type="radio" name="correct_answer" value="{{$i}}">
                                    <span>pilih jika benar</span>
                                    @endfor
								</div>
								@error('options')
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