@extends('layouts.app')

@section('content')

    <h1>Subjects</h1>

    <a href="{{ route('subjects.create') }}">Create New Subject</a>

    @if ($subjects->isEmpty())
        <p>No subjects found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                  $count = 1;
                @endphp
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->status ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $subject->code }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject->id) }}">Edit</a>
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
