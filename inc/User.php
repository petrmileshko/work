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

			if (self::$user->isLoginEvent()) {
				self::$user->args = self::$user->authorise();
				return self::$user;
			}

			if (self::$user->isManagerEvent()) {
				self::$user->args = ['result' => true, 'message' => 'Отчеты'];
				return self::$user;
			}

			self::$user->args = [];
			return self::$user;
		}

		public function getArgs()
		{
			return $this->args;
		}

		private function authorise()
		{
			
			return ['result' => false, 'message' => 'Учетные данные не подтвержедны'];
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
