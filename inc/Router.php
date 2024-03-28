<?php

if (!class_exists('Router')) :

	final class Router
	{
		private static $route;
		private $current_view;

		public static function routes($routes = null)
		{

			if (self::$route) {
				return self::$route;
			}

			self::$route = new self;

			if( !isset($routes) || !is_array($routes)) throw new Exception("Ошибка: Не заданы маршруты страниц", 1);
			
			self::$route->current_view = self::$route->get_view($routes);

			return self::$route;
		}

		public function render()
		{
			get_header();

			get_template_part('template-parts/content', $this->current_view);

			get_footer();
		}

		private function get_view($routes) {
			foreach ($routes as $cap => $content) {
				if( current_user_can($cap) ) return $content;
			}
			return $routes['guest'];
		}
	}

endif;
