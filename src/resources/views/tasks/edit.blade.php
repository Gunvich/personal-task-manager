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

                        @include('tasks.partials.form-fields')

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
