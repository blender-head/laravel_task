{{ Form::open('todos/' . $route,'post'); }}

		{{ Form::token(); }}

		@if(isset($task->id))
			{{ Form::hidden('_id', $task->id) }}
		@endif

		<table>

			<tr>
				<td>{{ Form::label('task', 'Task'); }}</td>
				<td>{{ Form::text('task', (isset($task_title)) ? $task_title : TodoForm::old('task')) }}</td>
			</tr>

			<tr>
				<!-- error message from TodoForm model -->
				<td>{{ $errors->has( 'task' ) ? '<span class="error">' . $errors->first( 'task' ) . '</span>': '' }}</td>
			</tr>

			<tr>
				<td>{{ Form::label('description', 'Description'); }}</td>
				<td>{{ Form::textarea('description', (isset($task_desc)) ? $task_desc : TodoForm::old('description')) }}</td>
			</tr>

			<tr>
				<!-- error message from TodoForm model -->
				<td>{{ $errors->has( 'description' ) ? '<span class="error">' . $errors->first( 'description' ) . '</span>': '' }}</td>
			</tr>

			<tr>
				<td>{{ Form::submit('Save'); }}</td>
			</tr>

		<table>

	{{ Form::close(); }}