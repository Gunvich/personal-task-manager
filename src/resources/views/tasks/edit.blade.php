@extends('layouts.app')

@section('title', 'Редактирование задачи')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="h2">Редактирование задачи</h1>
                <p class="text-secondary">
                    Измени данные задачи и сохрани результат.
                </p>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Название задачи
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $task->title) }}"
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
                                rows="4"
                            >{{ old('description', $task->description) }}</textarea>

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
                                value="{{ old('due_at', $task->due_at?->format('Y-m-d\TH:i')) }}"
                            >

                            @error('due_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                Сохранить изменения
                            </button>

                            <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                                Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
