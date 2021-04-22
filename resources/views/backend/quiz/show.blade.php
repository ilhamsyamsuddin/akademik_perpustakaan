@extends('backend.layouts.master')

	@section('title','quiz questions')

	@section('content')

				<div class="span9">
                    <div class="content">

                    	 <!--foreach-->
                         @foreach($quizzes as $quiz)

                        <div class="module">
                            <div class="module-head">
                                
                                  <h3>{{$quiz->name}}</h3>

                            </div>

                            <div class="module-body">
                            	

                            <p><h3  class="heading"></h3></p>


                             

                                <div class="module-body table">
                                     <!--foreach-->
                                     @foreach($quiz->questions as $key=>$ques)

                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="read">
                                                 
                                                 <b>{{($key+1).'.'.$ques->question}}</b>
                                                
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                     <!--foreach-->
                                                     @foreach($ques->answers as $answer)
                                                        <p>
                                                            {{$answer->answer}} 
                                                            
                                                            @if($answer->is_correct)
                                                           <span class="badge badge-success"> 
                                                            jawaban benar
                                                           </span>
                                                           @endif
                                                            
                                                        </p>
                                                        @endforeach
                                                    <!--endforeach-->
                                                </td>

                                                

                                               
                                            </tr>
                                           


                                        </tbody>

                                    </table>
                                    @endforeach
                                    <!--endforeach-->
                                </div>
                              @endforeach
                            <!--endforeach-->

                                <div class="module-foot">
                                <td>
                                    <a href="{{route('quiz.index')}}"><button class="btn btn-inverse pull-center">Kembali</button></a>
                                 </td>
                                </div>

                       	
                            </div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

            </div> 
            </div> 


@endsection