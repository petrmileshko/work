<?php

if (!class_exists('ReportSubmit')) :

	final class ReportSubmit extends Model
	{

		public function __construct($args = [])
		{

			$outlets = $this->setupArgs();

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
