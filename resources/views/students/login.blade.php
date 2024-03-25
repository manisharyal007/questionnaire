@extends('layouts.app')

@section('content')
@if($message = Session::get('message'))
    {{$message}}
@endif
<form method="post" action="{{ route('findEmail') }}">
    @csrf
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <button type="submit">Submit</button>
</form>
@endsection