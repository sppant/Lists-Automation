<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spot_preview extends CI_Controller {
	 function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Add_customer');
}

	public function specific_spot_preview($customer,$spot_name){
		$this->load->model('spots');
		$cust = urldecode($customer);
		$spot = urldecode($spot_name);

		$data['spots'] = $this->spots->get_specific_spots($cust, $spot);

		$data['customer'] = $cust;
		$data['spot'] = $spot;
		$this->load->view('specific_spot_preview', $data);
	}

	public function spot_preview($cust_id){
		$this->load->model('spots');
		$new_id = urldecode($cust_id);
		$data['spots'] = $this->spots->get_spots($new_id);
		$data['customer'] = $new_id;
		$this->load->view('spot_preview', $data);
	}

	public function delete($id){
		$new_id = urldecode($id);
		$this->load->model('spots');
		$this->spots->delete($new_id);
		$this->load->view('main');
	}

	public function delete_specific_spot($customer,$spot){
		$customer_name = urldecode($customer);
		$spot_name = urldecode($spot);
		$this->load->model('spots');
		$this->spots->delete_specific_spot($customer_name,$spot_name);
		$data['message']= "ΤΟ ΣΠΟΤ " .$spot_name. " ΔΙΑΓΡΑΦΗΚΕ ΜΕ ΕΠΙΤΥΧΙΑ";
		$this->load->view('main',$data);
	}

	public function delete_spot_on_preview($id,$customer){
		$new_id = urldecode($id);
		$this->load->model('spots');
		$this->spots->delete_spot_on_preview($new_id);
		redirect(base_url() . 'index.php/spot_preview/spot_preview/'.$customer);
	}

	public function delete_specific_spot_on_preview($id,$customer,$spot_name){
		$new_id = urldecode($id);
		$spot = urldecode($spot_name);

		$this->load->model('spots');
		$this->spots->delete_spot_on_preview($new_id);
		redirect(base_url() . 'index.php/spot_preview/specific_spot_preview/'.$customer. "/" .$spot);
	}

}
