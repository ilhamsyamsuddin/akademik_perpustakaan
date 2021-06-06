@extends('backend.layouts.master')

	@section('title','exam assigned user')

	@section('content')

	<div class="span9">
                    <div class="content">
                    	@if(Session::has('message'))

     					<div class="alert alert-success">		{{Session::get('message')}}</div>
     					@endif
                        <div class="module">
                            <div class="module-head">
                                <h3>Kuis User</h3>
                            </div>

                            <div class="module-body">
                            	<table class="table table-striped">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Nama User</th>
									  <th>Kuis</th>
									  
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
								  	@if(count($quizzes)>0)
								  	@foreach($quizzes as $quiz)
								  	@foreach($quiz->users as $key=>$user)
									<tr>
									  <td>{{$key+1}}</td>
									  <td>{{$user->name}}</td>
									  <td>{{$quiz->name}}</td>
									  
                                      <td>
                                        <a href="{{route('quiz.show',[$quiz->id])}}">
                                            <button class="btn btn-inverse">Lihat Soal</button>
                                        </a>
                                      </td>	
									  
									  <td>
                                        <a href="result/{{$user->id}}/{{$quiz->id}}">
                                            <button class="btn btn-primary">Lihat Hasil</button>
                                        </a>
									  </td>
									</tr>
									@endforeach
									@endforeach

									@else
									<td>Tidak ada user</td>
									@endif
									
									
								  </tbody>
								</table>
                       		</div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 




@endsection