<? if (isset($args) && is_array($args) && !empty($args)) :

	$lk = new Profile($args);
	if ($lk) {
		$lk->render();
	}

	$updates = new ReportsUpdate($args);
	if ($updates) {
		$updates->render();
	}
?>
	<main class="page__main manager" id="reports">
		<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
		<?
		$reports = new Reports($args);
		if ($reports) {
			$reports->render();
		}
		?>
	</main>
<?
endif;
?>