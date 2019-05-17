<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<title>Ena Channel Προσθήκη Προσφοράς</title>
</head>
<body>
	<main role="main" class="container">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>ΠΡΟΣΘΗΚΗ ΝΕΑΣ ΠΡΟΣΦΟΡΑΣ</h1>
				</div>
				<div class="col-md-6">
					<div class="logo" style="position:relative; margin-left:60%;">
						<img src="/listes/img/ENALOGO.png" class="" height="90px" alt="Ena channel">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="form-group">
					<form name="add_name" id="add_name" method="post" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data" action="">
						<input type="text" id="title" name="title" placeholder="ΔΙΑΚΡΙΤΙΚΟΣ ΤΙΤΛΟΣ" class="form-control name_list" required="" />
						<h2 align="center">ΠΡΟΓΡΑΜΜΑ</h2>
						<div class="table-responsive">
							<table class="table table-bordered" id="dynamic_field">
								<th>Από</th>
								<th>Έως</th>
								<th>Επανάληψη</th>
								<th>Τύπος Προβολής</th>
								<th>Τρόπος Προβολής</th>

								<th>Εκπομπή</th>
								<th>Ωρα</th>
								<th>Συντελεστής</th>
								<th>Προτεραιότητα</th>
								<tr>

									<!-- From -->
									<td>
										<input id="from_dat" type="date" name="from_dat[]"  class="form-control name_list" required="" />
									</td>
									<!-- To -->
									<td><input id="to_dat" type="date" name="to_dat[]"  class="form-control name_list" required="" /></td>
									<td><select style="width:150px"  class="form-control" id="repeat" name="repeat[]">
										<option value="Daily">ΚΑΘΗΜΕΡΙΝΑ</option>
										<option value="Monday">ΔΕΥΤΕΡΑ</option>
										<option value="Tuesday">ΤΡΙΤΗ</option>
										<option value="Wednesday">ΤΕΤΑΡΤΗ</option>
										<option value="Thursday">ΠΕΜΠΤΗ</option>
										<option value="Friday">ΠΑΡΑΣΚΕΥΗ</option>
										<option value="Saturday">ΣΑΒΒΑΤΟ</option>
										<option value="Sunday">ΚΥΡΙΑΚΗ</option>
										<option value="everyWeekDays">ΔΕΥΤΕΡΑ-ΠΑΡΑΣΚΕΥΗ</option>
										<option value="Weekend">ΣΑΒΑΤΟΚΥΡΙΑΚΟ</option>
									</select>
								</td>
									<!-- Spot Type -->
									<td>
										<select style="width:150px;" class="form-control" name="spot_type[]">
											<?php foreach($spot_type as $each){ ?>
												<option value="<?php echo $each->spot_type_value; ?>"><?php echo $each->spot_type_value; ?></option>';
											<?php } ?>
										</select>
									</td>
									<td>
										<select style="width:150px;" class="form-control" name="spot_way[]">
											<?php foreach($spot_way as $each){ ?>
												<option value="<?php echo $each->spot_way_value; ?>"><?php echo $each->spot_way_value; ?></option>';
											<?php } ?>
										</select>
									</td>
									<!-- Show -->
									<td>
										<select style="width:150px;" class="form-control" name="show[]">
											<?php foreach($show as $each){ ?>
												<option value="<?php echo $each->show_value; ?>"><?php echo $each->show_value; ?></option>';
											<?php } ?>
										</select>
									</td>
									<!-- Time -->
									<td>
										<select style="width:80px;" class="form-control" name="time[]">
											<?php foreach($timeslot as $each){ ?>
												<option value="<?php echo $each->timeslot_value; ?>"><?php echo $each->timeslot_value; ?></option>';
											<?php } ?>
										</select>
									</td>
									<!-- Category -->
									<td>
										<input style="width:150px;" id="category" type="text" name="spot_category[]" placeholder="ΚΑΤΗΓΟΡΙΑ" class="form-control name_list" required="" />
									</td>

									<!-- Priority -->
										<td>
											<select class="form-control" id="priority" name="priority[]">
											<option value="<?php echo "no" ?>">ΟΧΙ</option>
											<option value="<?php echo "yes" ?>">ΝΑΙ</option>
											<option value="<?php echo "end" ?>">ΤΕΛΕΥΤΑΙΟ</option>
										</select>
									</td>
									<!-- Add line button -->
											<td>
												<button type="button" name="add" id="add" class="btn btn-success">+</button>
											</td>
										</tr>
									</table>
									<button type="button" class="btn btn-secondary" onclick="goBack();" >ΠΙΣΩ</button>
									<input type="submit" name="submit" id="submit" class="btn btn-info" value="ΑΠΟΘΗΚΕΥΣΗ" />
									<hr>
								</div>
								<div class="form-group col-md-6">
								</div>
							</form>
						</div>
					</div>
				</div>
			</main>

			<!-- go back button -->
			<script>
			function goBack() {
				window.history.back();
			}
		</script>


		<!-- create rows dynamically -->
		<script type="text/javascript">
		$(document).ready(function(){
			var postURL = "<?php echo base_url(); ?>index.php/New_offer/addmore";
			var i=1;
			$('#add').click(function(){
				i++;
				$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="date" name="from_dat[]" placeholder="ΗΜΕΡΟΜΗΝΙΑ" class="form-control name_list" /></td><td><input type="date" name="to_dat[]" placeholder="ΗΜΕΡΟΜΗΝΙΑ" class="form-control name_list" /></td><td><select style="width:150px"  class="form-control" id="repeat" name="repeat[]"><option value="Daily">ΚΑΘΗΜΕΡΙΝΑ</option><option value="Monday">ΔΕΥΤΕΡΑ</option><option value="Tuesday">ΤΡΙΤΗ</option><option value="Wednesday">ΤΕΤΑΡΤΗ</option><option value="Thursday">ΠΕΜΠΤΗ</option><option value="Friday">ΠΑΡΑΣΚΕΥΗ</option><option value="Saturday">ΣΑΒΒΑΤΟ</option><option value="Sunday">ΚΥΡΙΑΚΗ</option>><option value="everyWeekDays">ΔΕΥΤΕΡΑ-ΠΑΡΑΣΚΕΥΗ</option>><option value="Weekend">ΣΑΒΑΤΟΚΥΡΙΑΚΟ</option</select></td><td><select class="form-control" name="spot_type[]"><?php foreach($spot_type as $each){ ?><option value=\"<?php echo $each->spot_type_value; ?>\"><?php echo $each->spot_type_value; ?></option>\'<?php }?></select></td> <td><select class="form-control" name="spot_way[]"><?php foreach($spot_way as $each){ ?><option value=\"<?php echo $each->spot_way_value; ?>\"><?php echo $each->spot_way_value; ?></option>\'<?php }?></select></td> <td><select class="form-control" name="show[]"><?php foreach($show as $each){ ?><option value=\"<?php echo $each->show_value; ?>\"><?php echo $each->show_value; ?></option>\'<?php } ?></select></td><td><select class=\"form-control\" name=\"time[]\"><?php foreach($timeslot as $each){ ?><option value=\"<?php echo $each->timeslot_value; ?>\"><?php echo $each->timeslot_value; ?></option>\';	<?php } ?>	</select></td><td><input type="text" id="category" name="spot_category[]" placeholder="ΚΑΤΗΓΟΡΙΑ" class="form-control name_list" required="" /></td> <input style="display:none;" name="duration[]" type="text" class="jq_req"/></td> <td><select class=\"form-control\" id=\"priority\" name=\"priority[]\"  >       <option value=\"no\">ΟΧΙ</option>       <option value=\"yes\">ΝΑΙ</option>  <option value=\"end\">ΤΕΛΕΥΤΑΙΟ</option>   </select></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
			});

			// delete rows
			$(document).on('click', '.btn_remove', function(){
				var button_id = $(this).attr("id");
				$('#row'+button_id+'').remove();
			});

			// on submit
			$('#submit').click(function(e){
				var sdata =$('#add_name').serialize();

				// used for authentication
				var title     = $('#title').val();
				var spot_from_dat     = $('#from_dat').val();
				var spot_to_dat     = $('#to_dat').val();
				if(title && spot_from_dat && spot_to_dat ){
				$.ajax({
					url: postURL,
					method:"POST",
					data:sdata,
					type: 'json',
					success:function(sdata)
					{
						i=1;
						var customer = document.getElementById('title').value;
						window.location.href = "<?php echo base_url("index.php/Offer_preview/offer_preview/");?>"+customer;

					}
				});
			}
			});
		});
		</script>

		<!-- autofill customer name -->
		<script>
		$(document).ready(function () {
			$('#title').typeahead({
				source: function (query, result) {
					$.ajax({
						url: "/listes/server.php",
						data: 'query=' + query,
						dataType: "json",
						type: "POST",
						success: function (data) {
							result($.map(data, function (item) {
								return item;
							}));
						}
					});
				}
			});
		});
		</script>

		<!-- check if customer name exists -->
		<script>
		$(document).ready(function () {
			var postURL = "<?php echo base_url(); ?>index.php/New_customer/find_customer_title";
			$('#title').on('change', function() {
				var title = this.value;
				console.log("Full name from view " + title);
				var sdata = {
					title: title
				};
				$.ajax({
					url: postURL,
					data: sdata,
					datatype:'json',
					type: "POST",
					success: function (datas) {
						$('#title').css('border','1px solid #ced4da');
						console.log("This is the datas " + datas);
						console.log("This is the string " + "false");
						console.log("Condition is " + (datas === "false"));
						if (datas == 'false'){
							$('#title').val('');
							$('#title').attr("placeholder", "Το όνομα που έβαλες δεν υπάρχει στη λίστα με τους πελάτες");
							$('#title').css('border','2px solid red');
							console.log(datas);
						}
					}
				});
			});
		});
		</script>
		<script type="text/javascript" src="/listes/typeahead.js"></script>
		<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="/bootstrap/js/bootstrap.min.js"></script>
		<script src="../js/customers_autocomplete.js"></script>
		<script src="../js/add_row.js"></script>
	</body>
	</html>
