<?php
// Бизнес процессы
// Приложение с использованием WOrdpress в качестве фреймворка

try {

Router::routes(PAGE_VIEWS)
		->render();

}
catch(Exception $e) {
		die($e->getMessage());
}

?>