<!DOCTYPE html>
<html class="page" lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name='robots' content='noindex, nofollow'>
	<title><?=WORKPRO_NAME?></title>

	<link rel="icon" href="<?=WORKPRO?>/favicon.ico">
  <link rel="icon" href="<?=WORKPRO?>/img/favicon/32.svg" type="image/svg+xml" sizes="any">
  <link rel="apple-touch-icon" href="<?=WORKPRO?>/img/favicon/180.png">
  <link rel="manifest" href="<?=WORKPRO?>/manifest.webmanifest">
	<link rel="stylesheet" href="<?= WORKPRO_STYLES ?>?ver=<?=WORKPRO_VERSION?>">
  <link rel="preload" href="<?=WORKPRO?>/fonts/open-sans-300.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?=WORKPRO?>/fonts/open-sans-700.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?=WORKPRO?>/fonts/open-sans-regular.woff2" as="font" type="font/woff2" crossorigin>
</head>
<body class="page__body <?= is_user_logged_in() ? 'page__body--inner': ''?>">
