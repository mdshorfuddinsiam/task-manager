@extends('client.layouts.app') {{-- Or use your client layout --}}

@section('title', 'Client Task')

@section('content')
<h2>My Assigned Tasks</h2>

    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @foreach ($tasks as $task)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h4>{{ $task->title }}</h4>
            <p>{{ $task->description }}</p>
            <p>Due: {{ $task->due_date }} | Priority: {{ $task->priority }}</p>
            <p>Status: 
                @if ($task->completed)
                    Completed
                @else
                    Pending
                @endif
            </p>

            @if (!$task->completed)
                <form method="POST" action="{{ route('client.tasks.complete', $task->id) }}">
                    @csrf
                    <button type="submit">Mark as Complete</button>
                </form>
            @endif
        </div>
    @endforeach
    
@endsection
