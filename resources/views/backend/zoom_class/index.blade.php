@extends('backend.layouts.master')

	@section('title','Daftar class')
	@section('content')
        <div class="span9">
            <div class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="module">
                    <div class="module-head">
                        <h3>Daftar Kelas</h3>
                    </div>

                    <div class="module-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Kelas</th>
                                <th>ID Kelas</th>
                                <th>Topik</th>
                                <th>Mulai</th>
                                <th>Password</th>
                                <th>Link Kelas</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($classes)>0)
                                    @foreach ($classes as $key=>$class)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$class->category_id}}</td>
                                        <td>{{$class->meeting_id}}</td>
                                        <td>{{$class->topic}}</td>
                                        <td>{{$class->start_at}}</td>
                                        <td>{{$class->password}}</td>
                                        <td><a href="{{$class->start_url}}">Masuk Kelas</a></td>
                                        <td>
                                        </td>

                                        <td>
                                        <!--Tombol hapus-->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$class->id}}">
                                            Delete
                                        </button>
                                  
      
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="" method="post">@csrf
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
                                    <td>Belum ada kelas ZOOOM</td>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div> 

    @endsection