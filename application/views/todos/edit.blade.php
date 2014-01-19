@layout('templates.index')

@section('content')
	<h1>Edit Task: {{ $task->id }}</h1>
	<hr />

	@include('todos._form')

@endsection