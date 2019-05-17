<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spot_schedule extends CI_Controller {

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

	public function fetch_scheduled_posts($from_date, $to_date){
		$this->load->model('spots');
		$data['scheduled'] = $this->spots->fetch_scheduled_posts($from_date,$to_date);
		$data['from_date'] = $from_date;
		$data['to_date'] = $to_date;
		$this->load->view('scheduled_spots', $data);
	}

}
