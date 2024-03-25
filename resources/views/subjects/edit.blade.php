@extends('layouts.app')

@section('content')
 <h1>Edit Subject</h1>

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $subject->name }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="1" {{ $subject->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$subject->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div>
            <label for="code">Subject Code:</label>
            <input type="text" id="code" name="code" value="{{ $subject->code }}" required>
        </div>

        <button type="submit">Update Subject</button>
    </form>
@endsection
