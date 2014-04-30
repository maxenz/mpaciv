<?php

require_once '../lib/idiorm.php';
require_once 'ORMconfig.php';



foreach(ORM::for_table('dt_countries')->find_result_set() as $record) {
    echo $record->country;
}

?>