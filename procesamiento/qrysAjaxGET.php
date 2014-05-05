<?php

	$path = $_SERVER['DOCUMENT_ROOT'] . "/mpaciv/sitio/";
	include_once $path . "procesamiento/ORMconfig.php";

		$opt = (int)$_GET["opt"];

		switch ($opt) {
			case 1:
				$id = $_GET["tipFrmPagoID"];
				echo json_encode(getFormasDePagoSegunTipo($id));
			break;
		}

	function getFormasDePagoSegunTipo($id) {
		return ORM::for_table('new_formas_de_pago')->where('TipoFormaPagoID',$id)->find_array();
	}

?>