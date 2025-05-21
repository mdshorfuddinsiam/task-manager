<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // public function index() {
    //     $tasks = Task::with('client')->where('user_id', Auth::id())->latest()->get();
    //     return view('admin.task.index', compact('tasks'));
    // }

    public function index(Request $request) {
        $query = Task::with('client')->where('user_id', Auth::id());

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        $tasks = $query->latest()->get();
        return view('admin.task.index', compact('tasks'));
    }


    public function create() {
        $clients = Client::all();
        return view('admin.task.create', compact('clients'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'client_id' => $request->client_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Task created.');
    }

    public function edit(Task $task) {
        $clients = Client::all();
        return view('admin.task.edit', compact('task', 'clients'));
    }

    public function update(Request $request, Task $task) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'priority' => 'required',
            'client_id' => 'required|exists:clients,id',
        ]);

        $task->update($request->only(['title', 'description', 'due_date', 'priority', 'client_id']));

        return redirect()->route('admin.tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task) {
        $task->delete();
        return back()->with('success', 'Task deleted.');
    }
}
