<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Add_customer extends CI_Model{
    function __construct() {
        $this->userTbl = 'customers';
    }
    /*
     * get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        //return fetched data
        return $result;
    }
    /*
     * Insert user information
     */
    public function insert($data = array()) {
        //add created and modified data if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        // $this->db->where('first_name', 'test');

          //insert user data to users table
          $insert = $this->db->insert($this->userTbl, $data);

          //return the status
          if($insert){
              return $this->db->insert_id();;
          }else{
              return false;
          }


    }


    public function user_exists($data = array()) {
        //add created and modified data if not included
        $this->db->select('id');
        $array = array('first_name' => $data['first_name'], 'last_name' => $data['last_name']);
        $this->db->where($array);
        $query = $this->db->get('customers');
        if ($query->num_rows() > 0) {
          // return true;
          return true;
        } else {
          return false;
          //insert user data to users table
          //return the status
          // if($insert){
          //     return $this->db->insert_id();;
          // }else{
          //     return false;
          // }
        }

    }

}
