<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<main class="page__main manager-summ" id="summary">
		<h2>Сводный отчет за текущий <?=date('Y');?> год</h2>
		<form class="form" action="" method="post" autocomplete="off">

			<label class="form__label">
				<span>Всего за </span>
				<select class="form__select" name="month">
					<option value="all" <?= (isset($args['month']) && $args['month'] == 'all') ? 'selected' : '' ?>>Все</option>
					<? if (isset($args['months'])) : ?>
						<? foreach ($args['months'] as $key => $month) : ?>
							<option value="<?= $month ?>" <?= (isset($args['month']) && $month == $args['month']) ? 'selected' : '' ?>><?= $key ?></option>
						<? endforeach; ?>
					<? endif; ?>
				</select>
				<?= (isset($args['month']) && $args['month'] == 'all') ? ' месяцы' : ' месяц' ?>
			</label>
			<button class="form__submit button button--filter" type="submit">
				<span class="button__text text text--hidden">Выбрать</span>
			</button>
			<input type="hidden" name="form" value="summary">
		</form>
		<p class="manager-summ__value">
			Выручка составила: <?= $args['ReportsSummary'][0]['total'] ? workpro_num_suffix($args['ReportsSummary'][0]['total'], 'рубль, рубля, рублей') : 'Нет данных' ?>
		</p>
	</main>
<? endif;
?>