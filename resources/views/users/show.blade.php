@include('nav')

<h2>{{ $data->first_name }} {{ $data->last_name }}</h2>



@if (count($data->owned_tasks))
    <h4>Tasks created</h4>

    <ul>
    @foreach ($data->owned_tasks as $task)
        <li>

            @include('tasks.link', [ 'data' => $task, ])

        </li>

    @endforeach

    </ul>

@endif




@if (count($data->active_tasks))

    <h4>Tasks working on</h4>

    <ul>
    @foreach ($data->active_tasks as $task)
        <li>

            @include('tasks.link', [ 'data' => $task, ])

        </li>

    @endforeach

    </ul>


@endif
