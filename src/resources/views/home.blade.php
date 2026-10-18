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

            @forelse ($tasks as $task)
                <div class="card shadow-sm border-0 mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start gap-3">
                            <div>
                                <h2 class="h5 mb-2">
                                    {{ $task->title }}
                                </h2>

                                @if ($task->description)
                                    <p class="text-secondary mb-2">
                                        {{ $task->description }}
                                    </p>
                                @endif
                            </div>

                            @if ($task->is_completed)
                                <span class="badge text-bg-success">
                                    Выполнена
                                </span>
                            @else
                                <span class="badge text-bg-warning">
                                    В процессе
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    Пока задач нет. Скоро здесь появится возможность добавить первую!
                </div>
            @endforelse

        </div>
    </div>
@endsection

