<? if (isset($args) && is_array($args) && !empty($args)) :
	$lk = new Profile($args);
	if ($lk) {
		$lk->render();
	} ?>
	<p>
		Администратор:&nbsp;
		<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
	</p>

<?
endif; ?>