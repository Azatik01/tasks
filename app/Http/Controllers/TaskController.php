<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = [];
        if ($request->session()->exists('user_id')) {
            $tasks = Task::where('user_id', session()->get("user_id"))->get();
        }
        return view('tasks.index', compact('tasks'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['task' => ['required', 'min:10', 'max:1024']]);
        $validated['user_id'] = auth_user()->id;
        $task = Task::create($validated);
        return redirect()->route('tasks.index')->with('success', "Task {$task->task} successfully created");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->validate(['task' => ['required', 'min:10', 'max:1024']]));
        return redirect()->route('tasks.index')->with('success', "Task {$task->task} successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', "Task successfully deleted");
    }

    public function deleteAll()
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $task->delete();
        }
        return redirect()->route('tasks.index')->with('success', "Tasks successfully deleted");
    }
}
