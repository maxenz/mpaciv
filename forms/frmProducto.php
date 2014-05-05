<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . "/mpaciv/sitio/";
	include_once $path."header.php";
	include_once $path."forms/hlpSelectsData.php";

	$prodDesc = "";
	$precio = "";
	$tipMoneda = "";
	$recPago = "";
	$tipFormaPago = "";
	$estado = "";
	$formaPago = "";
	$output = "";

	if ($_POST) {
		$prodDesc = trim($_POST['iptProdDesc']);
		$precio = trim($_POST['iptPrecio']);
		$tipMoneda = trim($_POST['selTipMoneda']);
		$recPago = trim($_POST['selRecPago']);
		$tipFormaPago = trim($_POST['selTipFormaPago']);
		$estado = trim($_POST['selEstado']);
		$formaPago = trim($_POST['selFormaPago']);

		$errors = array();
  
	  // Validate the input
	  if (strlen($prodDesc) == 0)
	    array_push($errors, "Please enter your name");

	  if (!(strcmp($precio, "Male") || strcmp($gender, "Female") || strcmp($gender, "Other"))) 
	    array_push($errors, "Please specify your gender");
	  
	  if (strlen($tipMoneda) == 0) 
	    array_push($errors, "Please specify your address");
	    	    
	  if (strlen($recPago) == 0)
	    array_push($errors, "Please enter a valid username");
	        
	  // If no errors were found, proceed with storing the user input
	  if (count($errors) == 0) {
	  	try {

	  		$producto = ORM::for_table('new_productos')->create();

			$producto->Descripcion = $prodDesc;
			$producto->FormaPagoID = $formaPago;
			$producto->EstadoID = $estado;
			$producto->TipoMonedaID = $tipMoneda;
			$producto->RecurrenciaPagoID = $recPago;
			$producto->Precio = $precio;								

			$producto->save();

			header('Location: ../index.php');
			exit;
	  	} catch (PDOException $e) {

	  		array_push($errors, $e->getMessage());
	  	}


	  }

  		foreach($errors as $val) {
    		$output .= "<p class='output'>$val</p>";
  		}
	}

?>
<?php 
	if ($output <> '') {
		echo '<div class="row"><div class="col-md-8 col-md-offset-2"><div class="alert alert-danger"><strong>Error!</strong>'. $output.'</div></div></div>';
	}
?>

<form method="POST" action="frmProducto.php" id="register-form" novalidate="novalidate" role="form">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo producto</h3>
				</div>
				<div class="panel-body">
					<div class="row margin-row">
						<div class="col-md-4">
							<div class="form-group">
						    	<label for="iptProdDesc">Descripci&oacute;n del Producto</label>
	 							<input type="text" id="iptProdDesc" class="form-control" name="iptProdDesc" value="<? echo $prodDesc; ?>" autofocus></input>
	  						</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
						    	<label for="iptPrecio">Precio</label>
								<input type="number" id="iptPrecio" class="form-control" name="iptPrecio" value="<? echo $precio; ?>"></input>
	  						</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="selTipMoneda">Tipo de Moneda</label>
							<select class="form-control" id="selTipMoneda" name="selTipMoneda">
								<?php
									foreach ($tiposDeMoneda as $tipMon ) {
										if (($tipMoneda == $tipMon->ID) && ($tipMoneda <> '')) {
											echo "<option selected='selected' value='".$tipMon->ID."'>" . $tipMon->Descripcion . "</option>";
										} else {
											echo "<option value='".$tipMon->ID."'>" . $tipMon->Descripcion . "</option>";
										}
									}
								?>
							</select>
							</div>

						</div>
					</div>

						<div class="row margin-row">

						<div class="col-md-6">
							<div class="form-group">
						    	<label for="selTipFormaPago">Tipo de Forma de Pago</label>
							<select class="form-control" id="selTipFormaPago" name="selTipFormaPago" >
								<?php
									foreach ($tiposFormasDePago as $tipFrmPago ) {
								if (($tipFormaPago == $tipFrmPago->ID) && ($tipFormaPago <> '')) {
											echo "<option  selected='selected' value='".$tipFrmPago->ID."'>" . $tipFrmPago->Descripcion . "</option>";
										} else {
											echo "<option value='".$tipFrmPago->ID."'>" . $tipFrmPago->Descripcion . "</option>";
										}
									}
								?>
							</select>
						</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group">
						    	<label for="selFormaPago">Forma de Pago</label>
							<select class="form-control" id="selFormaPago" name="selFormaPago" >
								<?php
									foreach ($formasDePago as $frmPago ) {
								if (($formaPago == $frmPago->ID) && ($formaPago <> '')) {
											echo "<option  selected='selected' value='".$frmPago->ID."'>" . $frmPago->Descripcion . "</option>";
										} else {
											echo "<option  value='".$frmPago->ID."'>" . $frmPago->Descripcion . "</option>";
										}
									}
								?>
							</select>
						</div>
						</div>											
						</div>

					<div class="row margin-row">
						<div class="col-md-6">
								<div class="form-group">
						    	<label for="selRecPago">Recurrencia de Pago</label>
							<select class="form-control" id="selRecPago" name="selRecPago" >
								<?php
									foreach ($recurrenciaDePago as $rpago ) {
									if (($recPago == $rpago->ID) && ($recPago <> '')) {
											echo "<option selected='selected' value='".$rpago->ID."'>" . $rpago->Descripcion . "</option>";
										} else {
											echo "<option value='".$rpago->ID."'>" . $rpago->Descripcion . "</option>";
										}
									}
								?>
							</select>
						</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
						    	<label for="selEstado">Estado del Producto</label>
							<select class="form-control" id="selEstado" name="selEstado" >
								<?php
									foreach ($estados as $est ) {
								if (($estado == $est->ID) && ($estado <> '')) {
											echo "<option selected='selected' value='".$est->ID."'>" . $est->Descripcion . "</option>";
										} else {
											echo "<option value='".$est->ID."'>" . $est->Descripcion . "</option>";
										}
									}
								?>
							</select>
							</div>						
						</div>
					</div>



					<div class="row">
						<div class="col-md-offset-5">
							<input type="submit" class="btn btn-primary" value="Guardar" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
    include_once $path . "footer.php";
?>

<?php
	include_once $path . "jsScripts.php";
?>

<script>

setFormasDePago($('#selTipFormaPago').val());

function setFormasDePago(id) {
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: '../procesamiento/qrysAjaxGET.php?opt=1&tipFrmPagoID=' + id,
		success: function(formasDePago) {
			var selFormasDePago = "";
			$.each(formasDePago, function(idx, obj) {
				selFormasDePago += "<option value='" + obj.ID + "'>" + obj.Descripcion + "</option>";
			});		
			console.log(selFormasDePago);
			$('#selFormaPago').empty().append(selFormasDePago);
		},
		error: function(error) {
			alert('Error estableciento formas de pago.');
		}
	});
}

$("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            prodDesc: "required",
            precio: "required",
            formaPago: "required",
            estado: "required"
        },
        
        // Specify the validation error messages
        messages: {
            prodDesc: "Please enter your name",
            precio: "Please specify your gender",
            formaPago: "Please enter your address",
            estado: "Please enter a valid email address"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

	$('#selTipFormaPago').on('change',function(){
		setFormasDePago($(this).val());
	})


</script>

<?php
    include_once $path . "closePage.php";
?>