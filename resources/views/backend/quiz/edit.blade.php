@extends('backend.layouts.master')

	@section('title','create quiz')

	@section('content')

	<div class="span9">
     <div class="content">

     	@if(Session::has('message'))

     		<div class="alert alert-success">{{Session::get('message')}}</div>
     	@endif



     <form action="{{route('quiz.update',[$quiz->id])}}" method="POST">@csrf
     	{{method_field('PUT')}}
			
	<div class="module">
            <div class="module-head">
                <h3>Edit Kuis</h3>
            </div>

            <div class="module-body">
                 <div class="control-group">
				<label class="control-lable" for="name">Nama Kuis</label>
				<div class="controls"> 
					<input type="text" name="name" class="span8 rows="10" @error('name') border-red @enderror" placeholder="name of a quiz" value="{{$quiz->name}}  " >
				</div>
			     @error('name')
			    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
			@enderror      

			</div>

			<div class="control-group">
				<label class="control-lable" for="name">Deskripsi</label>
				<div class="controls">
					<textarea name="description" rows = "5" class="span8 @error('description') is-invalid @enderror"> {{$quiz->description}}   </textarea>
					
				</div>
			        @error('description')
			        <span class="invalid-feedback" role="alert">
			            <strong>{{ $message }}</strong>
			        </span>
			    @enderror

			</div>

			<div class="control-group">
				<label class="control-lable" for="name">Waktu(dalam menit)</label>
				<div class="controls">
					<input type="text" name="minutes" class="span8 @error('minutes') is-invalid @enderror" placeholder="Duration of a quiz" value="{{$quiz->minutes}} " >
				</div>
			   @error('minutes')
			        <span class="invalid-feedback" role="alert">
			            <strong>{{ $message }}</strong>
			        </span>
			    @enderror
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-success">Update</button>
				</div>

		    </div>


   		</div>
	</div>

</form>


</div>
</div>
                      
                    
@endsection