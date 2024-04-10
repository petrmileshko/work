<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<main class="page__main profile center-fixed" id="lk">
		<div class="profile__wrapper">
			<p class="profile__data">
				Логин:&nbsp;<?= $args['user_login'] ? $args['user_login'] : 'Неизвестно' ?>
			</p>
			<p class="profile__data">
				Имя:&nbsp;<?= $args['user_name'] ? $args['user_name'] : 'Неизвестно' ?>
			</p>
			<p class="profile__data">
				Почта:&nbsp;<?= $args['user_email'] ? $args['user_email'] : 'Неизвестно' ?>
			</p>
		</div>
		<form class="form" action="" method="post" autocomplete="off">
			<button class="form__submit button button--close" type="submit">
				<span class="button__text text text--hidden">Выход</span>
			</button>
			<input type="hidden" name="form" value="logout">
		</form>
	</main>
<? endif;
?>