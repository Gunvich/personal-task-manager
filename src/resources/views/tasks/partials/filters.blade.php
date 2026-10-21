<div class="d-flex flex-wrap gap-2 mb-4">
    <a
        href="{{ route('tasks.index') }}"
        class="btn {{ $status === 'all' ? 'btn-primary' : 'btn-outline-primary' }}"
    >
        Все
    </a>

    <a
        href="{{ route('tasks.index', ['status' => 'active']) }}"
        class="btn {{ $status === 'active' ? 'btn-primary' : 'btn-outline-primary' }}"
    >
        В процессе
    </a>

    <a
        href="{{ route('tasks.index', ['status' => 'completed']) }}"
        class="btn {{ $status === 'completed' ? 'btn-primary' : 'btn-outline-primary' }}"
    >
        Выполненные
    </a>
</div>
