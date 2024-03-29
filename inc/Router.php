<?php

if (!class_exists('Router')) :

	final class Router
	{
		private static $route;
		private $current_model;

		public static function routes($routes = null)
		{

			if (self::$route) {
				return self::$route;
			}

			self::$route = new self;

			if (!isset($routes) || !is_array($routes)) throw new Exception("Ошибка: Не заданы маршруты страниц", 1);

			self::$route->current_model = self::$route->selectModel($routes);

			return self::$route;
		}

		public function init()
		{
			return new $this->current_model;
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
