@extends('layouts.app')

@section('content')

    <div class="form-wrap">

        <div class="eyebrow">NEW TASK</div>

        <h1>Add a task.</h1>

        <p class="intro">
            Add the details below.
        </p>

        <form
            class="form-card"
            method="POST"
            action="{{ route('tasks.store', [], false) }}"
        >

            @include('tasks._form', ['submitLabel' => 'Add task'])

        </form>

    </div>

@endsection