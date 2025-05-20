<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Events\LogTask;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function show()
    {
        return view('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskCreateRequest $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Задача обновлена!');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskCreateRequest $request)
    {
        $task = Task::create($request->all());

        event(new LogTask('created', $task->id, auth()->id()));

        return redirect()->route('tasks.index')->with('success', 'Задача успешно создана');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        event(new LogTask('deleted', $task->id, auth()->id()));

        return redirect()->route('tasks.index')->with('success', 'Задача удалена!');
    }
}
