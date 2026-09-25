@csrf
<div>
    <label for="task_id">Task ID</label>
    <div id="task_id" class="readonly-field">{{ isset($task) ? '#' . $task->id : 'Assigned automatically after saving' }}</div>
</div>
<div>
    <label for="task_name">Task name</label>
    <input id="task_name" name="task_name" type="text" value="{{ old('task_name', $task->task_name ?? '') }}" placeholder="What needs doing?" required>
    @error('task_name') <div class="field-error">{{ $message }}</div> @enderror
</div>
<div>
    <label for="description">Description <span style="font-weight: normal; color: #6b7785;">(optional)</span></label>
    <textarea id="description" name="description" placeholder="Add a little context...">{{ old('description', $task->description ?? '') }}</textarea>
    @error('description') <div class="field-error">{{ $message }}</div> @enderror
</div>
<div>
    <label for="status">Status</label>
    <select id="status" name="status" required>
        @foreach (['Pending', 'Completed'] as $status)
            <option value="{{ $status }}" @selected(old('status', $task->status ?? 'Pending') === $status)>{{ $status }}</option>
        @endforeach
    </select>
    @error('status') <div class="field-error">{{ $message }}</div> @enderror
</div>
<div>
    <label for="due_date">Due date <span style="font-weight: normal; color: #6b7785;">(optional)</span></label>
    <input id="due_date" name="due_date" type="date" value="{{ old('due_date', isset($task) && $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
    @error('due_date') <div class="field-error">{{ $message }}</div> @enderror
</div>
<div class="actions">
    <button class="button" type="submit">{{ $submitLabel }}</button>
    <a class="button secondary" href="{{ route('tasks.index') }}">Cancel</a>
</div>
