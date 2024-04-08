<?php

if (!class_exists('ReportsSummary')) :

	final class ReportsSummary extends Model
	{
		private $months =[
			'Январь' => 1,
			'Февраль' => 2,
			'Март' => 3,
			'Апрель' => 4,
			'Май' => 5,
			'Июнь' => 6,
			'Июль' => 7,
			'Август' => 8,
			'Сентябрь' => 9,
			'Октябрь' => 10,
			'Ноябрь' => 11,
			'Декабрь' => 12
		];
		public function __construct($mounth = 'all')
		{
			$reports['ReportsSummary'] = $this->setupArgs($mounth);
			$reports['months'] = $this->months;
			$reports['month'] = $mounth;
			parent::__construct($reports);
		}

		public function render()
		{
			parent::render();
		}

		private function setupArgs($month)
		{
			global $wpdb;
			$query = '';
			$currentYear = date('Y');

			if ($month === 'all') {
				$query = "
				select SUM(revenue) as total from $wpdb->workpro_reports where year(report_date) = $currentYear;
				";
			} else {
				$query = "
				select SUM(revenue) as total from $wpdb->workpro_reports where month(report_date) = $month and year(report_date) = $currentYear;
			";
			}

			return $wpdb->get_results($query, 'ARRAY_A');
		}
	}

endif;
