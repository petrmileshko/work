<? if (isset($args) && is_array($args) && !empty($args)) :
?>
	<? if (!isset($args['update'])) : ?>
		<main class="page__main manager center-fixed" id="reports">
			<?
			$reports = new Reports($args);
			if ($reports) {
				$reports->render();
			}
			?>
		</main>
		<?
		$updates = new ReportsUpdate($args);
		if ($updates) {
			$updates->render();
		} ?>
	<? else : ?>
		<?
		$updates = new ReportsUpdate($args);
		if ($updates) {
			$updates->render();
		} ?>
		<main class="page__main manager center-fixed" id="reports">
			<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
			<?
			$reports = new Reports($args);
			if ($reports) {
				$reports->render();
			}
			?>
		</main>
	<? endif; ?>

<? $lk = new Profile($args);
	if ($lk) {
		$lk->render();
	}
endif;
?>