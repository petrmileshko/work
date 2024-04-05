<?php

if (!class_exists('ReportSubmit')) :

	final class ReportSubmit extends Model
	{

		public function __construct($args = [])
		{
			if (!isset($args['user_id'])) throw new Exception("ReportSubmit() необходимо передать аргументом id пользователя", 1011);

			$outlets = $this->setupArgs();
			$outlets['user_id'] = $args['user_id'];

			parent::__construct($outlets);
		}

		public function render()
		{
			parent::render();
		}

		private function setupArgs()
		{
			global $wpdb;
			$query = "
			SELECT id, outlets_name FROM $wpdb->workpro_outlets;
			";
			return $wpdb->get_results($query, 'ARRAY_A');
		}
	}

endif;
