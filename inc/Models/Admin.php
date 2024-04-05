<?php

if (!class_exists('Admin')) :

	final class Admin extends Model
	{

		public function __construct($args = [])
		{
			$args['users'] = $this->get_users();
			$args['ReportSubmit'] = 'off';
			parent::__construct($args);
		}

		public function render()
		{
			$this->header();
			$this->header('authorized');
			parent::render();
			$this->footer('authorized', ['role' => 'Администратор']);
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

		private function get_users()
		{
			$args = [];
			$users = get_users(['role__in'     => ['editor', 'author', 'contributor',	'subscriber']]);
			foreach ($users as $user) {
				array_push($args, ['id'=> $user->ID, 'name' => $user->display_name]);
			}
			return $args;
		}
	}

endif;
