<?php

if (!class_exists('Manager')) :

	final class Manager extends Model
	{

		public function __construct($args = [])
		{
			parent::__construct($args);
		}

		public function render()
		{
			$this->header();
			$this->header('authorized');
			parent::render();
			$this->footer('authorized', ['role'=>'Менеджер']);
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
