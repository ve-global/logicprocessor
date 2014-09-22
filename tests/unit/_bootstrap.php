<?php
// Here you can initialize variables that will be available to your tests

$stubs = glob(__DIR__.'/../stubs/*.php');

foreach ($stubs as $stub)
{
	require_once $stub;
}
