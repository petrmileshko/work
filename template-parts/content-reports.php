<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<ul>
		<? foreach ($args as $report) : ?>
			<li>
				<span><?= $report['report_date'] ?>&nbsp;&nbsp;</span>
				<span><?= $report['outlets_address'] ?>&nbsp;&nbsp;</span>
				<span><?= $report['revenue'] ?> руб: </span>
			</li>
		<? endforeach; ?>
	</ul>
<? endif;
?>