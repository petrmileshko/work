<main class="page__main index">
	<header class="index__header">
		<?php
		if (has_custom_logo()) echo get_custom_logo();
		else echo "Логотип";
		?>
		<strong class="index__brand">WORKPRO</strong>
		<h1 class="index__title">Бизнес процессы</h1>
	</header>


	<form class="form" action="" method="post" autocomplete="off">
		<p class="form__info">Используйте учетные данные от платформы</p>
		<label class="form__label">
			<input type="text" name="userlogin" placeholder="Ваш логин" required>
		</label>
		<label class="form__label">
			<input type="password" name="userpass" placeholder="Ваш пароль" required>
		</label>
		<button class="form__submit button" type="submit">Далее</button>
		<input type="hidden" name="form" value="login">
		<? if (isset($args) && is_array($args) && !empty($args) && $args['result'] === false) : ?>
			<p class="form__message error">
				<?= $args['message'] ?>
			</p>
		<? endif; ?>
		<a class="form__link" href="#">Забыли пароль?</a>
	</form>
</main>

<footer class="page__footer page-footer">
	<p class="page-footer__copyright">
		&copy;<?php bloginfo('blogname');
					$currentYear = date('Y');
					$foundedYear = '2024';
					if ($currentYear > $foundedYear) {
						echo " $foundedYear - $currentYear";
					} else {
						echo " $currentYear";
					}
					?>
		<em>&nbsp;&nbsp;Приложение в стадии разработки</em>
	</p>
</footer>