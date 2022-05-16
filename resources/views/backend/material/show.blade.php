@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <div class="card">
                <div class="card-header"><h3>{{$material->title}}</h3></div>
                <div class="card-body"><p>{{$material->content}}</p></div>
            </div>
            <div class="card">
                <iframe width="1024" height="512"
                src="{{asset('storage'.$material->document)}}">
                
                </iframe>
            </div>
            <br>
            <div class="card">
                <iframe width="1024" height="512"
                src="{{asset('storage'.$material->video)}}">
                
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
