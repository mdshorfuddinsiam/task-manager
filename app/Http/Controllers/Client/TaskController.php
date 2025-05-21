<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Show only assigned tasks
    public function index()
    {
        $tasks = Task::where('client_id', Auth::guard('client')->id())
                    ->latest()
                    ->get();

        return view('client.task.index', compact('tasks'));
    }

    // Mark task as complete (no edit)
    public function complete(Task $task)
    {
        // Only allow if it belongs to this client
        if ($task->client_id != Auth::guard('client')->id()) {
            abort(403);
        }

        $task->update(['completed' => true]);

        return back()->with('success', 'Task marked as completed.');
    }
}