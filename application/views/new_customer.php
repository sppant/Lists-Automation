<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("style/style.css"); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<title>Ena Channel Προσθήκη Πελάτη</title>
</head>
<body>
	<main role="main" class="container">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
			<h1>ΠΡΟΣΘΗΚΗ ΝΕΟΥ ΠΕΛΑΤΗ</h1>
		</div>
		<div class="col-md-6">

			<div class="logo" style="position:relative; margin-left:60%;">
				<img src="/listes/img/ENALOGO.png" class="" height="90px" alt="Ena channel">
			</div>
		</div>
		</div>

			<form action="add_customers" method="post">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">ΦΟΡΟΛΟΓΙΚΗ ΕΠΩΝΥΜΙΑ</label>
						<input type="text" class="form-control" id="forol_epwn" placeholder="ΦΟΡΟΛΟΓΙΚΗ ΕΠΩΝΥΜΙΑ" required="" name="forol_epwn" value="<?php echo !empty($user['forol_epwn'])?$user['forol_epwn']:''; ?>">
						<?php echo form_error('name','<span class="help-block">','</span>'); ?>
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">ΔΙΑΚΡΙΤΙΚΟΣ ΤΙΤΛΟΣ</label>
						<input type="text" class="form-control" id="title" placeholder="ΔΙΑΚΡΙΤΙΚΟΣ ΤΙΤΛΟΣ" required="" name="title" value="<?php echo !empty($user['title'])?$user['title']:''; ?>">
					</div>
				</div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ΟΝΟΜΑ</label>
      <input  type="text" class="form-control" id="input_first_name" placeholder="ΟΝΟΜΑ" name="first_name" value="<?php echo !empty($user['first_name'])?$user['first_name']:''; ?>">
			<?php echo form_error('name','<span class="help-block">','</span>'); ?>
		</div>
		<div class="form-group col-md-6">
			<label for="inputEmail4">ΕΠΙΘΕΤΟ</label>
			<input type="text" class="form-control" id="input_first_name" placeholder="ΕΠΙΘΕΤΟ" name="last_name" value="<?php echo !empty($user['last_name'])?$user['last_name']:''; ?>">
			<?php echo form_error('name','<span class="help-block">','</span>'); ?>
		</div>
		<div class="form-group col-md-6">
			<label for="inputPassword4">ΣΤΑΘΕΡΟ</label>
			<input type="text" class="form-control" id="input_tel" placeholder="ΣΤΑΘΕΡΟ" name="tel" value="<?php echo !empty($user['tel'])?$user['tel']:''; ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="inputEmail4">ΚΙΝΗΤΟ</label>
			<input type="text" class="form-control" id="input_cel" placeholder="ΚΙΝΗΤΟ" name="cel" value="<?php echo !empty($user['cel'])?$user['cel']:''; ?>">
		</div>
  </div>
	<div class="form-row">

		<div class="form-group col-md-6">
			<label for="inputPassword4">ΕΠΑΓΓΕΛΜΑ</label>
			<input type="text" class="form-control" id="input_last_name" placeholder="ΕΠΑΓΓΕΛΜΑ" name="occupation" value="<?php echo !empty($user['occupation'])?$user['occupation']:''; ?>">
		</div>

		<div class="form-group col-md-6">
			<label for="inputAddress">ΑΦΜ</label>
			<input type="text" class="form-control" id="afm" placeholder="ΑΦΜ" name="afm" value="<?php echo !empty($user['afm'])?$user['afm']:''; ?>">
		</div>

	</div>
	<div class="form-row">



		<div class="form-group col-md-6">
			<label for="inputPassword4">FAX</label>
			<input type="text" class="form-control" id="input_fax" placeholder="FAX" name="fax" value="<?php echo !empty($user['fax'])?$user['fax']:''; ?>">
		</div>

		<div class="form-group col-md-6">
			<label for="inputEmail4">EMAIL</label>
			<input type="text" class="form-control" id="input_email" placeholder="EMAIL" name="email" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
		</div>

  </div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="inputAddress">ΔΙΕΥΘΥΝΣΗ</label>
			<input type="text" class="form-control" id="input_address" placeholder="ΔΙΕΥΘΥΝΣΗ" name="address" value="<?php echo !empty($user['address'])?$user['address']:''; ?>">
		</div>
		<div class="form-group col-md-6">
			<label for="inputAddress">Δ.Ο.Υ.</label>
			<input type="text" class="form-control" id="input_doh" placeholder="Δ.Ο.Υ." name="doh" value="<?php echo !empty($user['doh'])?$user['doh']:''; ?>">
		</div>
	</div>

<div class="form-row">
	<div class="form-group col-md-6">
		<label for="inputAddress">ΙΣΤΟΣΕΛΙΔΑ</label>
		<input type="text" class="form-control" id="input_address" placeholder="ΙΣΤΟΣΕΛΙΔΑ" name="website" value="<?php echo !empty($user['website'])?$user['website']:''; ?>">
	</div>
</div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">ΠΟΛΗ</label>
      <input type="text" class="form-control" id="input_city" placeholder="ΠΟΛΗ" name="city" value="<?php echo !empty($user['city'])?$user['city']:''; ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ</label>
      <input type="text" class="form-control" id="input_zip" placeholder="ΤΑΧΥΔΡΟΜΙΚΟΣ ΚΩΔΙΚΑΣ" name="zip" value="<?php echo !empty($user['zip'])?$user['zip']:''; ?>">
    </div>
  </div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="exampleFormControlTextarea1">ΣΧΟΛΙΑ</label>
			<textarea class="form-control" id="input_comments" rows="3" placeholder="ΣΧΟΛΙΑ" name="comments" value="<?php echo !empty($user['comments'])?$user['comments']:''; ?>"></textarea>
		</div>
	</div>
	<hr>
	<div class="form-row">
    <div class="form-group col-md-6">
			<button type="button" class="btn btn-secondary" onclick="window.location='<?php echo base_url("index.php/main");?>'" >ΠΙΣΩ</button>
    </div>
    <div class="form-group col-md-4">
			<input type="submit" name="create_customers" class="btn btn-primary" value="ΑΠΟΘΗΚΕΥΣΗ ΠΕΛΑΤΗ"/>
    </div>
  </div>
	<hr>
</form>
	</div>

	</main>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="bootstrap/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
