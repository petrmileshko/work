<?php
// Бизнес процессы
// Приложение с использованием WOrdpress в качестве фреймворка

try {

	Router::routes(PAGE_VIEWS)
		->init()
		->render();
		
} catch (Exception $e) {
	die("<p class='error'>Ошибка ". $e->getCode() . " : " . $e->getMessage() ."</p>" );
}
