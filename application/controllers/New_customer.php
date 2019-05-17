<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_customer extends CI_Controller {
	 function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Add_customer');
}
	public function new_customer()
	{
		$this->load->view('new_customer');
	}

	public function add_customers(){
				$data = array();
				$userData = array();
					$userData = array(
				'forol_epwn' => strip_tags($this->input->post('forol_epwn')),
				'doh' => strip_tags($this->input->post('doh')),
				'first_name' => strip_tags($this->input->post('first_name')),
				'last_name' => strip_tags($this->input->post('last_name')),
				'title' => strip_tags($this->input->post('title')),
				'occupation' => strip_tags($this->input->post('occupation')),
				'cel' => strip_tags($this->input->post('cel')),
				'tel' => strip_tags($this->input->post('tel')),
				'email' => strip_tags($this->input->post('email')),
				'afm' => strip_tags($this->input->post('afm')),
				'fax' => strip_tags($this->input->post('fax')),
				'address' => strip_tags($this->input->post('address')),
				'website' => strip_tags($this->input->post('website')),
				'city' => strip_tags($this->input->post('city')),
				'zip' => strip_tags($this->input->post('zip')),
				'comments' => strip_tags($this->input->post('comments'))
		);

		$user_exists =  $this->Add_customer->user_exists($userData);
		if($user_exists==true){
						$data= "Ο χρήστης υπάρχει ήδη!";
					 $this->load->view('new_customer',$data);
			echo ($data);			}
		else {
					$insert = $this->Add_customer->insert($userData);
					$data['customer']=$userData;
					$this->load->view('add_customer_success',$data);
			}
}

public function delete_customer($first,$last)
{
	$first = urldecode($first);
	$last = urldecode($last);
	$this->load->model('customers');
	$this->customers->delete_customers($first,$last);
	$this->load->view('main');
}

public function delete_customer_on_preview($first,$last)
{
	$first = urldecode($first);
	$last = urldecode($last);
	$this->load->model('customers');
	$this->customers->delete_customers($first,$last);
	 $this->get_all_customers();
}

public function update_customer($first,$last){
	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "listes");
	define (DB_HOST, "localhost");

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	$mysqli->set_charset("utf8");
			$first = urldecode($first);
			$last = urldecode($last);
			$forol_epwn =$_POST['forol_epwn'];
			$doh =$_POST['doh'];
			$first_name =$_POST['first_name'];
			$last_name =$_POST['last_name'];
			$title=$_POST['title'];
			$occupation =$_POST['occupation'];
			$cel =$_POST['cel'];
			$tel =$_POST['tel'];
			$email=$_POST['email'];
			$afm=$_POST['afm'];
			$fax =$_POST['fax'];
			$address =$_POST['address'];
			$website =$_POST['website'];
			$city=$_POST['city'];
			$zip =$_POST['zip'];
			$comments=$_POST['comments'];
			$sql = "UPDATE customers SET  forol_epwn = '$forol_epwn', doh = '$doh',  first_name = '$first_name', last_name = '$last_name', cel = '$cel', tel = '$tel', email = '$email' , fax = '$fax', address = '$address', city = '$city', zip = '$zip', comments = '$comments' , website = '$website', title = '$title', occupation = '$occupation',afm='$afm' WHERE first_name = '$first'";
			$mysqli->query($sql);
}

public function update_customer_by_id($id){
	$this->load->model('customers');
	$data['customer'] = $this->customers->update_customer_by_id($id);
}

public function get_all_customers()
{
	$this->load->model('customers');
	$data['customer'] = $this->customers->get_all_customers();
	$this->load->view('all_customers',$data);
}

public function find_customer()
{
		$full_name = $_POST['full_name'];
		$this->load->model('customers');
		$data['customer'] = $this->customers->find_customer($full_name);
	if ($data['customer'] == []){
		$datas= false;
	}else {
		$datas=true;
	}
		echo json_encode($datas);
}

public function find_customer_title()
{
		$full_name = $_POST['title'];
		$this->load->model('customers');
		$data['customer'] = $this->customers->find_customer_title($full_name);
	if ($data['customer'] == []){
		$datas= false;
	}else {
		$datas=true;
	}
		echo json_encode($datas);
}

}
