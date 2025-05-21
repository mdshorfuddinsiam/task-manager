<x-admin-layout>
    <x-slot name="header">
        Task Manage 
    </x-slot>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('admin.tasks.index') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <select class="form-select" name="priority">
                <option value="">-- Filter by Priority --</option>
                <option value="Low" {{ request('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ request('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ request('priority') == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" class="form-control" name="due_date" value="{{ request('due_date') }}">
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">Reset</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">Create</a>
        </div>
    </form>


    <!-- Task Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Priority</th>
                    <th>Assigned Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->client->name }} ({{ $task->client->email }})</td>
                        <td>
                            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
