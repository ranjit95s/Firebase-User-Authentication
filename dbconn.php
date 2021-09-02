<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;


$factory = (new Factory)
                    ->withServiceAccount('fir-user-auth-c7319-firebase-adminsdk-u5xde-37a44d6651.json')
                    ->withDatabaseUri('https://fir-user-auth-c7319-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();


?>