<? if (isset($args) && is_array($args) && !empty($args)) : ?>
	<main class="page__main manager-update" id="update">
		<h2>Изменить отчеты за текущий месяц.</h2>
		<p><?= $args['user_name'] ?></p>

		<? foreach ($args as $key => $report) : ?>
			<? if (is_int($key)) : ?>
				<form class="form report" action="/#update" method="post" autocomplete="off">
					<p class="report__item">
						<?= convertDate($report['report_date'], 'd-m-Y') ?>
					</p>
					<p class="report__item">
						<?= $report['outlets_name'] ?>
					</p>
					<label class="report__item">
						<input class="report__revenue" type="number" name="revenue" step="0.01" placeholder="Выручка" value="<?= $report['revenue'] ?>" min="0" required>
						<?= $report['revenue'] ? workpro_num_suffix(round($report['revenue'], 2), 'рубль, рубля, рублей', 0) : 'Нет данных' ?>
					</label>
					<button class="report__submit button button--submit" type="submit">
						<span class="button__text text text--hidden">Обновить</span>
					</button>
					<input type="hidden" name="form" value="update">
					<input type="hidden" name="id" value="<?= $report['id'] ?>">
				</form>
			<? endif; ?>
		<? endforeach; ?>
	</main>
<? endif; ?>