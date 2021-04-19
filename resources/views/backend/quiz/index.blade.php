@extends('backend.layouts.master')

	@section('title','Daftar Kuis')
	@section('content')
        <div class="span9">
            <div class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="module">
                    <div class="module-head">
                        <h3>Daftar Kuis</h3>
                    </div>

                    <div class="module-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nama Kuis</th>
                                <th>Deskripsi</th>
                                <th>Waktu(Menit)</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($quizzes)>0)
                                    @foreach ($quizzes as $key=>$quiz)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$quiz->name}}</td>
                                        <td>{{$quiz->description}}</td>
                                        <td>{{$quiz->minutes}}</td>
                                        <td>
                                            <a href="">
                                                <button class="btn btn-inverse">Lihat Soal</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('quiz.edit',[$quiz->id])}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                        <!--Tombol hapus-->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$quiz->id}}">
                                            Delete
                                        </button>
                                  
      
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$quiz->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{route('quiz.destroy',[$quiz->id])}}" method="post">@csrf
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
                                    <td>Belum ada kuis</td>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div> 

    @endsection