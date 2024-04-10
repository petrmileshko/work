<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<main class="page__main manager-update" id="update">
		<h2 class="manager-update__title">Изменить отчеты за текущий месяц.</h2>

		<? foreach ($args as $key => $report) : ?>
			<? if (is_int($key)) : ?>
				<form class="form form-report" action="/#update" method="post" autocomplete="off">
					<p class="form-report__item">
						<?= convertDate($report['report_date'], 'd-m-Y') ?>
					</p>
					<p class="form-report__item">
						<?= $report['outlets_name'] ?>
					</p>
					<label class="form-report__item">
						<input class="form-report__revenue" type="number" name="revenue" step="0.01" placeholder="Выручка" value="<?= $report['revenue'] ?>" min="0" required>
						<span><?= $report['revenue'] ? workpro_num_suffix(round($report['revenue'], 2), 'рубль, рубля, рублей', 0) : 'Нет данных' ?></span>
					</label>
					<button class="form-report__submit button button--save" type="submit">
						<span class="button__text text text--hidden">Обновить</span>
					</button>
					<input type="hidden" name="form" value="update">
					<input type="hidden" name="id" value="<?= $report['id'] ?>">
				</form>
			<? endif; ?>
		<? endforeach; ?>
	</main>
<? endif; ?>