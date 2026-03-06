<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today'
        ]);

        $task = auth()->user()->tasks()->create(
            $request->only(['title', 'description', 'due_date'])
        );

        return response()->json([
            'status' => true,
            'message' => 'Task created successfully',
            'data' => $task
        ]);
    }

    public function index()
    {
        $tasks = auth()->user()->tasks()->get();
       return response()->json([
        'status' => true,
        'message' => 'Tasks fetched successfully',
        'data' => $tasks
    ]);
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return response()->json($task);
    }
    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->status = true;
        $task->save();

        return response()->json($task);
    }
}
