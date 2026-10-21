<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(Request $request): View
    {
        $query = Task::query();

        if ($request->query('status') === 'active') {
            $query->where('is_completed', false);
        } elseif ($request->query('status') === 'completed') {
            $query->where('is_completed', true);
        }

        $tasks = $query->latest()->get();
        $status = $request->query('status', 'all');

        return view('home', compact('tasks', 'status'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_at' => ['nullable', 'date'],
        ]);

        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно создана!');
    }

    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_at' => ['nullable', 'date'],
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача успешно обновлена!');
    }

    public function toggleComplete(Task $task): RedirectResponse
    {
        $task->update([
            'is_completed' => ! $task->is_completed,
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Статус задачи изменён!');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Задача удалена!');
    }
}
