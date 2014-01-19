@layout('templates.index')

@section('content')
	<h1>Tasks</h1>
	<hr />

	{{ Session::get('success') }}

	@if(count($tasks) == 0)
		<h3>There are no tasks created yet. {{ HTML::link('/todos/new','Create one'); }}</h3>
	@else
		@foreach($tasks as $task)
			<h3>{{ $task->task }}</h3>
			<p>{{ nl2br($task->description); }}</p>
			<small>{{ HTML::link('todos/edit/' . $task->id,'Edit'); }} | {{ HTML::link('todos/delete/' . $task->id,'Delete'); }}</small>
			<hr />
		@endforeach
	@endif

@endsection