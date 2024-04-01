<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<p>
		Менеджер:&nbsp;
		<?= $args['user_name'] ? $args['user_name'] : 'Неизвестный' ?>
	</p>
<? endif;
?>