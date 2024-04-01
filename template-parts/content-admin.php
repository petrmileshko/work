<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<p>
		Администратор:&nbsp;
		<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
	</p>

	<form action="" method="post" autocomplete="off">
		<button class="button" type="submit">Выход</button>
		<input type="hidden" name="form" value="logout">
	</form>
<? endif; ?>