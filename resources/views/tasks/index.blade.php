@include('nav')

<h2>Tasks ({{ count($tasks) }})</h2>

@include('tasks.search')


@include('tasks.tree', [
    'data' => $tasks,
    'key' => NULL,
])

