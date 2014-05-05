<?php

require_once '../lib/idiorm.php';
require_once 'ORMconfig.php';

ORM::for_table('new_formas_de_pago')->find_one(4)->delete();


?>