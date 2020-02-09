@extends('layouts.app')
@section('title')
Create a new question
@endsection
@section('app_name')
Survey
@endsection

@section('content')
<div class="container">
    <a href="/questionnaire/{{ $questionnaire->id }}" class="alert alert-link"> &#60 back</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new question</div>

                <div class="card-body">
                    <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <form action="/questionnaire/{{ $questionnaire->id }}/question" method="post">
                            
                            <div class="form-group">
                                <div class="form-group">
                                <label for="questions[question]">Question</label>
                                <input class="form-control" id="question" name="questions[question]" rows="3" value="{{ old('questions.question') }}"></input>
                              </div>
                                
                                <small id="titleHelp" class="form-text text-muted">
                                    Giving an new question
                                </small>
                                @error('questions.question')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <fieldset>
                                    <legend>Choises</legend>

                                    <div class="form-group">
                                        <label for="answer1">Choise 1</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer1" aria-describedby="choiseHelp"placeholder="Enter the choise 1" value = "{{ old('answers.0.answer') }}">
                                        <small id="choiseHelp" class="form-text text-muted">
                                        Giving choise 1 
                                        </small>
                                        @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="answer2">Choise 2</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answe2" aria-describedby="choiseHelp"placeholder="Enter the choise 2" value = "{{ old('answers.1.answer') }}">
                                        <small id="choiseHelp" class="form-text text-muted">
                                        Giving choise 2 
                                        </small>
                                        @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                    
                                        <label for="answer3">Choise 3</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer3" aria-describedby="choiseHelp"placeholder="Enter the choise 3" value = "{{ old('answers.2.answer') }}">
                                        <small id="choiseHelp" class="form-text text-muted">
                                        Giving choise 3 
                                        </small>
                                        @error('answers.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="answer4">Choise 4</label>
                                        <input type="text" class="form-control" name="answers[][answer]" id="answer4" aria-describedby="choiseHelp"placeholder="Enter the choise 4" value = "{{ old('answers.3.answer') }}">
                                        <small id="choiseHelp" class="form-text text-muted">
                                        Giving choise 4 
                                        </small>
                                        @error('answers.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </fieldset>
                            </div>        
                            @csrf

                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>
                    </div>
                </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
