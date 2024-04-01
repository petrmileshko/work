<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<section class="profile">
		<p>
			Логин:&nbsp;<?= $args['user_login'] ? $args['user_login'] : 'Неизвестно' ?>
		</p>
		<p>
			Имя:&nbsp;<?= $args['user_name'] ? $args['user_name'] : 'Неизвестно' ?>
		</p>
		<p>
			Почта:&nbsp;<?= $args['user_email'] ? $args['user_email'] : 'Неизвестно' ?>
		</p>
	</section>
	<form action="" method="post" autocomplete="off">
		<button class="button" type="submit">Выход</button>
		<input type="hidden" name="form" value="logout">
	</form>
<? endif;
?>