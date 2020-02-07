@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $questionnaire->title }}</div>

                <div class="card-body">
                    
                    {{ $questionnaire->purpose }}

                </div>
                <small class="text-muted">
                    <span class="text-dark font-italic">this purpose made by : </span>
                    {{ $questionnaire->user->name }}
                </small>
            </div>
        </div>
    </div>
</div>
@endsection
