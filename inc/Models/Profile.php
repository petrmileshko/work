<?php

if (!class_exists('Profile')) :

	final class Profile extends Model
	{

		public function __construct($args = [])
		{
			if (empty($args)) throw new Exception("Profile() необходимо передать аргументом данные пользователя", 1013);
			parent::__construct($args);
		}

		public function render()
		{
			parent::render();
		}
	}

endif;
