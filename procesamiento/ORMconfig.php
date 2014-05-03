<?php

require_once '../lib/idiorm.php';

ORM::configure(array(
    'connection_string' => 'mysql:host=localhost;dbname=mpaciv',
    'username' => 'maxenz',
    'password' => 'elmaxo'
));

ORM::configure('return_result_sets', true); 
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

?>