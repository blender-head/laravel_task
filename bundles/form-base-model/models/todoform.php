<?php

	class TodoForm extends FormBaseModel\Base
	{
		public static $rules = array(
			'task' => 'required',
			'description' => 'required'
		);
	}