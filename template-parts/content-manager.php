<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<main class="page__main manager" id="reports">
		Менеджер:&nbsp;
		<?= $args['user_id'] ? $args['user_id'] : 'Неизвестный' ?>
	</main>
<?
	$lk = new Profile($args);
	if ($lk) {
		$lk->render();
	}
endif;
?>