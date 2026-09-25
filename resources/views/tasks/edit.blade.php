@extends('layouts.app')

@section('content')
    <div class="form-wrap">
        <div class="eyebrow">Edit task</div>
        <h1>Update a task.</h1>
        <p class="intro">Change the details below.</p>
        <form class="form-card" method="POST" action="{{ route('tasks.update', $task) }}">
            @method('PUT')
            @include('tasks._form', ['submitLabel' => 'Save changes'])
        </form>
    </div>
@endsection
