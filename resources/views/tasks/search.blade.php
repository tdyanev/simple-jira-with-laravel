<form method="GET" action="{{ route('tasks.search') }}">
{{ csrf_field() }}
<input type="text" placeholder="Search tasks" name="string" />
<input type="submit" value="Search!" />
</form>

