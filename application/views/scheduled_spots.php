<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Προβολή Προγράμματος | Ena Channel </title>
</head>
<body>
	<main role="main" class="container">
		<?php if (!$scheduled){ ?>
			<div class="row">

				<div class="col-md-12">
			<h1>ΠΡΟΒΟΛΗ ΠΡΟΓΡΑΜΜΑΤΟΣ</h1>
		</div>
		<div class="col-md-12" style="padding:20px;">
				<p style="display:inline; border:3px solid red; padding:20px;">Δεν υπάρχουν σποτ στις ημερομηνίες που διάλεξες. Πρόσθεσε σποτ ή διάλεξε άλλες ημερομηνίες</p>
			</div>
			<button style="margin: 20px" type="button" class="btn btn-secondary" onclick="window.location='<?php echo base_url("index.php/main");?>'" >ΠΙΣΩ</button>
		</div>

		<?}else { ?>
			<div class="row">
				<div class="col-md-6">
			<h1>ΠΡΟΒΟΛΗ ΠΡΟΓΡΑΜΜΑΤΟΣ</h1>
		</div>
		<div class="col-md-6">
			<div class="logo" style="position:relative; margin-left:60%;">
				<img src="/listes/img/ENALOGO.png" class="" height="90px" alt="Ena channel">
			</div>
		</div>
		</div>
		<div class="container" id="print">
			<div id ="printableArea">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">ΠΕΛΑΤΗΣ</th>
						<th scope="col">ΠΡΟΙΟΝ</th>
						<th scope="col">ΗΜ/ΝΙΑ</th>
						<th scope="col">ΩΡΑ</th>
						<th scope="col">ΕΚΠΟΜΠΗ</th>
						<th scope="col">ΣΠΟΤ</th>
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
						foreach($scheduled as $each){
							$final_price =$final_price +$each['spot_price'];  ?>
						<th scope="row"><?php echo $count ?></th></th>
						<td><?php echo $each['customer_name']; ?></td>
						<td><?php echo $each['spot_name']; ?></td>
						<td><?php echo $each['spot_date']; ?></td>
						<td><?php echo $each['spot_time']; ?></td>
						<td><?php echo $each['spot_show']; ?></td>
						<td><?php echo $each['spot_link']; ?></td>
						<td><?php echo $each['spot_type']; ?></td>
						<td><?php echo $each['spot_category']; ?></td>
						<td><?php echo $each['spot_duration']; ?></td>
						<td><?php echo $each['spot_price']; ?>€</td>
					</tr>
					<?
					$count++;
				 }?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-5" >
				<input type="button" class="btn btn-info" onclick="printDiv('printableArea')" value="ΕΚΤΥΠΩΣΗ" />
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> ΕΞΟΔΟΣ	</button>
			</div>
			<div class="col-md-5" >
				<input type="button" class="btn btn-secondary" onclick="window.location='<?php echo base_url("index.php/Create_lists/Create/$from_date/$to_date");?>'" value="ΔΗΜΙΟΥΡΓΙΑ ΛΙΣΤΑΣ" />
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">ΕΞΟΔΟΣ</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					ΕΙΣΑΙ ΣΙΓΟΥΡΟΣ?
				</div>
				<div class="modal-footer">
					<hr>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
					<button type="button" onclick=goBack() class="btn btn-primary">ΝΑΙ</button>
					<hr>
				</div>
			</div>
		</div>
	</div>
	<?	} ?>
</main>





	<script type="text/javascript">
		function printDiv(divName) {
	  	var printContents = document.getElementById(divName).innerHTML;
	    var originalContents = document.body.innerHTML;
	    document.body.innerHTML = printContents;
	    window.print();
	    document.body.innerHTML = originalContents;
		}
	 </script>

	 <script>
	 	function goBack() {
	 		window.history.back();
	 	}
	 </script>

	<script type="text/javascript">
	    function del() {
				var spot = "<?php echo $each['spot_name']; ?>"
				window.location.href = "<?php echo base_url("index.php/Spot_preview/delete/");?>"+spot;
	  	}
	 </script>


	 </script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="/listes/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/customers_autocomplete.js"></script>
	<script src="../js/add_row.js"></script>

</body>
</html>
