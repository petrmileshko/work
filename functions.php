<?php
//Инициализация настроек
require_once 'inc/config.php';

if (!function_exists('workpro_setup') && WORKPRO) :

	function workpro_setup()
	{

		add_theme_support(
			'custom-logo',
			[
				'height'               => 32,
				'width'                => 32,
				'flex-width'           => false,
				'flex-height'          => false,
				'unlink-homepage-logo' => false,
			]
		);

		add_theme_support(
			'html5'
		);
	}

	add_action('after_setup_theme', 'workpro_setup');
	require_once 'inc/Model.php';
	require_once 'inc/Models/Login.php';
	require_once 'inc/Router.php';
endif;
