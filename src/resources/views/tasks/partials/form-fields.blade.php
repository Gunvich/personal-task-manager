
<div class="mb-3">
    <label for="title" class="form-label">
        Название задачи
    </label>

    <input
        type="text"
        id="title"
        name="title"
        class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', isset($task) ? $task->title : '') }}"
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
        rows="{{ isset($task) ? 4 : 3 }}"
    >{{ old('description', isset($task) ? $task->description : '') }}</textarea>

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
        value="{{ old('due_at', isset($task) ? $task->due_at?->format('Y-m-d\TH:i') : '') }}"
    >

    @error('due_at')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
