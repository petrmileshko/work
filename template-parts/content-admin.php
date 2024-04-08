<? if (isset($args) && is_array($args) && !empty($args)) :
	$lk = new Profile($args);
	if ($lk) {
		$lk->render();
	} ?>
	<main class="page__main manager" id="reports">
		<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
		<form class="form" action="" method="post" autocomplete="off">

			<label class="form__label">
				<span>Менеджер:</span>
				<select class="form__select" name="user_id">
					<? if (isset($args['users'])) : ?>
						<? foreach ($args['users'] as $user) : ?>
							<option value="<?= $user['id'] ?>" <?=(isset($args['admin']) && $user['id'] == $args['admin']['user_id']) ? 'selected': ''?> ><?= $user['name'] ?></option>
						<? endforeach; ?>
					<? endif; ?>
				</select>
			</label>
			<button class="form__submit button button--filter" type="submit">
				<span class="button__text text text--hidden">Выбрать</span>
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
endif; ?>