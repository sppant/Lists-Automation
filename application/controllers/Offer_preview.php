<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer_preview extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Add_customer');
}

	public function offer_preview($id){
		$this->load->model('offers');
		$new_id = urldecode($id);
		$data['offers'] = $this->offers->get_offers($new_id);
		$this->load->view('offers_preview', $data);
	}

	public function delete($id){
		$new_id = urldecode($id);
		$this->load->model('offers');
		$this->offers->delete($new_id);
		$this->load->view('main');
	}



}
