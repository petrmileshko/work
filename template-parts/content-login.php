<main class="page__main index">
	<header class="index__header">
		<?php
		if (has_custom_logo()) echo get_custom_logo();
		else echo "Логотип";
		?>
		<strong>WORKPRO</strong>
		<h1 class="index__title">Бизнес процессы</h1>
	</header>
	<? if (isset($args) && is_array($args) && !empty($args)) : ?>
		<pre>
		<? print_r($args) ?>
		</pre>
	<? else : ?>
		<form action="" method="post" autocomplete="off">
			<p>Используйте учетные данные от платформы</p>
			<label>
				<input type="text" name="userlogin" placeholder="Ваш логин" required>
			</label>
			<label>
				<input type="password" name="userpass" placeholder="Ваш пароль" required>
			</label>
			<button class="button" type="submit">Далее</button>
			<input type="hidden" name="form" value="login">
			<a href="#">Забыли пароль?</a>
		</form>
	<? endif; ?>
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