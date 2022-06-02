@extends('layouts.app')

	@section('title','Daftar Pertemuan Zoom')
	@section('content')
        <div class="span9">
            <div class="content">
                @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <div class="module">
                    <div class="module-head">
                        <h3>Daftar Meeting ZOOM</h3>
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
                                        <td><a href="/regis/{{$class->meeting_id}}"><button type="button" class="btn btn-primary btn-block">Daftar Meeting ini</button></a></td>
                                  
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