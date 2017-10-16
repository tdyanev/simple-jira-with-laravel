<h1>Tasks</h1>

{{ count($tasks) }}

@include('tasks.tree', [
    'data' => $tasks,
    'key' => NULL,
])

