<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<ul class="manager__reports reports">
		<? foreach ($args as $report) : ?>
			<li class="reports__item report">
				<time class="report__date" datetime="<?= $report['report_date'] ?>"><?= convertDate($report['report_date'], 'd-m-Y')  ?>&nbsp;&nbsp;</time>
				<address class="report__outlets"><?= $report['outlets_address'] ?>&nbsp;&nbsp;</address>
				<span class="report__revenue"><?= $report['revenue'] ?> руб</span>
			</li>
		<? endforeach; ?>
	</ul>
<? endif;
?>