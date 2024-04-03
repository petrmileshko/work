<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<ul>
		<? foreach ($args as $report) : ?>
			<li>
				<span>Дата: </span><?= $report['report_date'] ?>&nbsp;&nbsp;
				<span>Торговая точка: </span><?= $report['outlets_id'] ?>&nbsp;&nbsp;
				<span>Выручка / руб: </span><?= $report['revenue'] ?>
			</li>
		<? endforeach; ?>
	</ul>
<? endif;
?>