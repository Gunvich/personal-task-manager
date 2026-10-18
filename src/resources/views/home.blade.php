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

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Закрыть"
                    ></button>
                </div>
            @endif

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h2 class="h5 mb-3">Добавить задачу</h2>

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Название задачи
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}"
                                maxlength="255"
                                required
                            >

                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Описание
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-control @error('description') is-invalid @enderror"
                                rows="3"
                            >{{ old('description') }}</textarea>

                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="due_at" class="form-label">
                                Срок выполнения
                            </label>
                            <input
                                type="datetime-local"
                                id="due_at"
                                name="due_at"
                                class="form-control @error('due_at') is-invalid @enderror"
                                value="{{ old('due_at') }}"
                            >

                            @error('due_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Добавить задачу
                        </button>
                    </form>
                </div>
            </div>

            <h2 class="h4 mb-3">Список задач</h2>

            @forelse ($tasks as $task)
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start gap-3">
                            <div>
                                <h3 class="h5 mb-2">{{ $task->title }}</h3>

                                @if ($task->description)
                                    <p class="text-secondary mb-2">
                                        {{ $task->description }}
                                    </p>
                                @endif

                                @if ($task->due_at)
                                    <p class="small text-secondary mb-0">
                                        Срок: {{ $task->due_at->format('d.m.Y H:i') }}
                                    </p>
                                @endif
                            </div>

                            <div class="d-flex flex-column align-items-end gap-2">
                                @if ($task->is_completed)
                                    <span class="badge text-bg-success">Выполнена</span>
                                @else
                                    <span class="badge text-bg-warning">В процессе</span>
                                @endif

                                <a
                                    href="{{ route('tasks.edit', $task) }}"
                                    class="btn btn-sm btn-outline-primary"
                                >
                                    Редактировать
                                </a>

                                <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                        {{ $task->is_completed ? 'Вернуть в работу' : 'Завершить' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Пока задач нет. Добавь свою первую задачу выше!
                </div>
            @endforelse
        </div>
    </div>
@endsection
