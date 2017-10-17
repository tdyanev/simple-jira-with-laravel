@include('nav')

<h2>Creating new task</h2>


<style>
    div { margin: 10px 0; }
</style>

<form method="POST" action="{{ route('tasks.store') }}">
{{ csrf_field() }}
<div>
    <input type="text" placeholder="Title" name="title" />
</div>

<div>
<textarea placeholder="Description" name="description" cols="20" rows="7"></textarea>
</div>

<div>
Is this part of another task?
</div>
<div>
<select name="parent_task_id">
    <option value="0" selected>No</option>
    @foreach ($tasks as $task)
    <option value="{{ $task->id }}">{{ $task->title }}</option>
    @endforeach
</select>
</div>

<div>
Priority
<input type="number" value="80" step="1" max="255" min="0" name="priority" />
</div>

<div>
Status
<select name="status">
    @foreach (config('app.taskStates') as $key => $state)
    <option value="{{ $key }}">{{ $state }}</option>
    @endforeach
</select>
</div>

<div>
Task creator
<select name="creator_user_id">
    @foreach ($users as $user)
    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
    @endforeach
</select>
</div>

<div>
Assign this task to users
</div>
<div>
<select name="assigned_users[]" multiple size="10">
    @foreach ($users as $user)
    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
    @endforeach
</select>
</div>

<div>
<input type="submit" value="Save!" />
</div>

</form>
