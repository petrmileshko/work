<?php

if (!class_exists('Router')) :

	final class Router
	{
		private static $route;
		private $current_model;
		private $user;

		public static function routes($routes = null)
		{

			if (self::$route) {
				return self::$route;
			}

			self::$route = new self;

			if (!isset($routes)) throw new Exception("Ошибка: Не заданы маршруты страниц", 1001);

			if (!is_array($routes)) throw new Exception("Ошибка: Ожидается ассоциативный массив в качестве маршрутов", 1002);

			self::$route->user =  User::init();

			self::$route->current_model = self::$route->selectModel($routes);

			return self::$route;
		}

		public function init()
		{
			return new $this->current_model($this->user->getArgs());
		}

		private function selectModel($routes)
		{

			foreach ($routes as $cap => $model) {
				if (current_user_can($cap)) return $model;
			}

			return $routes['guest'] ?? DEFAULT_MODEL;
		}
	}

endif;
