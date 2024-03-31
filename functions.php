<?php
//Инициализация настроек
require_once 'inc/config.php';

if (!function_exists('workpro_setup') && WORKPRO) :

	function workpro_setup()
	{

		add_theme_support(
			'custom-logo',
			[
				'height'               => 56,
				'width'                => 56,
				'flex-width'           => true,
				'flex-height'          => true,
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
	require_once 'inc/Models/Manager.php';
	require_once 'inc/Models/Admin.php';
	require_once 'inc/Router.php';
endif;
