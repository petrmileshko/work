<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<form class="form" action="/" method="post" autocomplete="off">
		<label class="form__label">
		<span>Торговая точка:</span>
			<select name="outlets_id">
				<? foreach($args as $outlets ) :?>
					<option value="<?=$outlets['id']?>"><?=$outlets['outlets_name']?></option>
				<? endforeach;?>
			</select>
		</label>
		<label class="form__label">
			<span>Выручка:</span>
			<input type="number" name="revenue" placeholder="Выручка" required>
		</label>
		<button class="form__submit button button--add" type="submit">
			<span class="button__text text text--hidden">Добавить</span>
		</button>
		<input type="hidden" name="form" value="manager">
		<? if (isset($args) && is_array($args) && !empty($args) && $args['result'] === false) : ?>
			<p class="form__message error">
				<?= $args['message'] ?>
			</p>
		<? endif; ?>
	</form>
<? endif;
?>