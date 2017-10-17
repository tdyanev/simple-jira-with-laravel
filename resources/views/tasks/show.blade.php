@include('nav')

<h2>{{ $task->title }}</h2>

<p>{{ $task->description }}</p>
<div>created {{ $task->created_at->diffForHumans() }} by


    @include('users.link', ['data' => $task->owner])

</div>


<p>task status = {{ config('app.taskStates')[$task->status] }}</p>

<p>priority = {{ $task->priority }}</p>

@if (count($task->working_users))

    <h3>Users working on this task</h3>

    <ul>
        @foreach ($task->working_users as $user)
            <li>

                @include('users.link', ['data' => $user])

            </li>
        @endforeach
    </ul>

@else
    <div>Nobody has time for this task </div>

@endif
