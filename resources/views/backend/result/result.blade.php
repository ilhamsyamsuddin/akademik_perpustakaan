@extends('backend.layouts.master')

	@section('title','exam assigned user')

	@section('content')
    <div class="span9">
        <div class="content">
            
            <div class="module">
                <div class="module-head">
                    <h3>Hasil User</h3>
                </div>

                <div class="module-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Test</th>
                        <th>Total Soal</th>
                        <th>Soal Dicoba</th>
                        <th>Soal Benar</th>
                        <th>Soal Salah</th>
                        <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quiz as  $q)
                      <tr>
                        <td>1</td>
                        <td>{{$q->name}}</td>
                        <td>{{$totalQuestions}}</td>
                        <td>{{$attemptQuestion}}</td>
                        <td>{{$userCorrectedAnswer}}</td>
                        <td>{{$userWrongAnswer}}</td>
                        <td>{{round($percentage,2)}}</td>
                          
                        
                      </tr>
                      @endforeach
                      
                    </tbody>
                    </table>
                </div>
            </div>
            
            </div>
            
        </div>
    </div> 
@endsection