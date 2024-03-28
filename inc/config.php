<?php

if (!defined('WORKPRO')) :
	define('WORKPRO', get_template_directory_uri());
endif;


const PHONE_REGEX = '/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/';
const EMAIL_REGEX = '/^\S+@\S+\.\S+$/';
const WORKPRO_STYLES = WORKPRO . '/css/style.min.css';
const WORKPRO_SCRIPTS = WORKPRO . '/js/app.min.js';

const VIEWS = [
	'login',
	'manager',
	'admin'
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