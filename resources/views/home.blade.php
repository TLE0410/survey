@extends('layouts.app')

@section('title')
Home
@endsection
@section('app_name')
Survey
@endsection
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
                            <li class="list-group-item mt-3 d-flex justify-content-between">
                                <div >
                                    <p>
                                        <a href="{{ $questionnaire->path() }}" >
                                            {{ $questionnaire->title }} 
                                            <span class="font-italic text-danger">({{ $questionnaire->surveys()->count() }})</span>
                                        </a> 
                                    </p>
                                    <small class="mt-5">
                                    
                                        <p class="text-dark font-weight-bold">Share URL :</p>
                                        <a href="{{ $questionnaire->publicPath() }}" class="font-italic" target="blank_">
                                            {{ $questionnaire->publicPath() }}
                                        </a>
                                    </small>
                                </div>
                                <div>
                                    <form action="questionnaire/{{ $questionnaire->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                                
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
