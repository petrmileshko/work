<? if (isset($args) && is_array($args) && !empty($args)) :
	if (isset($args['summary'])) {
		$summary = new ReportsSummary($args['summary']['month']);
	} else {
		$summary = new ReportsSummary();
	}
	if ($summary) {
		$summary->render();
	}
?>
	<main class="page__main admin center-fixed" id="reports">
		<form class="form form--managers" action="" method="post" autocomplete="off">
			<label class="form__label form__label--managers">
				<span>Менеджер:</span>
				<select class="form__select" name="user_id">
					<option value="all" <?= (isset($args['admin']) && $args['admin']['user_id'] == 'all') ? 'selected' : '' ?>>Все</option>
					<? if (isset($args['users'])) : ?>
						<? foreach ($args['users'] as $user) : ?>
							<? if ($user['id'] != $args['user_id']) : ?>
								<option value="<?= $user['id'] ?>" <?= (isset($args['admin']) && $user['id'] == $args['admin']['user_id']) ? 'selected' : '' ?>><?= $user['name'] ?></option>
							<? endif; ?>
						<? endforeach; ?>
					<? endif; ?>
				</select>
			</label>
			<button class="form__submit button button--filter" type="submit">
				<span class="button__text text visually-hidden">Выбрать</span>
				<svg class="button__icon">
					<use xlink:href="<?=WORKPRO?>/img/sprite.svg#select-reports"></use>
				</svg>
			</button>
			<input type="hidden" name="form" value="admin">
		</form>
		<?

		$reports = new Reports($args);
		if ($reports) {
			$reports->render();
		}
		?>
	</main>
	<?
	$lk = new Profile($args);
	if ($lk) {
		$lk->render();
	}
	?>
<? endif; ?>