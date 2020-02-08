@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <a href="/questionnaire/{{ $questionnaire->id }}/question/create" class="btn btn-primary">Add a new question</a>
                        <a href="/survey/{{ $questionnaire->id }}-{{Str::slug( $questionnaire->title )}}" class="btn btn-primary">Take survey</a>
                    </div>

                    <div class="form-group mt-3">
                        @foreach($questionnaire->questions as $question)
                            <div class="container mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-header">{{ $question->question }}</div>

                                            <div class="card-body">
                                                <ul class="list-group">
                                                    @foreach($question->answers as $answer)
                                                        <li class="list-group-item">
                                                            {{ $answer->answer }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
