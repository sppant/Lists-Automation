<?php defined('BASEPATH') OR exit('No direct script access allowed');
$list_confirm = $this->session->userdata('list_confirm');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

	<title>Ena Channel Λίστες Διαφημίσεων</title>

</head>
<body>
	<main role="main" class="container">


		<div class="logo" style="position:relative; top:130%;">
			<img src="/listes/img/ENALOGO.png" class="rounded mx-auto d-block" height="200px" alt="Ena channel">
		</div>

		<?php if (isset($message)){ ?>
			<div style="text-align:center" class="alert alert-success" role="alert">
  <strong><?php echo $message ?></strong>
</div>

		<?php } ?>

		<div class="container">
			<div class="center">
				<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location='<?php echo base_url("index.php/New_customer/new_customer");?>'">ΕΙΣΑΓΩΓΗ ΝΕΟΥ ΠΕΛΑΤΗ</button>
				<button type="button" class="btn btn-success btn-lg btn-block" onclick="window.location='<?php echo base_url("index.php/New_offer");?>'">ΔΗΜΙΟΥΡΓΙΑ ΠΡΟΣΦΟΡΑΣ</button>
				<button type="button" class="btn btn-info btn-lg btn-block" onclick="window.location='<?php echo base_url("index.php/New_spot");?>'">ΕΙΣΑΓΩΓΗ ΝΕΟΥ ΣΠΟΤ</button>
				<button type="button" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#sched">
					ΠΡΟΒΟΛΗ ΠΡΟΓΡΑΜΜΑΤΟΣ	 </button>
					<button type="button" class="btn btn-dark btn-lg btn-block" onclick="window.location='<?php echo base_url("index.php/New_customer/get_all_customers");?>'">ΕΠΕΞΕΡΓΑΣΙΑ ΠΕΛΑΤΩΝ</button>
					<button type="button" class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#prev_offer">ΠΡΟΒΟΛΗ ΠΡΟΣΦΟΡΩΝ</button>
					<button type="button" class="btn btn-outline-info btn-lg btn-block" data-toggle="modal" data-target="#prev_spot">ΠΡΟΒΟΛΗ ΣΠΟΤ ΠΕΛΑΤΗ</button>
				</div>
			</div>

			<div class="modal fade" id="sched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">ΕΠΙΛΟΓΗ ΗΜΕΡΟΜΗΝΙΑΣ</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container">
								<div class="row">
									<label>ΑΠΟ</label>
									<input required="" id="from_date" type="date" name="from_date" placeholder="ΑΠΟ" class="form-control name_list"  />
									<label>ΜΕΧΡΙ</label>
									<input id="to_date" type="date" name="to_date" placeholder="ΜΕΧΡΙ" class="form-control name_list" required="" />
								</div>
							</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
							<button type="button" onclick=validate_submit() class="btn btn-primary">ΣΥΝΕΧΕΙΑ</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="prev_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">ΕΠΙΛΟΓΗ ΠΡΟΪΟΝΤΟΣ</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<label>ΠΕΛΑΤΗΣ</label>
								<?php
								$conn = new mysqli('localhost', 'root', '', 'listes')
								or die ('Cannot connect to db');
								$conn->set_charset("utf8");

								$result = $conn->query("select DISTINCT customer_name from offer");
								echo "<html>";
								echo "<body>";
								echo "<select class='form-control' id='offer' name='id'>";

								while ($row = $result->fetch_assoc()) {

									unset($id, $name);
									$id = $row['id'];
									$cname = $row['customer_name'];
									echo '<option value="'.$cname.'"> '.$cname.'  </option>';
								}
								echo "</select>";
								echo "</body>";
								echo "</html>";
								?>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
							<button type="button" onclick=offer_prev(); class="btn btn-primary">ΣΥΝΕΧΕΙΑ</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="prev_spot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">ΕΠΙΛΟΓΗ ΠΕΛΑΤΗ</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>

						</div>
						<div class="modal-body">
							<div class="row">
								<div class="container">
									<label>ΠΕΛΑΤΗΣ</label>
									<?php
									$conn = new mysqli('localhost', 'root', '', 'listes')
									or die ('Cannot connect to db');
									$conn->set_charset("utf8");
									$result = $conn->query("select DISTINCT customer_name from spot");
									echo "<html>";
									echo "<body>";
									echo "<select class='form-control' id='first-choice' name='customer_name'>";
									echo '<option> ΠΕΛΑΤΗΣ </option>';
									while ($row = $result->fetch_assoc()) {
										unset($id, $name);
										$id = $row['id'];
										$name = $row['spot_name'];
										$cname = $row['customer_name'];
										echo '<option value="'.$cname.'">'.$cname.'  </option>';
									}
									echo "</select>";
									echo "</body>";
									echo "</html>";
									?>
								</div>
							</div>

							<div class="row">
								<div class="container">
									<label>ΣΠΟΤ</label>
									<select class='form-control' id='second-choice' name='spot_name'>;
										<option>ΣΠΟΤ </option>';
									</select>
								</div>
							</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
							<button type="button" onclick=specific_spot_prev(); class="btn btn-primary">ΣΥΝΕΧΕΙΑ</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="lconfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div  id="lconfirm_dialog" class="modal-dialog" role="document">
					<div id="lconfirm_content" class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">ΕΠΙΤΥΧΙΑ</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<label>Η ΛΙΣΤΑ ΔΗΜΙΟΥΡΓΗΘΗΚΕ ΜΕ ΕΠΙΤΥΧΙΑ</label>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" data-dismiss="modal" class="btn btn-primary">OK</button>
							<?php
							$this->session->unset_userdata('list_confirm');

							?>
						</div>
					</div>
				</div>
			</div>


			<script>
			function offer_prev(){
				var option = $("#offer").val();
				window.location='<?php echo base_url("index.php/offer_preview/offer_preview/");?>'+ option;
			}
			</script>

			<script>
			function spot_prev(){
				var option = $("#customer_name").val();
				window.location='<?php echo base_url("index.php/spot_preview/spot_preview/");?>'+ option;
			}
			</script>

			<script>
			function specific_spot_prev(){
				var customer = $("#first-choice").val();
				var spot_name = $("#second-choice").val();
				window.location='<?php echo base_url("index.php/spot_preview/specific_spot_preview/");?>'+ customer + '/' + spot_name;
			}
			</script>


		</main>
		<script>
		function validate_submit(){
			if (from_date.value != "" && to_date.value !=""){
				window.location='<?php echo base_url("index.php/spot_schedule/fetch_scheduled_posts/");?>'+ from_date.value + '/' + to_date.value;
			}
		}
		</script>

		<script>
		$(window).on('load',function(){
			var lconfirm = <?php  echo $list_confirm ?>;
			if (lconfirm){
				$('#lconfirm').modal('show');
			}
		});
	</script>


<script>
$("#first-choice").change(function() {
$("#second-choice").load("/listes/getter.php?choice=" + encodeURIComponent($("#first-choice").val()));
});


</script>




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script> -->
<script src="/listes/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
