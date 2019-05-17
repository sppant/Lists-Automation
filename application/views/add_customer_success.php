<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<title>Ena Channel Προσθήκη Πελάτη</title>
</head>
<body>

	<main role="main" class="container">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<h1>Ο ΠΕΛΑΤΗΣ ΑΠΟΘΗΚΕΥΤΗΚΕ</h1>
				</div>
				<div class="col-md-5">

					<div class="logo" style="position:relative; margin-left:50%;">
						<img src="/listes/img/ENALOGO.png" class="" height="90px" alt="Ena channel">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="cust_info">
					<form name="update_cust" id="update_cust" method="post" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data" action="">
						<table class="table">
							<tbody>
								<tr>
									<th>ΦΟΡΟΛΟΓΙΚΗ ΕΠΩΝΥΜΙΑ</th>
									<td style="border: 1px solid #ced4da;" id="forol_epwn" value=<?php echo $customer['forol_epwn']?> contenteditable='true'><?php echo $customer['forol_epwn']?>
									</td>
								</tr>
								<tr>
									<th>ΔΙΑΚΡΙΤΙΚΟΣ ΤΙΤΛΟΣ</th>
									<td style="border: 1px solid #ced4da;" id="title" contenteditable='true'><?php echo $customer['title']?>
									</tr>
								<tr>
									<th>ΟΝΟΜΑ</th>
									<td style="border: 1px solid #ced4da;" id="first_name" value=<?php echo $customer['first_name']?> contenteditable='true'><?php echo $customer['first_name']?>
									</td>
								</tr>
								<tr>
									<th>ΕΠΙΘΕΤΟ</th>
									<td style="border: 1px solid #ced4da;" id="last_name" value=<?php echo $customer['last_name']?> contenteditable='true'><?php echo $customer['last_name']?>
									</td>
								</tr>
								<tr>
									<th>ΣΤΑΘΕΡΟ</th>
									<td style="border: 1px solid #ced4da;" id="tel" contenteditable='true'><?php echo $customer['tel']?>
									</tr>

										<tr>
											<th>ΚΙΝΗΤΟ</th>
											<td style="border: 1px solid #ced4da;" id="cel" contenteditable='true'><?php echo $customer['cel']?>
											</tr>
											<tr>
												<th>ΕΠΑΓΓΕΛΜΑ</th>
												<td style="border: 1px solid #ced4da;" id="occupation" contenteditable='true'><?php echo $customer['occupation']?>
												</tr>
												<tr>
													<th>FAX</th>
													<td style="border:1px solid #ced4da;" id="fax" contenteditable='true'><?php echo $customer['fax']?>
													</tr>
													<tr>
														<th>ΔΙΕΥΘΥΝΣΗ</th>
														<td style="border: 1px solid #ced4da;" id="address" contenteditable='true'><?php echo $customer['address']?>
														</tr>
														<tr>
															<th>Δ.Ο.Υ.</th>
															<td style="border: 1px solid #ced4da;" id="doh" contenteditable='true'><?php echo $customer['doh']?>
															</tr>
														<tr>
															<th>EMAIL</th>
															<td style="border: 1px solid #ced4da;" id="email" contenteditable='true'><?php echo $customer['email']?>
															</tr>

															<tr>
																<th>ΑΦΜ</th>
																<td style="border: 1px solid #ced4da;" id="afm" contenteditable='true'><?php echo $customer['afm']?>
																</tr>

																<tr>
																	<th>ΙΣΤΟΣΕΛΙΔΑ</th>
																	<td style="border: 1px solid #ced4da;" id="web" contenteditable='true'><?php echo $customer['website']?>
																	</tr>
																	<tr>
																		<th>ΠΟΛΗ</th>
																		<td style="border: 1px solid #ced4da;" id="city" contenteditable='true'><?php echo $customer['city']?>
																		</tr>
																		<tr>
																			<th>ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ</th>
																			<td style="border: 1px solid #ced4da;" id="zip" contenteditable='true'><?php echo $customer['zip']?>
																			</tr>
																			<tr>
																				<th>ΣΧΟΛΙΑ</th>
																				<td style="border: 1px solid #ced4da;" id="comments" contenteditable='true'><?php echo $customer['comments']?>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</form>
																<div class="row">
																	<div class="col-md-5" >
																		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
																			ΔΙΑΓΡΑΦΗ	 </button>
																			<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url("index.php/main");?>'";>
																				ΕΞΟΔΟΣ	 </button>
																			</div>
																			<div class="col-md-6" >
																				<input type="button" class="btn btn-info" onclick="add_spot_button()" value="ΠΡΟΣΘΗΚΗ ΣΠΟΤ" />
																				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
																					ΑΠΟΘΗΚΕΥΣΗ ΚΑΙ ΕΞΟΔΟΣ	 </button>
																				</div>
																			</div>
																		</div>
																	</div>
																</main>
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
																				<button type="button" id="submit" class="btn btn-primary">ΝΑΙ</button>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title" id="exampleModalLabel">ΔΙΑΓΡΑΦΗ</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body"> ΕΙΣΑΙ ΣΙΓΟΥΡΟΣ ΟΤΙ ΘΕΣ ΝΑ ΔΙΑΓΡΑΨΕΙΣ ΤΗΝ ΚΑΤΑΧΩΡΗΣΗ? </div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">ΑΚΥΡΟ</button>
																				<button type="button" onclick="del();" class="btn btn-primary">ΝΑΙ</button>
																			</div>
																		</div>
																	</div>
																</div>

																<!-- Get values from contentedible td and send them to update the customer table -->
																<script type="text/javascript">
																$(document).ready(function(){
																	$('#submit').click(function(){
																		var first = "<?php echo $customer['first_name']  ?>";
																		var last = "<?php echo $customer['last_name']  ?>";
																		var fname = document.querySelector('#first_name'),
																		first_name = fname.textContent.trim();
																		var lname = document.querySelector('#last_name'),
																		last_name = lname.textContent.trim();
																		var tit = document.querySelector('#title'),
																		title = tit.textContent.trim();
																		var ocup = document.querySelector('#occupation'),
																		occupation = ocup.textContent.trim();
																		var cellphone = document.querySelector('#cel'),
																		cel = cellphone.textContent.trim();
																		var telephone = document.querySelector('#tel'),
																		tel = telephone.textContent.trim();
																		var em = document.querySelector('#email'),
																		email = em.textContent.trim();
																		var am = document.querySelector('#afm'),
																		afm = am.textContent.trim();
																		var fx = document.querySelector('#fax'),
																		fax = fx.textContent.trim();
																		var adr = document.querySelector('#address'),
																		address = adr.textContent.trim();
																		var cit = document.querySelector('#city'),
																		city = cit.textContent.trim();
																		var zip_code = document.querySelector('#zip'),
																		zip = zip_code.textContent.trim();
																		var forol = document.querySelector('#forol_epwn'),
																		forol_epwn = forol.textContent.trim();
																		var dou = document.querySelector('#doh'),
																		doh = dou.textContent.trim();
																		var web = document.querySelector('#web'),
																		website = web.textContent.trim();
																		var com = document.querySelector('#comments'),
																		comments = com.textContent.trim();
																		var sdata = {
																			first_name: first_name,
																			last_name: last_name,
																			cel:cel,
																			tel:tel,
																			email:email,
																			title:title,
																			doh:doh,
																			forol_epwn:forol_epwn,
																			occupation:occupation,
																			website:website,
																			fax:fax,
																			afm:afm,
																			address:address,
																			city:city,
																			zip:zip,
																			comments:comments
																		};
																		var postURL = "<?php echo base_url(); ?>index.php/New_customer/update_customer/"+first+"/"+last;
																		$.ajax({
																			url: postURL,
																			method:"POST",
																			data:sdata,
																			type: 'json',
																			success:function(sdata)
																			{
																				window.location.href = "<?php echo base_url("index.php/main");?>";
																			}
																		});
																	});
																});
																</script>

																<script type="text/javascript">
																function del() {
																	var first = "<?php echo $customer['first_name']; ?>";
																	var last = "<?php echo $customer['last_name']; ?>";
																	window.location.href = "<?php echo base_url("index.php/New_customer/delete_customer/");?>"+first+"/"+last;
																}
																</script>

																<script type="text/javascript">
																function add_spot_button() {
																	var first = "<?php echo $customer['first_name']; ?>";
																	var last = "<?php echo $customer['last_name']; ?>";
																	window.location.href = "<?php echo base_url("index.php/New_spot/");?>";
																}
																</script>

																<script type="text/javascript" src="../typeahead.js"></script>
																<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script>
																<script src="/listes/bootstrap/js/bootstrap.min.js"></script>
																<script src="../js/customers_autocomplete.js"></script>
																<script src="../js/add_row.js"></script>

															</body>
															</html>
