<?php

use phpmock\phpunit\PHPMock;

PHPMock::defineFunctionMock('Kayrah87\NameParser\Part', 'function_exists');

require dirname(__DIR__) . '/vendor/autoload.php';
