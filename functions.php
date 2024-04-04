<?php
//Инициализация настроек
require_once 'inc/config.php';

if (!function_exists('workpro_dbase_setup') && DBASE_VER === 0) :

	function workpro_dbase_setup()
	{
		global $wpdb;
		$query = "
			CREATE TABLE `" . $wpdb->workpro_reports . "` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `outlets_id` BIGINT NOT NULL , `revenue` FLOAT NOT NULL , `user_id` BIGINT UNSIGNED NOT NULL , `report_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;
			CREATE TABLE `" . $wpdb->workpro_outlets . "` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `outlets_name` VARCHAR(150) NOT NULL , `outlets_address` MEDIUMTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
			";
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta($query);
		update_option('workpro_dbase_version', '1.0');
	}

	add_action('init', 'workpro_dbase_setup', 0);
endif;

if (!function_exists('workpro_setup') && WORKPRO) :

	function workpro_setup()
	{
		global $wpdb;
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

		foreach (TABLES as $table) {
			$wpdb->$table = $wpdb->prefix . $table;
		}
	}
	add_action('after_setup_theme', 'workpro_setup');
	require_once 'inc/User.php';
	require_once 'inc/Model.php';
	require_once 'inc/Models/Login.php';
	require_once 'inc/Models/Manager.php';
	require_once 'inc/Models/Admin.php';
	require_once 'inc/Models/Profile.php';
	require_once 'inc/Models/Reports.php';
	require_once 'inc/Models/ReportSubmit.php';
	require_once 'inc/Router.php';
endif;
