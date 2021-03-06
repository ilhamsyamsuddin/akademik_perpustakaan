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
                        <h3>Daftar Pelajaran</h3>
                    </div>

                    <div class="module-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($Lessons)>0)
                                    @foreach ($Lessons as $key=>$category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <a href="/Materi/{{auth()->user()->id}}/{{$category->id}}">
                                                <button class="btn btn-inverse">Lihat Materi</button>
                                            </a>
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