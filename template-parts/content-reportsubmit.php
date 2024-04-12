<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<form class="form form--manager" action="/#reports" method="post" autocomplete="off">
		<p class="form__text">
			<span>Сегодня: </span>
			<time class="form__date" datetime="<?= date('Y-m-d h:m:s'); ?>"><?= date('d-m-Y'); ?></time>
			<input type="hidden" name="report_date" value="<?= date('Y-m-d h:m:s'); ?>">
		</p>
		<label class="form__label form__label--select">
			<span>Торговая точка:</span>
			<select class="form__select form__select--revenue" name="outlets_id">
				<? foreach ($args as $key => $outlets) : ?>
					<? if (is_int($key)) : ?>
						<option value="<?= $outlets['id'] ?>"><?= $outlets['outlets_name'] ?></option>
					<? endif; ?>
				<? endforeach; ?>
			</select>
		</label>
		<label class="form__label form__label--revenue">
			<input class="form__input form__input--revenue" type="number" name="revenue" step="0.01" placeholder="Выручка" min="0" required>
		</label>
		<button class="form__submit button button--add" type="submit">
			<span class="button__text text visually-hidden">Добавить</span>
			<svg class="button__icon button__icon--add">
				<use xlink:href="<?= WORKPRO ?>/img/sprite.svg#add-report"></use>
			</svg>
		</button>
		<input type="hidden" name="form" value="manager">
		<input type="hidden" name="user_id" value="<?= $args['user_id'] ?>">
		<? if (isset($args['manager']) && !$args['manager']) : ?>
			<p class="form__message error">
				<?= 'Ошибка ввода данных' ?>
			</p>
		<? endif; ?>
	</form>
<? endif;
?>