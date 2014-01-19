@layout('templates.index')

@section('content')
	<h1>New Task</h1>
	<hr />

	@include('todos._form')

@endsection