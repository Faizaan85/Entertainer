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
	$data['jslist'] = array("list.js");

	$this->load->view('templates/header',$data);
	$this->load->view('views_merchants/list');
	$this->load->view('templates/footer');
  }

  public function search()
  {
  	$year = $this->input->get('year');
  	$name = $this->input->get('name');
  	$category = $this->input->get('category');
  	$limit = $this->input->get('count');

  	$result = $this->merchants_model->get_merchants($year);

  	if(array_key_exists('code', $result))
  	{
  		//error
  		die(json_encode(array('message' => $result['message'], 'code'=>$result['code'])));
  	}
  	else
  	{
  		echo json_encode(array('data' => $result));
  	}

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
