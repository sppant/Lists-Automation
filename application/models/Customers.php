<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customers extends CI_Model{
    function __construct() {
        // $this->userTbl = 'customers';
    }
    /*
     * get rows from the users table
     */
     function get_customers_name() {
       $this->db->select("first_name,last_name");
       $this->db->from('customers');
       $query = $this->db->get();
       return $query->result_array();
     }

      function get_shows_name() {
        $query = $this->db->query('SELECT show_value FROM shows');
        return $query->result();
      }

      function get_spot_type() {
        $query = $this->db->query('SELECT spot_type_value FROM spot_type');
        return $query->result();
      }

      function get_spot_way() {
        $query = $this->db->query('SELECT spot_way_value FROM spot_way');
        return $query->result();
      }

      function get_timeslots() {
        $query = $this->db->query('SELECT timeslot_value FROM timeslots ORDER BY timeslot_value ASC ');
        return $query->result();
      }
      function delete_customers($first,$last) {
        return $this->db->query("DELETE from customers WHERE first_name = '$first' && last_name='$last'");
      }

      function get_all_customers() {
        $this->db->select("forol_epwn,title,doh,website,first_name,last_name,title,occupation,cel,tel,email,afm,fax,address,city,zip,comments,id");
        $this->db->from('customers');
        $query = $this->db->get();
        return $query->result_array();
      }


      function find_customer($full_name) {
        $this->db->select("first_name,last_name");
        $this->db->from('customers');
        $this->db->where("CONCAT(first_name, ' ', last_name)='$full_name'");
        $query = $this->db->get();
        return $query->result_array();
      }

      function find_customer_title($full_name) {
        $this->db->select("title");
        $this->db->from('customers');
        $this->db->where("title='$full_name'");
        $query = $this->db->get();
        return $query->result_array();
      }

      function update_customer_by_id($id) {
        $forol_epwn =$_POST['forol_epwn'];
        $title =$_POST['title'];
        $doh =$_POST['doh'];
        $afm =$_POST['afm'];
        $occupation =$_POST['occupation'];
        $website=$_POST['website'];
        $first_name =$_POST['first_name'];
  			$last_name =$_POST['last_name'];
        $title =$_POST['title'];
        $occupation =$_POST['occupation'];
  			$cel =$_POST['cel'];
  			$tel =$_POST['tel'];
  			$email=$_POST['email'];
  			$fax =$_POST['fax'];
  			$address =$_POST['address'];
  			$city=$_POST['city'];
  			$zip =$_POST['zip'];
  			$comments=$_POST['comments'];
        $afm =$_POST['afm'];

        return $this->db->query("UPDATE customers SET website='$website', occupation='$occupation' ,afm='$afm', doh='$doh', forol_epwn='$forol_epwn', title='$title', first_name = '$first_name', last_name = '$last_name', title = '$title', occupation = '$occupation' ,  cel = '$cel', tel = '$tel', email = '$email', fax = '$fax',address = '$address', city = '$city', zip = '$zip', comments = '$comments', afm = '$afm'  WHERE id = '$id'");
      }

}
