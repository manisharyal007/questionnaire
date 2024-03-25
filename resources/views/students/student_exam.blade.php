@extends('layouts.app')

@section('content')

@if($message = Session::get('message'))
    {{$message}}
@endif
<br><br>
<center><h1>{{$questionnaire->title}}</h1></center>

<form action="{{route('answer.submit')}}" method="POST">
    @csrf
    <input type="hidden" name="student_id" value="{{$student_id}}"> 
    <input type="hidden" name="questionnaire_id" value="{{$questionnaire_id}}">
    <input type="hidden">
@foreach ($subjects as $subject)
    <h2>{{$subject['name']}}</h2>
    @foreach($questionnairesSelectedQuestions as $qSQ)
        @if($subject['code'] == $qSQ->subject_code)
            @foreach($questions_answers as $qa)
                @if ($qa['id'] == $qSQ->question_id)
                {{$qa->question}}<br>
                <input type="hidden" name="question_id[]" value="{{$qSQ->question_id}}" >
                <input type="radio" name="{{$qSQ->question_id}}" value="A">
                A. {{$qa->a}}  <br>

                <input type="radio" name="{{$qSQ->question_id}}" value="B">
                B. {{$qa->b}}  <br>

                <input type="radio" name="{{$qSQ->question_id}}" value="C">
                C. {{$qa->c}}  <br>

                <input type="radio" name="{{$qSQ->question_id}}" value="D">
                D. {{$qa->d}}  <br>
                <br>
                @endif
            @endforeach
        @endif
    @endforeach
@endforeach
<input type="submit" class="btn btn-success" value="Submit Answer">
</form>
@endsection