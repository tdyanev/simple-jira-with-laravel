@php

$tasks = [];

foreach ($data as $task) {
    if ($task->parent_task_id === $key) {
        $tasks[] = $task;
    }

}

@endphp

@if (count($tasks))
    <ul>

    @foreach ($tasks as $task)

        <li>
            @include('tasks.link', [ 'data' => $task ])
        </li>

        @include('tasks.tree', [
            'data' => $data,
            'key' => intval($task->id),
        ])

    @endforeach

    </ul>

@endif
