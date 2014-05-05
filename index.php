<?php

	include_once "header.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-shopping-cart"></h4><br/>Productos
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-th-large"></h4><br/>Servicios
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-file"></h4><br/>T&iacute;tulos
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-star"></h4><br/>Empresas
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-play"></h4><br/>Otros
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab" style="padding-top:25px">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                     <div class="row">
        <div class="col-md-8">
            <div id="jqxgrid"></div>
        </div>
    </div>
<!--                     <center>
                      <h1 class="glyphicon glyphicon-plane" style="font-size:12em;color:#428bca"></h1>
                      <h2 style="margin-top: 0;color:#428bca">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#428bca">Flight Reservation</h3>
                    </center> -->
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
<!--                     <center>
                      <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>
                    </center> -->
                </div>
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                    </center>
                </div>
            </div>
        </div>
  </div>
</div>

      <div id='Menu'>
        <ul>
            <li>Agregar Producto</li>
            <li>Editar Producto</li>
            <li>Eliminar Producto</li>
        </ul>
       </div>


<!--     <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<div id="jqxgrid"></div>
    	</div>
    </div> -->

<?php

    include_once "footer.php";

?>

<?php

	include_once "jsScripts.php";

?>

<script type="text/javascript">
            
            var source ={
                datatype: "json",
                datafields: [{ name: 'ID' },{ name: 'Descripcion' },{ name: 'Precio', type: 'number' },{ name: 'Estado' },{ name: 'FormaDePago' },{ name: 'TipoFormaDePago' },
                { name: 'TipoDeMoneda' },{ name: 'RecurrenciaDePago' }],
                url: 'procesamiento/querysGrales.php?opt=1',
                deleterow: function (idProd, commit) {
                    console.log(idProd);
                    var r=confirm("Está seguro que desea eliminar el registro?");
                    if (r==true){
                            $.ajax({
                                type: 'POST',
                                url: 'procesamiento/qrysAjaxPOST.php?opt=1&idProd=' + idProd,
                                success: function(retVal) {
                                    console.log(retVal);
                                    if (parseInt(retVal) == 1) {
                                        commit(true);
                                    } else {
                                        alert(retVal);  
                                    }                                 
                                },
                                error: function(error) {
                                    alert('Error con la conexion al servidor.');
                                    commit(false);
                                }
                            });
                    } else {
                        commit(false);
                    }
                }
            };

            // var source =
            // {
            //     localdata: data,
            //     datatype: "array",
            //     datafields:
            //     [
            //         { name: 'firstname', type: 'string' },
            //         { name: 'lastname', type: 'string' },
            //         { name: 'productname', type: 'string' },
            //         { name: 'quantity', type: 'number' },
            //         { name: 'price', type: 'number' }
            //     ],
            //     updaterow: function (rowid, rowdata, commit) {
            //         // synchronize with the server - send update command
            //         // call commit with parameter true if the synchronization with the server is successful 
            //         // and with parameter false if the synchronization failed.
            //         commit(true);
            //     },
            //     deleterow: function (rowid, commit) {
            //         // synchronize with the server - send delete command
            //         // call commit with parameter true if the synchronization with the server is successful 
            //         // and with parameter false if the synchronization failed.
            //         commit(true);
            //     }
            // };

            var editrow = -1;
            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                theme: 'ui-lightness',
                source: source,
                pageable: true,
                autoheight: true,
                width: 700,
                columns: [
                  { text: 'ID', datafield: 'ID' },
                  { text: 'Descripcion', datafield: 'Descripcion'},
                  { text: 'Estado', datafield: 'Estado'},
                  { text: 'Forma de Pago', datafield: 'FormaDePago'},
                  { text: 'Tipo de Pago', datafield: 'TipoFormaDePago'} ,  
                  { text: 'Recurrencia', datafield: 'RecurrenciaDePago'},              
                  { text: 'Moneda', datafield: 'TipoDeMoneda'},
                  { text: 'Precio', datafield: 'Precio',cellsalign: 'right', cellsformat: 'c2'}                

                ]
            });
            // create context menu
            var contextMenu = $("#Menu").jqxMenu({ width: 200, height: 80, autoOpenPopup: false, mode: 'popup'});
            $("#jqxgrid").on('contextmenu', function () {
                return false;
            });
            //handle context menu clicks.
            $("#Menu").on('itemclick', function (event) {
                var args = event.args;
                var rowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', rowindex);
                var idProd = dataRecord.ID;
                if ($.trim($(args).text()) == "Agregar Producto") {
                    editrow = rowindex;
                    window.location.href = "forms/frmProducto.php";
                    // var offset = $("#jqxgrid").offset();
                    // $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60} });
                    // // get the clicked row's data and initialize the input fields.
                    // var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                    // $("#firstName").val(dataRecord.firstname);
                    // $("#lastName").val(dataRecord.lastname);
                    // $("#product").val(dataRecord.productname);
                    // $("#quantity").jqxNumberInput({ decimal: dataRecord.quantity });
                    // $("#price").jqxNumberInput({ decimal: dataRecord.price });
                    // // show the popup window.
                    // $("#popupWindow").jqxWindow('show');
                }
                else if ($.trim($(args).text()) == "Editar Producto") {
                    var rowid = $("#jqxgrid").jqxGrid('getrowid', rowindex);
                    $("#jqxgrid").jqxGrid('deleterow', rowid);
                } else {
                    $("#jqxgrid").jqxGrid('deleterow', idProd);
                }
            });
            $("#jqxgrid").on('rowclick', function (event) {
                if (event.args.rightclick) {
                    $("#jqxgrid").jqxGrid('selectrow', event.args.rowindex);
                    var scrollTop = $(window).scrollTop();
                    var scrollLeft = $(window).scrollLeft();
                    contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                    return false;
                }
            });
            // initialize the popup window and buttons.
            // $("#popupWindow").jqxWindow({ width: 250, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01 });
            // $("#Cancel").jqxButton({ theme: 'bootstrap' });
            // $("#Save").jqxButton({ theme: 'bootstrap' });
            // // update the edited row when the user clicks the 'Save' button.
            // $("#Save").click(function () {
            //     if (editrow >= 0) {
            //         var row = { firstname: $("#firstName").val(), lastname: $("#lastName").val(), productname: $("#product").val(),
            //             quantity: parseInt($("#quantity").jqxNumberInput('decimal')), price: parseFloat($("#price").jqxNumberInput('decimal'))
            //         };
            //         var rowid = $("#jqxgrid").jqxGrid('getrowid', editrow);
            //         $('#jqxgrid').jqxGrid('updaterow', rowid, row);
            //         $("#popupWindow").jqxWindow('hide');
            //     }
            //});

            $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
    </script>

    <?php
        include_once "closePage.php";
    ?>


