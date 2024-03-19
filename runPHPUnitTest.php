<?php

define("PHPUNIT_COMPOSER_INSTALL","vendor/autoload.php");

require PHPUNIT_COMPOSER_INSTALL;

$query = $_SERVER["QUERY_STRING"];
if ($query==null || $query==""){
    $query="?--verbose&-debug&tests";
}

//$_SERVER["QUERY_STRING"] to $_SERVER['argv'];

$_SERVER['argv'] = explode("&",$query);

//PHPUnit use $_SERVER['argv'] for input value

PHPUnit\TextUI\Command::main(true);

/*Use

command line "./vendor/bin/phpunit param1 param2 param..."

browser URI "localhost?param1&param2&param..."

*/