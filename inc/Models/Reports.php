<?php

if (!class_exists('Reports')) :

	final class Reports extends Model
	{

		public function __construct($args = [])
		{

			$reports = $this->setupArgs($args['user_id']);

			parent::__construct($reports);
		}

		public function render()
		{
			parent::render();
		}

		private function setupArgs($user_id)
		{
			global $wpdb;
			$query = "
			SELECT * FROM $wpdb->workpro_reports WHERE user_id = '$user_id';
			";
			return $wpdb->get_results($query, 'ARRAY_A');
		}
	}

endif;
