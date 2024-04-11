<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<main class="page__main admin-summ" id="summary">
		<h2 class="admin-summ__title">Сводный отчет за текущий <?= date('Y'); ?> год</h2>
		<form class="form form--sum" action="" method="post" autocomplete="off">

			<label class="form__label form__label--sum">
				<span>Всего за </span>
				<select class="form__select" name="month">
					<option value="all" <?= (isset($args['month']) && $args['month'] == 'all') ? 'selected' : '' ?>>Все</option>
					<? if (isset($args['months'])) : ?>
						<? foreach ($args['months'] as $key => $month) : ?>
							<option value="<?= $month ?>" <?= (isset($args['month']) && $month == $args['month']) ? 'selected' : '' ?>><?= $key ?></option>
						<? endforeach; ?>
					<? endif; ?>
				</select>
				<span><?= (isset($args['month']) && $args['month'] == 'all') ? ' месяцы' : ' месяц' ?></span>
			</label>
			<button class="form__submit button button--filter" type="submit">
				<span class="button__text text visually-hidden">Выбрать</span>
				<svg class="button__icon">
					<use xlink:href="<?=WORKPRO?>/img/sprite.svg#select-reports"></use>
				</svg>
			</button>
			<input type="hidden" name="form" value="summary">
		</form>
		<p class="admin-summ__value">
			Выручка составила: <?= $args['ReportsSummary'][0]['total'] ? workpro_num_suffix(round($args['ReportsSummary'][0]['total'], 2), 'рубль, рубля, рублей') : 'Нет данных' ?>
		</p>
	</main>
<? endif;
?>