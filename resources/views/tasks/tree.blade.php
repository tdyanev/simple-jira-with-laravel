@php

$tasks = array_filter($data, function($el) use($key) {
    return $el['parent_task_id'] === $key;
});

@endphp

@if (count($tasks))
    <ul>

    @foreach ($tasks as $task)

        <li><a href="{{ route('tasks.show', [
            'id' => $task['id'],
        ]) }}">{{ $task['title'] }}</a></li>

        @include('tasks.tree', [
            'data' => $data,
            'key' => intval($task['id']),
        ])

    @endforeach

    </ul>

@endif
