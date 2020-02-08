@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/questionnaire/create" class="btn btn-dark">Create a new questionnaire</a>
                    
                    <div class="list-group mt-3">
                        @foreach($questionnaires as $questionnaire)
                            <li class="list-group-item mt-3">
                                
                                <p>
                                    <a href="{{ $questionnaire->path() }}" >
                                        {{ $questionnaire->title }}
                                    </a> 
                                </p>
                                <small class="mt-5">
                                
                                    <p class="text-dark font-weight-bold">Share URL :</p>
                                    <a href="{{ $questionnaire->publicPath() }}" class="font-italic">
                                        {{ $questionnaire->publicPath() }}
                                    </a>
                                </small>
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
