<?php

if (!class_exists('User')) :

	class User
	{
		private $user;

		public static function init()
		{

			if (self::$user) {
				return self::$user;
			}

			if ( self::isLoginEvent() ) self::authorise();

			return self::$user;
		}

		private function authorise() {
			echo 'Авторизация';
		}

		private function isLoginEvent() {
				return isset($_POST['form']) && $_POST['form'] === 'Login';
		}
	}

endif;
