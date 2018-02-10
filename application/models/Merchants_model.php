<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchants_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
	$this->load->database();
  }
  public function post_merchants(){
	  $merchants = $this->input->post('merchants');
	  $rec_nums = array();

	   foreach ($merchants as $key => $value) {
		$data = array(
			'year' => 2018,
			'name' => $merchants[$key]['title'],
			'category' => $merchants[$key]['cat'],
			'misc' => ''
		);
		$this->db->insert('merchants',$data);
		$insert_id = $this->db->insert_id();
		array_push($rec_nums,$insert_id);
		// array_push($rec_nums,$merchants[$key]['cat']);
	  }
	  return $rec_nums;
  }

}
