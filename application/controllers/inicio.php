<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->model('Usuario');
                //revisamos que este logado
		
        $this->Usuario->ifLogeado();

		$data = Array();	             
                $data['menu'] = $this->Usuario->menu($this->session->userdata('rol'));
		$data['page'] = 'page/default';
		$this->load->view('welcome_message', $data);
	}

}