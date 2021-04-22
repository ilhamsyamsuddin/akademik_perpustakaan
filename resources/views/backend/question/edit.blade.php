@extends('backend.layouts.master')

	@section('title','Update Soal')
	@section('content')
		<div class="span9">
			<div class="content">
				@if (Session::has('message'))
					<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif
				<form action="{{route('question.update', [$question->id])}}" method="POST">@csrf
					{{method_field('PUT')}}
					<div class="module">
						<div class="module-head">
							<h2>Edit Soal</h2>
						</div>
						<div class="module-body">
							<div class="control-group">
                                
								<label class="control-label">Pilih kuis</label>
								<div class="controls">
                                    <select name="quiz">
                                        @foreach (App\Models\Quiz::all() as $quiz)
                                        	<option value="{{$quiz->id}}"
												@if ($quiz->id == $question->quiz_id)selected
												@endif
											>{{$quiz->name}}</option>
                                        @endforeach
                                    </select>
								</div>
								@error('question')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

                                <label class="control-label">Pertanyaan</label>
								<div class="controls">
									<input type="text" name="question" class="span8"
									placeholder="isi Pertanyaan" value="{{$question->question}}">
								</div>
								@error('question')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror

                                <label class="control-label">Pilihan Jawaban</label>
								<div class="controls">
                                    @foreach($question->answers as $key=>$answer)
                                    <input type="text" name="options[]" class="span7"
									placeholder="pilihan jawaban {{$key+1}}" value="{{$answer->answer}}" required>

                                    <input type="radio" name="correct_answer" value="{{$key}}"
									@if ($answer->is_correct)
										{{'checked'}}
									@endif>
                                    <span>pilih jika benar</span>
                                    @endforeach
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