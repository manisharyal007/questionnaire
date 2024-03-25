@extends('layouts.app')

@section('content')

<!-- resources/views/questionnaires/create.blade.php -->

<form action="{{ route('questionnaires.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>

    <label for="expiry_date">Expiry Date:</label><br>
    <input type="date" id="expiry_date" name="expiry_date"><br><br>

    <button type="submit">Generate</button>
</form>


@endsection