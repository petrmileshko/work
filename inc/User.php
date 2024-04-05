<?php

if (!class_exists('User')) :

	class User
	{
		private static $user;
		private $args;

		public static function init()
		{

			if (self::$user) {
				return self::$user;
			}

			self::$user = new self;

			if (self::$user->isLoginEvent() && !is_user_logged_in()) {
				self::$user->args = self::$user->authorise();
				return self::$user;
			}

			if (self::$user->isLogoutEvent() && is_user_logged_in()) {
				self::$user->args = [];
				self::$user->logout();
				return self::$user;
			}

			if (self::$user->isManagerEvent() && is_user_logged_in()) {
				self::$user->setupArgs();
				self::$user->args['manager'] = self::$user->processEvent();
				return self::$user;
			}

			self::$user->setupArgs();
			return self::$user;
		}

		public function getArgs()
		{
			return $this->args;
		}

		private function setupArgs()
		{

			if (is_user_logged_in()) {
				$user = wp_get_current_user();
				$this->args = [
					'user_id' => $user->ID,
					'user_login' => $user->user_login,
					'user_email' => $user->user_email,
					'user_name' => $user->display_name
				];
				return;
			}

			$this->args = [];
		}

		private function authorise()
		{

			$log = ($_POST['userlogin']) ? wp_unslash( multiStrip( $_POST['userlogin'])) : '';
			$pwd = ($_POST['userpass']) ? wp_unslash( multiStrip($_POST['userpass'])) : '';

			$auth = wp_authenticate($log, $pwd);

			if (!is_wp_error($auth)) {
				nocache_headers();
				wp_clear_auth_cookie();
				wp_set_auth_cookie($auth->ID);
				wp_redirect(get_bloginfo('url'));
			}

			return ['result' => false, 'message' => 'Учетные данные не подтверждены'];
		}

		private function logout()
		{
			wp_logout();
			wp_redirect(get_bloginfo('url'));
		}

		private function isLoginEvent()
		{
			return isset($_POST['form']) && $_POST['form'] === 'login';
		}

		private function isLogoutEvent()
		{
			return isset($_POST['form']) && $_POST['form'] === 'logout';
		}

		private function isManagerEvent()
		{
			return isset($_POST['form']) && $_POST['form'] === 'manager';
		}

		private function processEvent() {
			$args = [];
			foreach($_POST as $key => $item) {
				$args[$key] = multiStrip($item);
			}
			return $args;
		}
	}

endif;
