<?php

if (!class_exists('Login')) :

	final class Login extends Model
	{

		public function __construct($args = [])
		{
			parent::__construct($args);
		}

		public function render()
		{
			$this->header();
			parent::render();
			$this->footer();
		}

		protected function header($name = '', $args = [])
		{
			parent::header($name, $args);
		}

		protected function footer($name = '', $args = [])
		{
			parent::footer($name, $args);
		}
	}

endif;
