<?php

if (!class_exists('Model')) :

	abstract class Model
	{
		protected $model;

		public function __construct()
		{
			$this->model = get_class($this);
		}

		public function render($args = [])
		{
			get_template_part('template-parts/content', $this->model, $args);
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
