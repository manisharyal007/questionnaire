@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a href="{{ route('questionnaires.create') }}" class="btn btn-primary">Create Questionnaire</a>

@foreach ($questionnaires as $questionnaire)
    <p>{{ $questionnaire->title }} - {{ $questionnaire->expiry_date }}</p>
@endforeach


@endsection
