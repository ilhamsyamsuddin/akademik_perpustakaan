@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
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
