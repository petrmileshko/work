<?php

if (!class_exists('Reports')) :

	final class Reports extends Model
	{

		public function __construct($args = [])
		{
			if (!isset($args['user_id'])) throw new Exception("Reports() необходимо передать аргументом id пользователя", 1012);


			if (isset($args['manager'])) {
				$result = $this->insertArgs($args['manager']);
				$reports = $this->setupArgs($args['user_id']);
				$reports['manager'] = $result;
			} elseif (isset($args['admin'])) {
				$reports = $this->setupArgs($args['admin']['user_id']);
				$reports['ReportSubmit'] = $args['ReportSubmit'];
			} else {
				if (isset($args['ReportSubmit']) && $args['ReportSubmit'] === 'off') {
					$reports = $this->setupArgs('all');
					$reports['ReportSubmit'] = $args['ReportSubmit'];
				} else $reports = $this->setupArgs($args['user_id']);
			}


			$reports['user_id'] = $args['user_id'];
			parent::__construct($reports);
		}

		public function render()
		{
			parent::render();
		}

		private function setupArgs($user_id)
		{
			global $wpdb;
			$query = '';

			if ($user_id === 'all') {
				$query = "
				SELECT r.report_date, r.revenue, o.outlets_address, o.outlets_name FROM $wpdb->workpro_reports r JOIN $wpdb->workpro_outlets o ON r.outlets_id = o.id ORDER BY r.report_date DESC;
				";
			} else {
				$query = "
				SELECT r.report_date, r.revenue, o.outlets_address, o.outlets_name FROM $wpdb->workpro_reports r JOIN $wpdb->workpro_outlets o ON r.outlets_id = o.id WHERE user_id = '$user_id' ORDER BY r.report_date DESC;
			";
			}

			return $wpdb->get_results($query, 'ARRAY_A');
		}

		private function insertArgs($args)
		{
			global $wpdb;
			return $wpdb->insert($wpdb->workpro_reports, $args, ['%s', '%d', '%f', '%d']);
		}
	}

endif;
