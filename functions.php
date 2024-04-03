<?php
//Инициализация настроек
require_once 'inc/config.php';

if (!function_exists('workpro_dbase_setup')) :

	function workpro_dbase_setup()
	{

		if (DBASE_VER === 0) {

			global $wpdb;
			$wpdb->workpro_reports = $wpdb->prefix . 'workpro_reports';
			$wpdb->workpro_outlets = $wpdb->prefix . 'workpro_outlets';
			$query = "
			CREATE TABLE `" . $wpdb->workpro_reports . "` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `outlets_id` INT NOT NULL , `revenue` FLOAT NOT NULL , `user_id` INT NOT NULL , `report_date` DATE NOT NULL , PRIMARY KEY (`id`), INDEX (`user_id`), INDEX `report_author` (`user_id`)) ENGINE = InnoDB;
			CREATE TABLE `" . $wpdb->workpro_outlets . "` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `outlets_name` VARCHAR(150) NOT NULL , `outlets_address` MEDIUMTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
			";
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta($query);
			update_option('workpro_dbase_version', '1.0');
		}
	}

	add_action('init', 'workpro_dbase_setup', 0);
endif;

if (!function_exists('workpro_setup') && WORKPRO) :

	function workpro_setup()
	{

		add_theme_support(
			'custom-logo',
			[
				'height'               => 32,
				'width'                => 32,
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
	require_once 'inc/User.php';
	require_once 'inc/Model.php';
	require_once 'inc/Models/Login.php';
	require_once 'inc/Models/Manager.php';
	require_once 'inc/Models/Admin.php';
	require_once 'inc/Models/Profile.php';
	require_once 'inc/Router.php';
endif;