<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Spots extends CI_Model{
    function __construct() {
    }
    /*
     * get rows from the users table
     */
     function get_spots($cust_id) {
       $query =$this->db->query("SELECT * from spot WHERE customer_name = '$cust_id'ORDER BY spot_date ASC ");
      return $query->result_array();
     }

     function get_specific_spots($cust,$spot) {
       $query =$this->db->query("SELECT * from spot WHERE customer_name = '$cust' AND spot_name='$spot' ORDER BY spot_date ASC, spot_time ASC ");
      return $query->result_array();
     }

     function get_time_zones() {
       $query =$this->db->query("SELECT * from time_zones");
      return $query->result_array();
     }

     function get_time_zones_id($time) {
       $query =$this->db->query("SELECT zone_id from time_zones where zone_value like $time");
      return $query->result_array();
     }

     function get_time_from_id($zone_id) {
       $query =$this->db->query("SELECT zone_value from time_zones where zone_id like $zone_id");
      return $query->result_array();
     }


     function delete($id) {
       $this->db->delete('spot', array('spot_name' => $id));
     }

     function fetch_scheduled_posts($from_date,$to_date) {
       $query =$this->db->query("SELECT * from spot as myalias WHERE spot_date BETWEEN  '$from_date' AND '$to_date' ORDER BY spot_date ASC, spot_time ASC, priority Desc");
       return $query->result_array();
     }

     function find_spot_name($spot_name) {
       $this->db->select('spot_id');
       $this->db->from('spot');
       $this->db->where("spot_name = '$spot_name'");
       $query = $this->db->get();
       return $query->result_array();
     }

     function delete_spot_on_preview($id) {
       $this->db->delete('spot', array('spot_id' => $id));

     }

     function delete_specific_spot($customer_name,$spot_name) {
       $this->db->delete('spot', array('spot_name' => $spot_name));
     }





}
