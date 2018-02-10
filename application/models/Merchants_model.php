<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchants_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
	$this->load->database();
  }
  public function post_merchants()
  {
  	$merchants = $this->input->post('merchants');
  	$rec_nums = array();

  	foreach ($merchants as $key => $value)
  	{
  		$data = array
  		(
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
  //$year=2018, $name=0, $category=0, $limit=0, $offset = NULL
  public function get_merchants($param_arr, $limit=0)
  {
  	$arr_criteria = $this->condition_prep($param_arr);
	if($limit != 0)
	{
		$this->db->limit($limit);
	}
  	$query = $this->db->get_where('merchants',$arr_criteria);

	// return $arr_criteria;
  	$result = $query->result_array();

  	if(isset($result))
  	{
  		return $result;
  	}
  	else
  	{
  		return $this->db->error();
  	}
  }

  private function condition_prep($param_arr)
  {
  	//This function goes through each value in array, if value is '' or 'ALL' then it doesnt return it.
  	//return type will be an array.
  	$return_arr = array();
  	foreach ($param_arr as $key => $value)
  	{
  		if (is_null($value))
  		{
  			continue;
  		}
  		else
  		{
  		  	$return_arr[$key] = $value;
  		}
  	}
  	return $return_arr;
  }
}
