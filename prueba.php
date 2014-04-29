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


       <div id="popupWindow">
            <div>Edit</div>
            <div style="overflow: hidden;">
                <table>
                    <tr>
                        <td align="right">First Name:</td>
                        <td align="left"><input id="firstName" /></td>
                    </tr>
                    <tr>
                        <td align="right">Last Name:</td>
                        <td align="left"><input id="lastName" /></td>
                    </tr>
                    <tr>
                        <td align="right">Product:</td>
                        <td align="left"><input id="product" /></td>
                    </tr>
                    <tr>
                        <td align="right">Quantity:</td>
                        <td align="left"><div id="quantity"></div></td>
                    </tr>
                    <tr>
                        <td align="right">Price:</td>
                        <td align="left"><div id="price"></div></td>
                    </tr>
                    <tr>
                        <td align="right"></td>
                        <td style="padding-top: 10px;" align="right"><input style="margin-right: 5px;" type="button" id="Save" value="Save" /><input id="Cancel" type="button" value="Cancel" /></td>
                    </tr>
                </table>
            </div>
       </div>
       <div id='Menu'>
        <ul>
            <li>Edit Selected Row</li>
            <li>Delete Selected Row</li>
        </ul>
       </div>

<script type="text/javascript">

            var data = {};
            var firstNames =
            [
                "Andrew", "Nancy", "Shelley", "Regina", "Yoshi", "Antoni", "Mayumi", "Ian", "Peter", "Lars", "Petra", "Martin", "Sven", "Elio", "Beate", "Cheryl", "Michael", "Guylene"
            ];
            var lastNames =
            [
                "Fuller", "Davolio", "Burke", "Murphy", "Nagase", "Saavedra", "Ohno", "Devling", "Wilson", "Peterson", "Winkler", "Bein", "Petersen", "Rossi", "Vileid", "Saylor", "Bjorn", "Nodier"
            ];
            var productNames =
            [
                "Black Tea", "Green Tea", "Caffe Espresso", "Doubleshot Espresso", "Caffe Latte", "White Chocolate Mocha", "Cramel Latte", "Caffe Americano", "Cappuccino", "Espresso Truffle", "Espresso con Panna", "Peppermint Mocha Twist"
            ];
            var priceValues =
            [
                "2.25", "1.5", "3.0", "3.3", "4.5", "3.6", "3.8", "2.5", "5.0", "1.75", "3.25", "4.0"
            ];
            var generaterow = function (i) {
                var row = {};
                var productindex = Math.floor(Math.random() * productNames.length);
                var price = parseFloat(priceValues[productindex]);
                var quantity = 1 + Math.round(Math.random() * 10);
                row["firstname"] = firstNames[Math.floor(Math.random() * firstNames.length)];
                row["lastname"] = lastNames[Math.floor(Math.random() * lastNames.length)];
                row["productname"] = productNames[productindex];
                row["price"] = price;
                row["quantity"] = quantity;
                row["total"] = price * quantity;
                return row;
            }
            for (var i = 0; i < 10; i++) {
                var row = generaterow(i);
                data[i] = row;
            }
            var source =
            {
                localdata: data,
                datatype: "array",
                datafields:
                [
                    { name: 'firstname', type: 'string' },
                    { name: 'lastname', type: 'string' },
                    { name: 'productname', type: 'string' },
                    { name: 'quantity', type: 'number' },
                    { name: 'price', type: 'number' }
                ],
                updaterow: function (rowid, rowdata, commit) {
                    // synchronize with the server - send update command
                    // call commit with parameter true if the synchronization with the server is successful 
                    // and with parameter false if the synchronization failed.
                    commit(true);
                },
                deleterow: function (rowid, commit) {
                    // synchronize with the server - send delete command
                    // call commit with parameter true if the synchronization with the server is successful 
                    // and with parameter false if the synchronization failed.
                    commit(true);
                }
            };
            // initialize the input fields.
            $("#firstName").addClass('jqx-input');
            $("#lastName").addClass('jqx-input');
            $("#product").addClass('jqx-input');
            $("#firstName").width(150);
            $("#firstName").height(23);
            $("#lastName").width(150);
            $("#lastName").height(23);
            $("#product").width(150);
            $("#product").height(23);
            // if (theme.length > 0) {
            //     $("#firstName").addClass('jqx-input-' + theme);
            //     $("#lastName").addClass('jqx-input-' + theme);
            //     $("#product").addClass('jqx-input-' + theme);
            // }
            $("#quantity").jqxNumberInput({ width: 150, height: 23,  decimalDigits: 0, spinButtons: true });
            $("#price").jqxNumberInput({symbol: '$', width: 150, height: 23,  spinButtons: true });
            var dataAdapter = new $.jqx.dataAdapter(source);
            var editrow = -1;
            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
                autowidth: true,
                theme: 'ui-lightness',
                source: dataAdapter,
                pageable: true,
                autoheight: true,
                columns: [
                  { text: 'First Name', datafield: 'firstname', width: 200 },
                  { text: 'Last Name', datafield: 'lastname', width: 200 },
                  { text: 'Product', datafield: 'productname', width: 190 },
                  { text: 'Quantity', datafield: 'quantity', width: 90, cellsalign: 'right' },
                  { text: 'Price', datafield: 'price', cellsalign: 'right', cellsformat: 'c2' }
                ]
            });
            // create context menu
            var contextMenu = $("#Menu").jqxMenu({ width: 200, height: 58, autoOpenPopup: false, mode: 'popup'});
            $("#jqxgrid").on('contextmenu', function () {
                return false;
            });
            // handle context menu clicks.
            $("#Menu").on('itemclick', function (event) {
                var args = event.args;
                var rowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                if ($.trim($(args).text()) == "Edit Selected Row") {
                    editrow = rowindex;
                    var offset = $("#jqxgrid").offset();
                    $("#popupWindow").jqxWindow({ position: { x: parseInt(offset.left) + 60, y: parseInt(offset.top) + 60} });
                    // get the clicked row's data and initialize the input fields.
                    var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                    $("#firstName").val(dataRecord.firstname);
                    $("#lastName").val(dataRecord.lastname);
                    $("#product").val(dataRecord.productname);
                    $("#quantity").jqxNumberInput({ decimal: dataRecord.quantity });
                    $("#price").jqxNumberInput({ decimal: dataRecord.price });
                    // show the popup window.
                    $("#popupWindow").jqxWindow('show');
                }
                else {
                    var rowid = $("#jqxgrid").jqxGrid('getrowid', rowindex);
                    $("#jqxgrid").jqxGrid('deleterow', rowid);
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
            $("#popupWindow").jqxWindow({ width: 250, resizable: false,  isModal: true, autoOpen: false, cancelButton: $("#Cancel"), modalOpacity: 0.01 });
            $("#Cancel").jqxButton({ theme: 'bootstrap' });
            $("#Save").jqxButton({ theme: 'bootstrap' });
            // update the edited row when the user clicks the 'Save' button.
            $("#Save").click(function () {
                if (editrow >= 0) {
                    var row = { firstname: $("#firstName").val(), lastname: $("#lastName").val(), productname: $("#product").val(),
                        quantity: parseInt($("#quantity").jqxNumberInput('decimal')), price: parseFloat($("#price").jqxNumberInput('decimal'))
                    };
                    var rowid = $("#jqxgrid").jqxGrid('getrowid', editrow);
                    $('#jqxgrid').jqxGrid('updaterow', rowid, row);
                    $("#popupWindow").jqxWindow('hide');
                }
            });

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


