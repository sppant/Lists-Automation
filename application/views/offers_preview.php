<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Ena Channel Δημιουργία Προσφοράς</title>
</head>
<body>
	<div class="row">
			<div class="col-md-5 offset-1">
				<h1>ΠΡΟΒΟΛΗ ΠΡΟΣΦΟΡΑΣ</h1>
			</div>
			<div class="col-md-5">
				<div class="logo" style="position:relative; margin-left:60%;">
					<img src="/listes/img/ENALOGO.png" class="" height="90px" alt="Ena channel">
				</div>
			</div>
		</div>
	<main role="main" class="container">
		<div class="container" id="print">
			<div id ="printableArea">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">ΠΕΛΑΤΗΣ</th>
			      <th scope="col">ΗΜ/ΝΙΑ</th>
						<th scope="col">ΩΡΑ</th>
						<th scope="col">ΕΚΠΟΜΠΗ</th>
						<th scope="col">ΚΑΤΗΓΟΡΙΑ</th>
						<th scope="col">ΔΙΑΡΚΕΙΑ</th>
						<th scope="col">ΤΙΜΗ</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
						<? $count = 1;
						$final_price = 0;
						foreach($offers as $each){
							$final_price =$final_price +$each['spot_price']; ?>
			      	<th scope="row"><?php echo $count ?></th></th>
			      	<td><?php echo $each['customer_name']; ?></td>
			      	<td ><?php echo $each['spot_date']; ?></td>
							<td><?php echo $each['spot_time']; ?></td>
							<td><?php echo $each['spot_show']; ?></td>
							<td><?php echo $each['spot_way']; ?></td>
							<td><?php echo $each['spot_category']; ?></td>
							<td><?php echo $each['spot_duration']; ?></td>
							<td><?php echo $each['spot_price']; ?>€</td>
			    </tr>
					<? $count++;
				 }?>
			  </tbody>
			</table>
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
			<div class="col-md-9" >
	 			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"> ΔΙΑΓΡΑΦΗ </button>
			</div>
			<div class="col-md-3" >
				<input type="button" class="btn btn-info" onclick="printDiv('printableArea')" value="ΕΚΤΥΠΩΣΗ" />
	 			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> ΕΞΟΔΟΣ </button>
			</div>
		</div>
		<hr>

	</div>

<!-- Modals -->
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
ΕΙΣΑΙ ΣΙΓΟΥΡΟΣ ΟΤΙ ΘΕΣ ΝΑ ΔΙΑΓΡΑΨΕΙΣ ΤΗΝ ΚΑΤΑΧΩΡΗΣΗ?	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
	        <button type="button" onclick="del();" class="btn btn-primary">ΝΑΙ</button>
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
	<!-- / modals -->

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

	<script type="text/javascript">
	    function del() {
				var spot = "<?php echo $each['spot_name']; ?>"
				console.log(spot);
				window.location.href = "<?php echo base_url("index.php/Offer_preview/delete/");?>"+spot;
	    }
	 </script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="/listes/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/customers_autocomplete.js"></script>
	<script src="../js/add_row.js"></script>

</body>
</html>
