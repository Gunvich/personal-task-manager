<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tasks = Task::latest()->get();

    return view('home', compact('tasks'));
});
