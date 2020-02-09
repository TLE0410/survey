@extends('layouts.app')
@section('title')
questionnaire
@endsection
@section('app_name')
Survey
@endsection

@section('content')
<div class="container">
    <a href="/questionnaire/create" class="alert-link alert">    &#60 back</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    
                    <div class="form-group">
                        <a href="/questionnaire/{{ $questionnaire->id }}/question/create" class="btn btn-primary">Add a new question</a>
                        <a href="/survey/{{ $questionnaire->id }}-{{Str::slug( $questionnaire->title )}}" class="btn btn-primary" target="_blank">Take survey</a>
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
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            {{ $answer->answer }}
                                                            @if($question->responses()->count())
                                                            <small>{{ intval(($answer->responses()->count())/($question->responses()->count())*100) }}%</small>
                                                            @endif
                                                        </li>

                                                    @endforeach

                                                </ul>
                                                <form action="/questionnaire/{{ $questionnaire->id }}/question/{{ $question->id }}" class="mt-3" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete question</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        
                    </div>                        
                </div>
                <div class="card-footer">
                    <small class="text-danger font-italic img-fluid">
                        Number of people response for this survey:
                        {{ $questionnaire->surveys()->count() }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
