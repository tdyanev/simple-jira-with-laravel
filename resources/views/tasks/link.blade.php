<a href="{{ route('tasks.show', [
    'id' => $data->id,
]) }}">{{ $data->title }}</a> ({{ $data->priority }})
