<?php

if (!class_exists('Model')) :

	abstract class Model
	{
		private $model;
		private $args;

		public function __construct($args = [])
		{
			$this->model = get_class($this);
			$this->args = $args;
		}

		public function render()
		{
			get_template_part('template-parts/content', $this->model, $this->args);
		}

		protected function header($name = '', $args = [])
		{
			if ($name) {
				get_header($name, $args);
				return;
			}
			get_header();
		}

		protected function footer($name = '', $args = [])
		{
			if ($name) {
				get_footer($name, $args);
				return;
			}
			get_footer();
		}
	}

endif;
