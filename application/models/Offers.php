<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Offers extends CI_Model{

    function __construct() {
    }
    /*
     * get rows from the users table
     */
     function get_offers($id) {
       $this->db->select("first_name,last_name");
       $this->db->from('customers');
       $query =$this->db->query("SELECT * from offer WHERE customer_name = '$id'");
      return $query->result_array();
     }

     function delete($id) {
       $this->db->delete('offer', array('spot_name' => $id));
     }

     function fetch_scheduled_posts($from_date,$to_date) {
       $query =$this->db->query("SELECT * from offer as myalias WHERE spot_date BETWEEN  '$from_date' AND '$to_date' ORDER BY spot_scheduled ASC");
       return $query->result_array();
     }

     function find_spot_name($offer_spot_name) {
       $this->db->select('spot_id');
       $this->db->from('offer');
       $this->db->where("spot_name = '$offer_spot_name'");
       $query = $this->db->get();
       return $query->result_array();
     }
}
