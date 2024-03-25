@extends('layouts.app')

@section('content')


    <h1>Create Subject</h1>

    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <div>
            <label for="code">Subject Code:</label>
            <input type="text" id="code" name="code" required>
        </div>
        <button type="submit">Create Subject</button>
    </form>

@endsection