<?php

if (!class_exists('ReportsUpdate')) :

	final class ReportsUpdate extends Model
	{

		public function __construct($args = [])
		{
			if (!isset($args['user_id'])) throw new Exception("ReportsUpdate() необходимо передать аргументом id пользователя", 1014);

			if (isset($args['update'])) {
				$this->updatedArgs($args['update']);
				$reports = $this->setupArgs($args['user_id']);
			} else {
				$reports = $this->setupArgs($args['user_id']);
			}
			$reports['user_id'] = $args['user_id'];
			$reports['user_name'] = $args['user_name'];
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
			$currentYear = date('Y');
			$currentMonth = date('m');

			$query = "
				SELECT r.id, r.report_date, r.revenue, o.outlets_name FROM $wpdb->workpro_reports r JOIN $wpdb->workpro_outlets o ON r.outlets_id = o.id WHERE user_id = '$user_id' and month(report_date) = $currentMonth and year(report_date) = $currentYear ORDER BY r.report_date DESC;
			";

			return $wpdb->get_results($query, 'ARRAY_A');
		}

		private function updatedArgs($args)
		{
			global $wpdb;
			$revenue = $args['revenue'] ? $args['revenue'] : '';
			$report_id = $args['id'] ? $args['id'] : '';
			return $wpdb->update($wpdb->workpro_reports, ['revenue' => $revenue], ['id' => $report_id]);
		}
	}

endif;
