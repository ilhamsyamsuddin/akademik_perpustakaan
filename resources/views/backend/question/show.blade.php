@extends('backend.layouts.master')

	@section('title','create quiz')

	@section('content')

				<div class="span9">
                    <div class="content">
                    	
                        <div class="module">
                            <div class="module-head">
                                <h3>Jawaban Soal</h3>
                            </div>

                            <div class="module-body">
                            	
                                
                            <p><h3  class="heading">{{$question->question}}</h3></p>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            @foreach ($question->answers as $key=>$item)
                                            <tr class="read">
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    {{$key+1}}.{{$item->answer}}
                                                    @if ($item->is_correct==1)
                                                        <span class="badge badge-success pull-right">benar</b></span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="module-foot">
                                    <a href="{{route('question.index')}}">
                                        <button class="btn btn-inverse">Kembali</button>
                                    </a>
                                    <a href="{{route('question.edit',[$question->id])}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$question->id}}">
                                        Delete
                                    </button>
                              
  
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{route('question.destroy',[$question->id])}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Yakin ingin menghapus?
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-outline-danger">Ya</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                       	
                            </div>
                   		</div>
                		
                		</div>
           			 
           			</div>
        		</div> 

            </div> 
            </div> 


@endsection