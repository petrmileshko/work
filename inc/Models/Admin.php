<?php

if (!class_exists('Admin')) :

	final class Admin extends Model
	{

		public function __construct()
		{
			parent::__construct();
		}

		public function render()
		{
			$this->header();
			$this->header('authorized');
			parent::render();
			$this->footer('authorized');
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
