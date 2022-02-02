@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <a href="/Materi/{{auth()->user()->id}}">Lihat Pelajaran</a>
                @if($isExamAssigned)
                    @foreach ($quizzes as $quiz)
                        <div class="card-body">
                            <p><h3>{{$quiz->name}}</h3></p>
                            <p>{{$quiz->description}}</p>
                            <p>{{$quiz->minutes}} Menit</p>
                            <p>{{$quiz->questions()->count()}} Soal</p>
                            <p>
                                @if (!in_array($quiz->id,$wasQuizAttempted))
                                    <a href="user/quiz/{{$quiz->id}}">
                                        <button class="btn btn-success">Mulai Mengerjakan</button>
                                    </a>
                                @else
                                    <a href="/result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}">Lihat hasil</a>
                                    <span class="float-right">Selesai</span>
                                @endif
                            </p>
                        </div>
                    @endforeach

                @else
                    <p>Belum ada ujian</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
