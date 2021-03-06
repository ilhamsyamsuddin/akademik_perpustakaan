@extends('backend.layouts.master')

	@section('title','lesson assigned user')

	@section('content')

	<div class="span9">
        <div class="content">
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module">
                <div class="module-head">
                    <h3>Pelajaran User</h3>
                </div>

                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Pelajaran</th>
                            
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($categories)>0)
                        @foreach($categories as $category)
                        @foreach($category->users as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$category->name}}</td>
                            
                            <td>
                            <a href="{{route('category.show',[$category->id])}}">
                                <button class="btn btn-inverse">Lihat Soal</button>
                            </a>
                            </td>	
                            
                            <td>
                                <form action="{{route('lesson.remove')}}" method="POST">@csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="category_id" value="{{$category->id}}">
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
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