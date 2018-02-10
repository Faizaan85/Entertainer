<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchants extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
	$this->load->model(array('merchants_model'));
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
	$data = array();
	$data['title'] = "Merchants List";
	$data['jslist'] = array("merchants_list.js");

	$this->load->view('templates/header',$data);
	$this->load->view('views_merchants/list');
	$this->load->view('templates/footer');
  }

  public function search()
  {
	  $year = $this->check_null($this->input->get('year'),2018);
	  $name = $this->check_null($this->input->get('name'), 'ALL');
	  $category = $this->check_null($this->input->get('category'),'ALL');
	  $result_count = $this->check_null($this->input->get('count'),'ALL');
	   
  }

  private function check_null($var, $set)
  {
	  if(is_null($var))
	  {
		  return $set;
	  }
	  else
	  {
	  	return $var;
	  }
  }

}
