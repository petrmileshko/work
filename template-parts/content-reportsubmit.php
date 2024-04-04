<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<form class="form" action="/" method="post" autocomplete="off">
		<label class="form__label">
			<time class="form__label" datetime="<?= date('Y-m-d h:m:s'); ?>"><?= date('d-m-Y'); ?></time>
			<input type="hidden" name="date" value="<?= date('Y-m-d h:m:s'); ?>">
		</label>
		<label class="form__label">
			<span>Торговая точка:</span>
			<select class="form__select" name="outlets_id">
				<? foreach ($args as $key => $outlets) : ?>
					<? if (is_int($key)) : ?>
						<option value="<?= $outlets['id'] ?>"><?= $outlets['outlets_name'] ?></option>
					<? endif; ?>
				<? endforeach; ?>
			</select>
		</label>
		<label class="form__label">
			<span>Выручка:</span>
			<input class="form__input" type="number" name="revenue" step="0.01" placeholder="Выручка" required>
		</label>
		<button class="form__submit button button--add" type="submit">
			<span class="button__text text text--hidden">Добавить</span>
		</button>
		<input type="hidden" name="form" value="manager">
		<input type="hidden" name="user_id" value="<?= $args['user_id'] ?>">
		<? if (isset($args) && is_array($args) && !empty($args) && $args['result'] === false) : ?>
			<p class="form__message error">
				<?= $args['message'] ?>
			</p>
		<? endif; ?>
	</form>
<? endif;
?>