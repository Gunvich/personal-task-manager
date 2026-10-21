@extends('layouts.app')

@section('title', 'Мои задачи')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="h2">Мои задачи</h1>
                <p class="text-secondary">
                    Планируй дела и следи за прогрессом.
                </p>
            </div>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                @include('tasks.partials.form-fields')

                <button type="submit" class="btn btn-primary">
                    Добавить задачу
                </button>
            </form>

            <h2 class="h4 mb-3">Список задач</h2>

            @include('tasks.partials.filters')

            @forelse ($tasks as $task)
                @include('tasks.partials.card', ['task' => $task])
            @empty
                <div class="alert alert-info">
                    Пока задач нет. Добавь свою первую задачу выше!
                </div>
            @endforelse

        </div>
    </div>
@endsection
