@extends('layouts.app')

@section('content')
@if($message = Session::get('message'))
    {{$message}}
@endif

    @foreach($studentQuestionnaires as $studentQuestionnaire)
        <a href="{{ url('myexam/' . $student_id . '/exam/' . $studentQuestionnaire->token_link) }}" class="btn btn-primary">
            @foreach ($questionnaires as $questionnaire)
                @if ($questionnaire['id'] == $studentQuestionnaire->questionnaire_id )
                    {{$questionnaire['title']}}
                @endif                
            @endforeach
            <br><br>
    </a>
    @endforeach

@endsection