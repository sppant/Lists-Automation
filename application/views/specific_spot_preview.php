<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

	<title>Ena Channel Δημιουργία Σποτ</title>
	<div class="row">
		<div class="col-md-5 offset-1">
	<h1>ΠΡΟΒΟΛΗ ΣΠΟΤ</h1>
<div class="row">
	<div class="col-md-6">
		<h1><span class="badge badge-secondary"><?php echo $customer ?></span></h1>

	</div>
	<div class="col-md-6">
		<h1><span class="badge badge-secondary"><?php echo $spot ?></span></h1>

	</div>
</div>



</div>
<div class="col-md-5">

	<div class="logo" style="position:relative; margin-left:60%;">
		<img src="/listes/img/ENALOGO.png" class="" height="90px" alt="Ena channel">
	</div>
</div>
</div>
</head>
<body>


	<main role="main" class="container">

		<div class="container" id="print">

			<div id ="printableArea">


			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">ΠΕΛΑΤΗΣ</th>
			      <th scope="col">ΠΡΟΙΟΝ</th>
			      <th style="width:85px;" scope="col">ΗΜ/ΝΙΑ</th>
						<th scope="col">ΩΡΑ</th>
						<th scope="col">ΕΚΠΟΜΠΗ</th>
						<th scope="col">BINTEO</th>
						<th scope="col">ΤΥΠΟΣ</th>
						<th scope="col">ΚΑΤΗΓΟΡΙΑ</th>
						<th scope="col">ΔΙΑΡΚΕΙΑ</th>
						<th scope="col">ΤΙΜΗ</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
						<?
						$count = 1;
						$final_price = 0;
						foreach($spots as $each){
							$final_price =$final_price +$each['spot_price'];  ?>
			      <th scope="row"><?php echo $count ?></th></th>
			      <td><?php echo $each['customer_name']; ?></td>
			      <td><?php echo $each['spot_name']; ?></td>
			      <td><?php echo $each['spot_date']; ?></td>
						<td><?php echo $each['spot_time']; ?></td>
						<td><?php echo $each['spot_show']; ?></td>
						<td><?php echo $each['spot_video_name']; ?></td>
						<td><?php echo $each['spot_type']; ?></td>
						<td><?php echo $each['spot_category']; ?></td>
						<td><?php echo $each['spot_duration']; ?></td>
						<td><?php echo $each['spot_price']; ?>€</td>
						<td id='delete_row' >	<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url("index.php/Spot_preview/delete_specific_spot_on_preview/" .$each['spot_id'].'/'.$customer. '/'.$spot);?>'" >X</button></td>
			    </tr>

					<?
					$count++;
				 }?>
			  </tbody>
			</table>

<?php  ?>

			<div class="col-md-4 offset-8">
			<table class="table">
    <tbody>
        <tr>
          <th>ΣΥΝΟΛΟ ΝΕΤ</th>
            <td></td>
          	<td><?php echo $final_price ?>€</td></td>
        </tr>
        <tr>
          <th>ΑΓΓ/ΜΟ</th>
            <td>21.5%</td>
            <td><?php echo 0.215 * $final_price ?>€</td>
        </tr>
        <tr>
          <th>Φ.Π.Α</th>
            <td>24%</td>
            <td><?php echo 0.24 * $final_price ?>€</td></td>
        </tr>
    </tbody>
</table>
</div>


</div>

<hr>
<div class="row">

<div class="col-md-12" >
	<input type="button" class="btn btn-info" onclick="printDiv('printableArea')" value="ΕΚΤΥΠΩΣΗ" />
	 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
ΑΠΟΘΗΚΕΥΣΗ ΚΑΙ ΕΞΟΔΟΣ	 </button>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
ΔΙΑΓΡΑΦΗ <?PHP  echo $spot ?>	 </button>


</div>

</div>
<hr>




	</div>

	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">ΔΙΑΓΡΑΦΗ</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
ΕΙΣΑΙ ΣΙΓΟΥΡΟΣ ΟΤΙ ΘΕΣ ΝΑ ΔΙΑΓΡΑΨΕΙΣ ΤΟ ΣΠΟΤ
<p> <?PHP echo $spot ?> ?</p></div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
	        <button id="delete" type="button" class="btn btn-primary" >ΝΑΙ</button>

	      </div>
	    </div>
	  </div>
	</div>


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">ΑΠΟΘΗΚΕΥΣΗ</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ΕΙΣΑΙ ΣΙΓΟΥΡΟΣ ΟΤΙ Η ΚΑΤΑΧΩΡΗΣΗ ΕΙΝΑΙ ΣΩΣΤΗ?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
	        <button type="button" onclick="window.location='<?php echo base_url("index.php/main");?>'" class="btn btn-primary">ΝΑΙ</button>
	      </div>
	    </div>
	  </div>
	</div>
	</main>

<script type="text/javascript">
$('#delete').click(function(){
	var customer ="<?php echo $customer ?>";
	var spot ="<?php echo $spot ?>";
	window.location.href = "<?php echo base_url("index.php/Spot_preview/delete_specific_spot/");?>"+customer+'/'+spot;
}

)

</script>


	<script type="text/javascript">
	function printDiv(divName) {
		$('td#delete_row').css({
            'display' : 'none'
        });

				$("#hide").click(function(){
	$("delete_row").hide();
});

	     var printContents = document.getElementById(divName).innerHTML;
	     var originalContents = document.body.innerHTML;

	     document.body.innerHTML = printContents;

	     window.print();

	     document.body.innerHTML = originalContents;
	}
	 </script>

	 <script type="text/javascript">
	 function add_spot_button() {
		 var first = "<?php echo $customer['first_name']; ?>";
		 var last = "<?php echo $customer['last_name']; ?>";
		 window.location.href = "<?php echo base_url("index.php/New_spot/");?>";
	 }
	 </script>



	<script type="text/javascript">
	    function PrintDiv() {
				window.print();
	            }
	 </script>
	<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="/listes/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/customers_autocomplete.js"></script>
	<script src="../js/add_row.js"></script>



</body>
</html>
