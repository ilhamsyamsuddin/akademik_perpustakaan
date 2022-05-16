@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <div class="card">
                
                <div class="">
                    <video width="" height=""
                    src="{{$material->video}}">
                    </video>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
