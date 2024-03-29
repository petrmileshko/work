<?php

if (!class_exists('Manager')) :

	final class Manager extends Model
	{

		public function __construct()
		{
			parent::__construct();
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
