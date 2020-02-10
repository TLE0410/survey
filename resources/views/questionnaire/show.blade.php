@extends('layouts.app')
@section('title')
questionnaire
@endsection
@section('app_name')
Survey
@endsection
@section('content')
<div class="container">
    
</div>
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
                                            @foreach($question->answers as $key => $answer)
                                            <li class="list-group-item d-flex justify-content-between">
                                                {{ $answer->answer }}
                                                @if($question->responses()->count())
                                                <small>{{ intval(($answer->responses()->count())/($question->responses()->count())*100) }}%</small>
                                                @endif
                                                
                                            </li>

                                            @endforeach
                                        </ul>
                                        <div class="d-flex flex-row mt-3">
                                            <form action="/questionnaire/{{ $questionnaire->id }}/question/{{ $question->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <div class="container">
                                                
                                                <!-- Button to Open the Modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $question->id }}">
                                                Edit
                                                </button>
                                                <form action="/question/{{ $question->id }}" method="post">
                                                @method('PATCH')
                                                <!-- The Modal -->
                                                <div class="modal" id="myModal{{ $question->id }}" name ="myModal{{ $question->id }}" >
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            
                                                            <!-- Modal Header -->
                                                            <div class="modal-header card-header">
                                                                <h4 class="modal-title" >
                                                                    <input type="text"
                                                                    value="{{ $question->question }}" 
                                                                    class="form-group"
                                                                    name="questions[question]"
                                                                    required>
                                                                    @error('questions.question')
                                                                    <small>{{ $message }}</small>
                                                                    @enderror
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body card-body">
                                                                
                                                                @foreach($question->answers as
                                                                $key => $answer)
                                                                <input type="text" 
                                                                class="form-control mt-2" 
                                                                value="{{ $answer->answer }}"
                                                                name="answers[][answer]"
                                                                id="answer{{ $answer->id }}"
                                                                required>
                                                                @error('answers.'.$key.'.answer')
                                                                    <small>{{ $message }}</small>
                                                                    @enderror
                                                                @endforeach
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger" >update</button>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                </form>
                                                
                                            </div>
                                        </div>
                                        
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