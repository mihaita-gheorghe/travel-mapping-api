<?php

use MappingApi\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
	//var_dump($context);
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
