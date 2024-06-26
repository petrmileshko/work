<?php

if (!defined('WORKPRO')) :
	define('WORKPRO', get_template_directory_uri());
endif;

if (!defined('DBASE_VER')) :
	define('DBASE_VER', get_option('workpro_dbase_version', 0));
endif;


const PHONE_REGEX = '/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/';
const EMAIL_REGEX = '/^\S+@\S+\.\S+$/';
const WORKPRO_STYLES = WORKPRO . '/css/style.min.css';
const WORKPRO_SCRIPTS = WORKPRO . '/js/app.min.js';
const WORKPRO_VERSION = '1.0.0';
const WORKPRO_NAME = 'БИЗНЕС ПРОЦЕССЫ';
const DEFAULT_MODEL = 'Login';


const PAGE_VIEWS = [
	'guest' => 'Login',
	'subscriber' => 'Manager',
	'contributor' => 'Manager',
	'author' => 'Admin',
	'editor' => 'Admin',
	'administrator' => 'Admin'
];

const TABLES = [
	'workpro_reports',
	'workpro_outlets'
];

if (!function_exists('validate_phone_number')) {

	function validate_phone_number($phone)
	{
		if (preg_match(PHONE_REGEX, $phone)) {
			return 1;
		} else {
			return 0;
		}
	}
}

if (!function_exists('validate_email')) {

	function validate_email($email)
	{
		if (preg_match(EMAIL_REGEX, $email)) {
			return 1;
		} else {
			return 0;
		}
	}
}

if (!function_exists('workpro_sanitize_checkbox')) {

	function workpro_sanitize_checkbox($input)
	{
		if (true === $input) {
			return 1;
		} else {
			return 0;
		}
	}
}

if (!function_exists('workpro_sanitize_textarea')) {

	function workpro_sanitize_textarea($input)
	{
		return htmlspecialchars($input);
	}
}

if (!function_exists('workpro_sanitize_number')) {

	function workpro_sanitize_number($input)
	{
		if ($input) {
			return (int) $input;
		} else {
			return false;
		}
	}
}

if (!function_exists('workpro_sanitize_email')) {

	function workpro_sanitize_email($mail)
	{
		if ($mail) {

			return sanitize_email($mail);;
		} else {
			return false;
		}
	}
}

if (!function_exists('multiStrip')) {
	function multiStrip($str)
	{
		return stripslashes(strip_tags(trim($str)));
	}
}

if (!function_exists('convertDate')) {
	function convertDate($date,$format)
	{
		$newDate = new DateTime($date);

		return $newDate->format($format);
	}
}

if (!function_exists('workpro_num_suffix')) {
	function workpro_num_suffix($number, $titles, $show_number = 1)
	{
		if (is_string($titles))
			$titles = preg_split('/, */', $titles);

		if (empty($titles[2]))
			$titles[2] = $titles[1];

		$cases = [2, 0, 1, 1, 1, 2];

		$intnum = abs((int) strip_tags($number));

		$title_index = ($intnum % 100 > 4 && $intnum % 100 < 20)
			? 2
			: $cases[min($intnum % 10, 5)];

		return ($show_number ? "$number " : '') . $titles[$title_index];
	}
}