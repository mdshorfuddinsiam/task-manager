<x-admin-layout>
    <x-slot name="header">
        Task Create
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.tasks.store') }}">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" placeholder="Enter task title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        rows="3" placeholder="Enter task description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Due Date -->
                <div class="mb-3">
                    <label class="form-label">Due Date</label>
                    <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror"
                        value="{{ old('due_date') }}">
                    @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Priority -->
                <div class="mb-3">
                    <label class="form-label">Priority</label>
                    <select name="priority" class="form-select @error('priority') is-invalid @enderror">
                        <option value="">-- Select Priority --</option>
                        <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Client -->
                <div class="mb-3">
                    <label class="form-label">Assign to Client</label>
                    <select name="client_id" class="form-select @error('client_id') is-invalid @enderror">
                        <option value="">-- Select Client --</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }} ({{ $client->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Create Task</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
