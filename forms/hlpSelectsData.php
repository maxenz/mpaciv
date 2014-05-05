<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . "/mpaciv/sitio/";
	include_once $path . "procesamiento/ORMconfig.php";

	$tiposDeMoneda = ORM::for_table('new_tipos_de_monedas')->find_many();
	$estados = ORM::for_table('new_estados')->find_many();
	$recurrenciaDePago = ORM::for_table('new_recurrencia_pagos')->find_many();
	$tiposFormasDePago = ORM::for_table('new_tipos_formas_de_pago')->find_many();
	$tiposDeMoneda = ORM::for_table('new_tipos_de_monedas')->find_many();




?>