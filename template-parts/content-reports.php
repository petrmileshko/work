<? if (isset($args) && is_array($args) && !empty($args)) :

	if ($args['ReportSubmit'] !== 'off') {
		$form = new ReportSubmit($args);
		if ($form) {
			$form->render();
		}
	}
?>
	<ul class="manager__reports reports">
		<? foreach ($args as $key => $report) : ?>
			<? if (is_int($key)) : ?>
				<li class="reports__item report">
					<time class="report__date" datetime="<?= $report['report_date'] ?>"><?= convertDate($report['report_date'], 'd-m-Y')  ?>&nbsp;&nbsp;</time>
					<span class="report__outlets-name"><?= $report['outlets_name'] ?>&nbsp;&nbsp;</span>
					<address class="report__outlets-address"><?= $report['outlets_address'] ?>&nbsp;&nbsp;</address>
					<span class="report__revenue"><?= $report['revenue'] ?> <?= $report['revenue'] ? workpro_num_suffix(round($report['revenue'], 2), 'рубль, рубля, рублей', 0) : 'Нет данных' ?></span>
				</li>
			<? endif; ?>
		<? endforeach; ?>
	</ul>
<? endif;
?>