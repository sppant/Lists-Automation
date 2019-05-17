<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_spot extends CI_Controller {
	public function index()
	{
		$this->load->model('customers');
		$data['customers'] = $this->customers->get_customers_name();
		$data['show'] = $this->customers->get_shows_name();
		$data['spot_type'] = $this->customers->get_spot_type();

		$data['spot_way'] = $this->customers->get_spot_way();

		$data['timeslot'] = $this->customers->get_timeslots();
		$this->load->view('new_spot', $data);
	}

	public function addmore()
	{
		define (DB_USER, "root");
		define (DB_PASSWORD, "");
		define (DB_DATABASE, "listes");
		define (DB_HOST, "localhost");
		$first_in = "false";
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		$mysqli->set_charset("utf8");
		if(!empty($_POST['from_dat'])){
			$customer_name = $_POST['title'];
			$zone_array = [
    								"15-00,15-20",
										"15-40,16-00",
										"16-30",
										"17-30",
										"18-00",
										"18-20,18-40",
										"19-00",
										"19-20,19-40",
										"20-00",
										"20-20,20-40",
										"21-00",
										"22-00",
										"22-20,22-40",
										"23-00",
										"23-20,23-40",
										"07-40",
										"08-00",
										"08-20,08-40",
										"09-00",
										"09-20,09-40",
										"10-00",
										"10-30,11-00,11-20,11-40",
										"12-00",
										"13-00",
										"13-20,13-40",
										"14-00"										];

					// for each date
					foreach ($_POST['from_dat'] as $key => $fdate) {
						$first_in = "false";

							$from_date = $fdate;
							$to_date = $_POST['to_dat'][$key]."23:59:59";
							$spot_time = $_POST['time'][$key];
							$spot_show = $_POST['show'][$key];
							$repeat_every = $_POST['repeat'][$key];
							$priority = $_POST['priority'][$key];
							$spot_name = $_POST['file_name_helper'][$key];
							$spot_type = ($_POST['spot_type'][$key]);
							$spot_way = ($_POST['spot_way'][$key]);
							$sp_type = $this->get_spot_path($spot_type).$_POST['file_name_helper'][$key];
							$spot_video_name = $_POST['file_name_helper'][$key];
							$spot_duration = ($_POST['duration'][$key]);
							$spot_category = ($_POST['spot_category'][$key]);
							$price = $spot_category * $spot_duration;
							$period = new DatePeriod(
												new DateTime($from_date),
												new DateInterval('P1D'),
												new DateTime($to_date)
										);
										// foreach( $period as $date) {
										foreach( $period as $index => $date ) {

											$array[] = $date->format('Y-m-d');
											$newDate = $date->format('Y-m-d');
											$day = $date->format('l');


											// repeat specific day and not kiliomeno
											if ($spot_way != 'kil') {
												if ($repeat_every==$day) {
												 $sql = "INSERT INTO spot(customer_name, spot_time, spot_show , spot_date, repeat_every, spot_name, spot_type , spot_link, spot_duration ,priority, spot_category, spot_price, spot_video_name, spot_way) VALUES ('$customer_name', '$spot_time', '$spot_show' ,'$newDate', '$repeat_every', '$spot_name', '$spot_type', '$sp_type', '$spot_duration' ,'$priority', '$spot_category' , '$price', '$spot_video_name', '$spot_way')";
												 $mysqli->query($sql);
												}
											}

											 // repeat daily and not kiliomeno
											 if ($spot_way != 'kil') {
												 if ($repeat_every=="Daily") {
 													$sql = "INSERT INTO spot(customer_name, spot_time, spot_show , spot_date, repeat_every, spot_name , spot_type ,spot_link , spot_duration , priority, spot_category, spot_price, spot_video_name, spot_way) VALUES ('$customer_name', '$spot_time', '$spot_show' ,'$newDate', '$repeat_every', '$spot_name', '$spot_type' ,'$sp_type','$spot_duration' ,'$priority','$spot_category', '$price','$spot_video_name','$spot_way' )";
 													$mysqli->query($sql);
 												}
											 }

											//repeat only on weekdays and not kiliomeno
											if ($spot_way != 'kil') {
												if ($repeat_every=="everyWeekDays") {
													if ($day == 'Monday' || $day =='Tuesday' || $day =='Wednesday' || $day =='Thursday' || $day =='Friday' ) {
														$sql = "INSERT INTO spot(customer_name, spot_time, spot_show , spot_date, repeat_every, spot_name , spot_type ,spot_link , spot_duration , priority, spot_category, spot_price, spot_video_name, spot_way) VALUES ('$customer_name', '$spot_time', '$spot_show' ,'$newDate', '$repeat_every', '$spot_name', '$spot_type' ,'$sp_type','$spot_duration' ,'$priority','$spot_category', '$price','$spot_video_name','$spot_way' )";
														$mysqli->query($sql);
													}
												}
											}

											//repeat only on weekend and not kiliomeno
											if ($spot_way != 'kil') {
												if ($repeat_every=="Weekend") {
													if ($day == 'Saturday' || $day =='Sunday') {
														$sql = "INSERT INTO spot(customer_name, spot_time, spot_show , spot_date, repeat_every, spot_name , spot_type ,spot_link , spot_duration , priority, spot_category, spot_price, spot_video_name, spot_way) VALUES ('$customer_name', '$spot_time', '$spot_show' ,'$newDate', '$repeat_every', '$spot_name', '$spot_type' ,'$sp_type','$spot_duration' ,'$priority','$spot_category', '$price','$spot_video_name','$spot_way' )";
														$mysqli->query($sql);
													}
												}
											}

											if ($spot_way == 'kil') {

													if ($first_in=="true") {

														$index2++;
														$myArray = explode(',', $zone_array[$index2 % count($zone_array)]);
														$spot_time = $myArray[0];
														$sql = "INSERT INTO spot(customer_name, spot_time, spot_show , spot_date, repeat_every, spot_name , spot_type ,spot_link , spot_duration , priority, spot_category, spot_price, spot_video_name, spot_way) VALUES ('$customer_name', '$spot_time', '$spot_show' ,'$newDate', '$repeat_every', '$spot_name', '$spot_type' ,'$sp_type','$spot_duration' ,'$priority','$spot_category', '$price','$spot_video_name','$spot_way' )";
														$mysqli->query($sql);
													}else {
														//first entry
														$counter = 0;
														foreach ($zone_array as $time_items) {
															$myArray2 = explode(',', $time_items);
															foreach ($myArray2 as $test1) {
																if ($spot_time== $test1 && $first_in=="false") {
																	$sql = "INSERT INTO spot(customer_name, spot_time, spot_show , spot_date, repeat_every, spot_name , spot_type ,spot_link , spot_duration , priority, spot_category, spot_price, spot_video_name, spot_way) VALUES ('$customer_name', '$spot_time', '$spot_show' ,'$newDate', '$repeat_every', '$spot_name', '$spot_type' ,'$sp_type','$spot_duration' ,'$priority','$spot_category', '$price','$spot_video_name','$spot_way' )";
																	$mysqli->query($sql);
																 	$first_in = "true";
																	$index2 = $counter;
																	//get index of first time

																}
															}
															$counter++;


														}
													}
													//second entry
											 }
											// kiliomeno should be placed here

										}
									}
		}
	}

	public function get_spot_path($spot_type){
		if ($spot_type=="ID") {
			$spot_path ='/Volumes/Disk/ENA CHANNEL IDS/';
		}elseif ($spot_type=="TRAILER") {
			$spot_path ='/Volumes/Disk/ΤΡΕΙΛΕΡ/';
		}elseif ($spot_type=="ΧΟΡΗΓΟΣ") {
			$spot_path ='/Volumes/Disk/ΧΟΡΗΓΟΙ ΣΠΟΤ/';
		}
		else {
			$spot_path ='/Volumes/Disk/ΔΙΑΦΗΜΙΣΕΙΣ/';
		}
		return $spot_path;
	}


	public function find_spot_name()
	{
		$spot_name = $_POST['spot_name'];

		$this->load->model('spots');
		$data['spot_name'] = $this->spots->find_spot_name($spot_name);

		if ($data['spot_name'] == []){
			$datas= false;
		}else {
			$datas=true;
		}
			echo json_encode($datas);
	}
}
