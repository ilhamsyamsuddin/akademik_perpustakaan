@extends('backend.layouts.master')

	@section('title','Daftar Soal')
	@section('content')
        <div class="span9">
            <div class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="module">
                    <div class="module-head">
                        <h3>Semua Soal</h3>
                    </div>

                    <div class="module-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Soal</th>
                                <th>Kuis</th>
                                <th>Dibuat</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($questions)>0)
                                    @foreach ($questions as $key=>$question)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$question->question}}</td>
                                        <td>{{$question->quiz->name}}</td>
                                        <td>{{date('F d, Y', strtotime($question->created_at))}}</td>
                                        <td>
                                            <a href="{{route('question.show',[$question->id])}}">
                                                <button class="btn btn-inverse">Lihat jawaban</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('question.edit',[$question->id])}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                        <!--Tombol hapus-->
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
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <td>Belum ada Soal</td>
                                @endif

                            </tbody>
                        </table>
                        <div class="pagination pagination-centered">
                            {{ $questions->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div> 

    @endsection