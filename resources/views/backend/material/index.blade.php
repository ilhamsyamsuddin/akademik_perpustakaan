@extends('backend.layouts.master')

	@section('title','Daftar Material')
	@section('content')
        <div class="span9">
            <div class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="module">
                    <div class="module-head">
                        <h3>Daftar Material</h3>
                    </div>

                    <div class="module-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($materials)>0)
                                    @foreach ($materials as $key=>$material)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$material->title}}</td>
                                        <td>{{$material->category->name}}</td>
                                        <td>
                                            <a href="{{route('material.show',[$material->id])}}">
                                                <button class="btn btn-inverse">Lihat Isi</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('material.edit',[$material->id])}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                        <td>
                                        <!--Tombol hapus-->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$material->id}}">
                                            Delete
                                        </button>
                                  
      
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$material->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{route('material.destroy',[$material->id])}}" method="post">@csrf
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
                                    <td>Belum ada kategori pelajaran</td>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div> 

    @endsection