<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<p>
		Администратор:&nbsp;
		<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
	</p>

<? endif; ?>