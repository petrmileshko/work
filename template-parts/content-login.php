<main class="page__main index center-fixed">
	<header class="index__header">
		<?php
		if (has_custom_logo()) echo get_custom_logo();
		else echo "Логотип";
		?>
		<strong class="index__brand">WORKPRO</strong>
		<h1 class="index__title">Бизнес процессы</h1>
	</header>


	<form class="form <?= isset($args['message']) ? '' : 'form--animated'?>" action="/" method="post" autocomplete="off" id="login">
		<p class="form__info">Используйте учетные данные от платформы</p>
		<label class="form__label">
			<input class="form__input" type="text" name="userlogin" placeholder="Логин" data-pristine-required-message="Это поле обязательно для ввода." required>
		</label>
		<label class="form__label form__label--password">
			<input class="form__input" type="password" name="userpass" placeholder="Пароль" data-pristine-required-message="Это поле обязательно для ввода." required>
			<span class="form__input-toggler"></span>
		</label>
		<button class="form__submit button button--submit" type="submit">
			<span class="button__text text visually-hidden">Далее</span>
			<svg class="button__icon">
				<use xlink:href="<?=WORKPRO?>/img/sprite.svg#login"></use>
			</svg>
		</button>
		<input type="hidden" name="form" value="login">
		<a class="form__link" href="#restore">Забыли пароль?</a>
		<? if (isset($args) && is_array($args) && !empty($args)) : ?>
			<? if ($args['result'] === false) : ?>
				<p class="form__message form__message--error">
					<?= $args['message'] ?>
				</p>
			<? else : ?>
				<p class="form__message form__message--succsess">
					<?= $args['message'] ?>
				</p>
			<? endif; ?>
		<? endif; ?>
	</form>

	<form class="form form--hidden" action="/" method="post" autocomplete="off" id="restore">
		<label class="form__label">
			<span>Выслать новый пароль на:</span>
			<input class="form__input" type="text" name="usermail" placeholder="Почта" data-pristine-required-message="Это поле обязательно для ввода." required>
		</label>
		<button class="form__submit button button--submit" type="submit">
			<span class="button__text text visually-hidden">Отправить</span>
			<svg class="button__icon">
				<use xlink:href="<?=WORKPRO?>/img/sprite.svg#submit"></use>
			</svg>
		</button>
		<input type="hidden" name="form" value="restore">
	</form>
</main>

<footer class="page__footer page-footer center-fixed">
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
		<em>&nbsp;&nbsp;<a class="text text--underline" href="https://github.com/petrmileshko/work/blob/main/README.md" target="_blank">Инструкция для входа</a></em>
	</p>
</footer>