<?php


#echo 'new_script';

/*
$obj = new \stdClass();
$obj->Id = 21;
$obj->Name = 'before';
*/


$obj = (object)['Id' => 21, 'Name' => 'before'];

echo (($obj instanceof \stdClass) ? "is stdClass" : "it is not stdClass") . "\n";

changeObjectName($obj);



var_dump($obj);

function changeObjectName(\stdClass $obj)
{
	$obj->Name = 'after';
}