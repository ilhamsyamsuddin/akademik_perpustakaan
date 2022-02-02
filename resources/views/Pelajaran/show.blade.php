@extends('layouts.app')

	@section('title','Daftar Kuis')
	@section('content')
        <div class="span9">
            <div class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="module">
                    <div class="module-head">
                        <h3>Daftar Materi</h3>
                    </div>

                    <div class="module-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
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
                                            <a href="/Materi/{{auth()->user()->id}}/{{$categoryId}}/{{$material->id}}">
                                                <button class="btn btn-inverse">Lihat Isi</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <td>Belum ada Materi </td>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div> 

    @endsection