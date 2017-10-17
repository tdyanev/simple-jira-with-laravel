@include('nav')

<h2>Results</h2>

@include('tasks.search')

<ul>
@foreach ($tasks as $task)
    <li>

        @include('tasks.link', ['data' => $task])

    </li>

@endforeach
</ul>


