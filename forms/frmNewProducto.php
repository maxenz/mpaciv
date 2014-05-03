<?php
	$path = $_SERVER['DOCUMENT_ROOT'] . "/mpaciv/sitio/";
	include_once $path."header.php";
	include_once $path."forms/hlpSelectsData.php";

	$prodDesc = "";
	$precio = "";
	$tipMoneda = "";
	$recPago = "";
	$formaPago = "";
	$estado = "";
	$output = "";

	if ($_POST) {
		$prodDesc = trim($_POST['prodDesc']);
		$precio = trim($_POST['precio']);
		$tipMoneda = trim($_POST['tipMoneda']);
		$recPago = trim($_POST['recPago']);
		$formaPago = trim($_POST['formaPago']);
		$estado = trim($_POST['estado']);

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

			header('Location: ../prueba.php');
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

<form method="POST" action="frmNewProducto.php" id="register-form" novalidate="novalidate">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo producto</h3>
				</div>
				<div class="panel-body">
					<div class="row margin-row">
						<div class="col-md-4">
							<input type="text" class="form-control" name="prodDesc" placeholder="Descripción" value="<? echo $prodDesc; ?>" autofocus></input>
						</div>
						<div class="col-md-4">
							<input type="number" class="form-control" name="precio" placeholder="Precio" value="<? echo $precio; ?>"></input>
						</div>
						<div class="col-md-4">
							<select class="form-control" name="tipMoneda">
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
					<div class="row margin-row">
						<div class="col-md-4">
							<select class="form-control" name="recPago" >
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
						<div class="col-md-4">
							<select class="form-control" name="formaPago" >
								<?php
									foreach ($formasDePago as $frmPago ) {
								if (($formaPago == $frmPago->ID) && ($frmPago <> '')) {
											echo "<option selected='selected' value='".$frmPago->ID."'>" . $frmPago->Descripcion . "</option>";
										} else {
											echo "<option value='".$frmPago->ID."'>" . $frmPago->Descripcion . "</option>";
										}
									}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<select class="form-control" name="estado" >
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
</script>

<?php
    include_once $path . "closePage.php";
?>