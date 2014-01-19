<?php
	
	class Todos_Controller extends Base_Controller
	{
		public function __construct()
		{
			$this->filter('before','csrf')->on('post');
		}

		public function get_index()
		{
			// get all tasks, order by 'created_at'
			$tasks = Todo::order_by('created_at','desc')->get();
			return View::make('todos.index')->with('tasks',$tasks);
		}

		public function get_new()
		{
			$route = 'create';
			return View::make('todos.new')->with('route',$route);
		}

		public function post_create()
		{
			// TodoForm model validation
			if(!TodoForm::is_valid())
			{
				return Redirect::back()->with_input()->with_errors(TodoForm::$validation);
			}
			else
			{
				$todo = new Todo(array(
					'task' => Input::get('task'),
					'description' => Input::get('description')
				));

				$todo->save();

				// redirect to index action with a flash message
				return Redirect::to('todos/index')->with('success', 'Task created successfully');
			}
		}

		public function get_edit($id = '')
		{
			if(!is_numeric($id))
			{
				return Response::error('404');
			}
			else
			{
				$task = Todo::find($id);
				$route = 'update';
				return View::make('todos.edit')->with(array(
					'route' => $route,
					'task' => $task,
					'task_id' => $task->id,
					'task_title' => $task->task,
					'task_desc' => $task->description
				));
			}
		}

		public function post_update()
		{
			// TodoForm model validation
			if(!TodoForm::is_valid())
			{
				return Redirect::back()->with_input()->with_errors(TodoForm::$validation);
			}
			else
			{
				$task = Todo::find(Input::get('_id'));

				if($task)
				{
					$task->task = Input::get('task');
					$task->description = Input::get('description');
					$task->save();
					return Redirect::to('todos/index')->with('success', 'Task edited successfully');
				}
			}
		}

		public function get_delete($id)
		{
			$task = Todo::find($id);

			if($task)
			{
				$task->delete();
				return Redirect::to('todos/index')->with('success', 'Task deleted successfully');
			}
		}
	}