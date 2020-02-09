@extends('layouts.app')
@section('title')
Survey
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <p class="text-dark font-weight-bold">
                        Survey for : <span class="font-italic">{{ $questionnaire->title }}</span>
                    </p>
                    
                </div>

                <form action="/survey/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                    <div class="card-body">
                        <div class="form-group mt-3">
                            @foreach($questionnaire->questions as $key => $question)
                                <div class="container mt-3">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="card">
                                                <div class="card-header">
                                                    <strong>{{ $key + 1 }}. </strong>
                                                    {{ $question->question }}
                                                </div>

                                                <div class="card-body">
                                                    <ul class="list-group">
                                                        @foreach($question->answers as $answer)
                                                            <li class="list-group-item">
                                                                <input type="radio"
                                                                id = "answer{{ $answer->id }}"
                                                                name="responses[{{ $key }}][answer_id]"
                                                                class="mr-2" value = {{ $answer->id }} 
                                                                {{ (old('responses.'.$key.'.answer_id') == $answer->id) ? 'checked' : '' }}>

                                                                {{ $answer->answer }}

                                                                <input type="hidden" 
                                                                name="responses[{{ $key }}][question_id]"  value="{{ $question->id }}" 
                                                                >
                                                            </li>
                                                            
                                                        @endforeach
                                                        @error('responses.'.$key.'.answer_id')
                                                            <small class="text-danger">{{ $message }}</small>    
                                                        @enderror
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            

                            <div class="container mt-3">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-header">
                                                Your information
                                            </div>
                                            <div class="card-body">
                                                
                                                <div class="form-group">
                                                    <label for="Name">Your Name</label>
                                                    <input type="text" class="form-control" id="name" name = "Survey[name]" placeholder="Please enter your name" value="{{ old('Survey.name') }}">
                                                    @error('Survey.name')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror     

                                                </div>
                                                <div class="form-group">
                                                    <label for="Email">Email address</label>
                                                    <input type="email" class="form-control" id="email" name = "Survey[email]" aria-describedby="emailHelp" placeholder="Please enter your email" value="{{ old('Survey.email') }}">
                                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                    @error('Survey.email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror 
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                                        
                        </div>  
                        @csrf
                        <button type="submit" class="btn btn-primary">Submit</button>                      
                    </div>
                    
                </form>

                
            </div>
        </div>
    </div>
</div>
@endsection
