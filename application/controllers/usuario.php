<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		//distintas querys
		//cargamos bd
		$this->load->database();
		//query simple
		$query = $this->db->query("SELECT * FROM xx");
		//numero de filas
		$query->num_rows();
		//iteramos resultado
		foreach ($query->result() as $row)
		{
		    echo $row->ID;
		}
	}
	public function crear(){
		$this->load->library('tools/validate');
		$this->validate->rut();
	}
	
	public function empresa(){
		echo "desde empresa";
	}
}