<?php

	$path = $_SERVER['DOCUMENT_ROOT'] . "/mpaciv/sitio/";
	include_once $path . "procesamiento/ORMconfig.php";

		$opt = (int)$_GET["opt"];

		switch ($opt) {
			case 1:
				$idProd = $_GET["idProd"];
				try {
					$prod = ORM::for_table('new_productos')->find_one(6);
					$prod->delete();
					echo 1;
				} catch (PDOException $ex) {
					echo $ex.getMessage();
				}

			break;
		}

?>