<? if (isset($args) && is_array($args) && !empty($args)) :
	$lk = new Profile($args);
	if ($lk) {
		$lk->render();
	} ?>
	<main class="page__main manager" id="reports">
		Администратор:&nbsp;
		<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
	</main>

<?
endif; ?>