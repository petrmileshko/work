<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<main class="page__main profile center-fixed" id="lk">
		<div class="profile__wrapper">
			<p class="profile__data">
				<span>Логин:</span><span><?= $args['user_login'] ? $args['user_login'] : 'Неизвестно' ?></span>
			</p>
			<p class="profile__data">
				<span>Имя:</span><span><?= $args['user_name'] ? $args['user_name'] : 'Неизвестно' ?></span>
			</p>
			<p class="profile__data">
				<span>Почта:</span><span><?= $args['user_email'] ? $args['user_email'] : 'Неизвестно' ?></span>
			</p>
		</div>
		<form class="form" action="" method="post" autocomplete="off">
			<button class="form__submit button button--close" type="submit">
				<span class="button__text text visually-hidden">Выход</span>
				<svg class="button__icon">
					<use xlink:href="<?=WORKPRO?>/img/sprite.svg#exit"></use>
				</svg>
			</button>
			<input type="hidden" name="form" value="logout">
		</form>
	</main>
<? endif;
?>