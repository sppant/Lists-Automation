<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<title>ΕΠΕΞΕΡΓΑΣΙΑ ΠΕΛΑΤΩΝ ENA CHANNEL</title>
</head>
<body>

	<style>
		tr.active td {background: #ccffa5;}
		tr:hover {background: #e0ffc9 !important;}
	</style>

	<main role="main" class="">
		<div class="" id="print">
			<div class="row">
				<div class="col-md-6">
			<h1>ΕΠΕΞΕΡΓΑΣΙΑ ΠΕΛΑΤΩΝ</h1>
		</div>
		<div class="col-md-6">

			<div class="logo" style="position:relative; margin-left:60%;">
				<img src="/listes/img/ENALOGO.png" class="" height="90px" alt="Ena channel">
			</div>
		</div>
		</div>
			<div id ="printableArea">
				<form name="update_cust" id="update_cust" method="post" autocomplete="off" accept-charset="UTF-8" enctype="multipart/form-data" action="">
			<table class="table" id="allcastomers_table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
						<th scope="col">ΦΟΡΟΛΟΓΙΚΗ ΕΠΩΝΥΜΙΑ</th>
						<th scope="col">ΔΙΑΚΡΙΤΙΚΟΣ ΤΙΤΛΟΣ</th>

			      <th scope="col">ΟΝΟΜΑ</th>
			      <th scope="col">ΕΠΙΘΕΤΟ</th>
			      <th scope="col">ΚΙΝΗΤΟ</th>
						<th scope="col">ΣΤΑΘΕΡΟ</th>

						<th scope="col">ΕΠΑΓΓΕΛΜΑ</th>
						<th scope="col">ΑΦΜ</th>



						<th scope="col">EMAIL</th>
						<th scope="col">FAX</th>
						<th scope="col">ΔΙΕΥΘΥΝΣΗ</th>

						<th scope="col">Δ.Ο.Υ.</th>

						<th scope="col">ΙΣΤΟΣΕΛΙΔΑ</th>

						<th scope="col">ΠΟΛΗ</th>
						<th scope="col">ΤΑΧΥΔΡΟΜΙΚΟΣ</th>
						<th scope="col">ΣΧΟΛΙΑ</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
						<?
						$count = 1;
						$final_price = 0;
						foreach($customer as $each){
							  ?>
			      <th scope="row"><?php echo $count ?></th></th>
						<td class="id" id="id" name="id"style="display:none;" ><?php echo $each['id']; ?></td>
						<td class="forol_epwn" id="forol_epwn" name="forol_epwn[]" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['forol_epwn']; ?></td>
						<td class="title" id="title" name="title[]" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['title']; ?></td>
			      <td class="first_name" id="first_name" name="first_name[]" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['first_name']; ?></td>
						<td class="last_name" id="last_name" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['last_name']; ?></td>
						<td class="cel" id="cel" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['cel']; ?></td>
						<td class="tel"  id="tel" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['tel']; ?></td>
						<td class="occupation"  id="occupation" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['occupation']; ?></td>
						<td class="afm"  id="afm" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['afm']; ?></td>
						<td class="email"  id="email" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['email']; ?></td>
						<td class="fax"  id="fax" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['fax']; ?></td>
						<td class="address"  id="address" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['address']; ?></td>
						<td class="doh"  id="doh" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['doh']; ?></td>
						<td class="website"  id="website" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['website']; ?></td>
						<td class="city"  id="city" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['city']; ?></td>
						<td class="zip"  id="zip" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['zip']; ?></td>
						<td class="comments"  id="comments" style="border:1px solid #ced4da" contenteditable="true"><?php echo $each['comments']; ?></td>
						<!-- <td >	 	<button type="button" class="btn btn-primary" onclick="save('<?php echo $each['first_name'];?>','<?php echo $each['last_name'];?>');" >ΑΠΟΘΗΚΕΥΣΗ</button></td> -->
						<td >	 	<button type="button" class="btn btn-primary" onclick="save('<?php echo $each['id'];?>');" >ΑΠΟΘΗΚΕΥΣΗ</button></td>

						<td >	 	<button type="button" class="btn btn-danger" onclick="window.location='<?php echo base_url("index.php/New_customer/delete_customer_on_preview/" .$each['first_name']."/".$each['last_name'] );?>'" >X</button></td>
			    </tr>

					<?
					$count++;
				 }?>
			  </tbody>
			</table>
		</form>


<?php  ?>


</div>


<div class="row">
<div class="col-md-7" >
	<button type="button" class="btn btn-secondary" onclick="window.location='<?php echo base_url("index.php/main");?>'" >ΠΙΣΩ</button>


</div>
<div class="col-md-5" >
	 <button type="button" class="btn btn-primary" onclick="window.location='<?php echo base_url("index.php/main");?>'"> ΕΞΟΔΟΣ	</button>
</div>
</div>
	</div>

	</main>

	<script type="text/javascript">
			function save(id) {
				var inputs = $(".id");
				var cid = document.querySelectorAll(".id");
				var tit = document.querySelectorAll(".title");
				var forol = document.querySelectorAll(".forol_epwn");
				var dou = document.querySelectorAll(".doh");
				var af = document.querySelectorAll(".afm");
				var ocup = document.querySelectorAll(".occupation");
				var web = document.querySelectorAll(".website");
				var fname = document.querySelectorAll(".first_name");
				var lname = document.querySelectorAll(".last_name");
				var cel = document.querySelectorAll(".cel");
				var tel = document.querySelectorAll(".tel");
				var email = document.querySelectorAll(".email");
				var fax = document.querySelectorAll(".fax");
				var address = document.querySelectorAll(".address");
				var city = document.querySelectorAll(".city");
				var zip = document.querySelectorAll(".zip");
				var comments = document.querySelectorAll(".comments");
				for(var i = 0; i < inputs.length; i++){
					var customer_id = cid[i].innerText;
					if (customer_id == id){
						var sdata = {
										id: cid[i].innerText,
										title: tit[i].innerText,
										forol_epwn:forol[i].innerText,
										doh:dou[i].innerText,
										afm:af[i].innerText,
										occupation:ocup[i].innerText,
										website:web[i].innerText,
										first_name: fname[i].innerText,
										last_name: lname[i].innerText,
										cel: cel[i].innerText,
										tel: tel[i].innerText,
										email: email[i].innerText,
										fax: fax[i].innerText,
										address: address[i].innerText,
										city: city[i].innerText,
										zip: zip[i].innerText,
										comments: comments[i].innerText,
									};
									var postURL = "<?php echo base_url(); ?>index.php/New_customer/update_customer_by_id/"+customer_id;
									$.ajax({
											 url: postURL,
											 method:"POST",
											 data:sdata,
											 type: 'json',
											 success:function(sdata)
											 {
												 alert("Αποθηκέυτηκε");

											 }
									});
								}
							}
						}
	 </script>

	<script type="text/javascript">
	    function del() {
				var first = "<?php echo $each['first_name']; ?>"
				var last = "<?php echo $each['last_name']; ?>"
				console.log(first + last);
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
	<script src="../../js/all_castomers_table_color.js"></script>
</body>
</html>
