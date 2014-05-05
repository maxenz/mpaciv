<?php

	$path = $_SERVER['DOCUMENT_ROOT'] . "/mpaciv/sitio/";
	include_once $path . "procesamiento/ORMconfig.php";

	$opt_query = (int)$_GET["opt"];
	switch ($opt_query) {
		case 1:
			echo json_encode(ORM::for_table('new_productos')
				->table_alias('prod')
				->select_many('prod.Descripcion','prod.ID','prod.Precio')
				->select('est.Descripcion', 'Estado')
				->select('frmPago.Descripcion','FormaDePago')
				->select('tipMoneda.Descripcion','TipoDeMoneda')
				->select('recPago.Descripcion','RecurrenciaDePago')
				->select('tipFrmPago.Descripcion','TipoFormaDePago')
				->left_outer_join('new_estados',array('prod.EstadoID', '=','est.ID'),'est')
				->left_outer_join('new_formas_de_pago',array('prod.FormaPagoID', '=','frmPago.ID'),'frmPago')
				->left_outer_join('new_tipos_de_monedas',array('prod.TipoMonedaID', '=','tipMoneda.ID'),'tipMoneda')
				->left_outer_join('new_recurrencia_pagos',array('prod.RecurrenciaPagoID', '=','recPago.ID'),'recPago')
				->left_outer_join('new_tipos_formas_de_pago',array('frmPago.TipoFormaPagoID', '=','tipFrmPago.ID'),'tipFrmPago')				
				->find_array());

		break;
	}


?>