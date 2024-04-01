<?php

if (!class_exists('User')) :

	class User
	{
		private $user;
		private $args;

		public static function init()
		{

			if (self::$user) {
				return self::$user;
			}

			if (self::isLoginEvent()) {
				self::$args = self::authorise();
				return self::$user;
			}

			if (self::isManagerEvent()) {
				self::$args = ['result' => true, 'message' => 'Отчеты'];
				return self::$user;
			}

			self::$args = null;
			return self::$user;
		}

		private function authorise()
		{
			return ['result' => true, 'message' => 'Авторизация'];
		}

		private function isLoginEvent()
		{
			return isset($_POST['form']) && $_POST['form'] === 'login';
		}

		private function isManagerEvent()
		{
			return isset($_POST['form']) && $_POST['form'] === 'manager';
		}
	}

endif;
