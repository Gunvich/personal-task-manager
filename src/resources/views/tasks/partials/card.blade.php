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

                <form
                    action="{{ route('tasks.destroy', $task) }}"
                    method="POST"
                    onsubmit="return confirm('Точно удалить эту задачу?')"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        Удалить
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
