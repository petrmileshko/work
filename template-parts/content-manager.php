<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<p>
		Менеджер:&nbsp;
		<?= $args['user_id'] ? $args['user_id'] : 'Неизвестный' ?>
	</p>
<? endif;
?>