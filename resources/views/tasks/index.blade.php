@extends('layouts.app')

@section('content')

    <div class="eyebrow">TASK LIST</div>

    <h1>Task Manager</h1>

    <p class="intro">
        Add what needs doing. Update it when things change.
    </p>

    <div class="toolbar">

        <div>
            <h2>Tasks</h2>

            <div class="count">
                {{ $tasks->count() }}
                {{ Str::plural('task', $tasks->count()) }}
            </div>
        </div>

        <a
            class="button secondary"
            href="{{ route('tasks.create', [], false) }}"
        >
            + Add Task
        </a>

    </div>

    @if ($tasks->isEmpty())

        <div class="empty">
            <h2>No tasks yet</h2>
            <p>Click "+ Add Task" to create your first task.</p>
        </div>

    @else

        <div class="task-list">

            @foreach ($tasks as $task)

                <article class="task {{ $task->status === 'Completed' ? 'completed' : '' }}">

                    <div>

                        <div class="task-id">
                            TASK #{{ $task->id }}
                        </div>

                        <h2>
                            {{ $task->task_name }}
                        </h2>

                        @if ($task->description)

                            <p class="description">
                                {{ $task->description }}
                            </p>

                        @endif

                        <div class="meta">

                            <span>
                                {{ $task->due_date ? 'Due ' . $task->due_date->format('M j, Y') : 'No deadline' }}
                            </span>

                            <span>
                                Created {{ $task->created_at->format('M j, Y') }}
                            </span>

                        </div>

                        <div class="actions">

                            <a
                                class="button secondary"
                                href="{{ route('tasks.edit', $task, false) }}"
                            >
                                Edit Task
                            </a>

                            <form
                                method="POST"
                                action="{{ route('tasks.destroy', $task, false) }}"
                                onsubmit="return confirm('Delete this task?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    class="button danger"
                                    type="submit"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                    <span class="status {{ $task->status === 'Completed' ? 'completed' : '' }}">
                        {{ $task->status }}
                    </span>

                </article>

            @endforeach

        </div>

    @endif

@endsection