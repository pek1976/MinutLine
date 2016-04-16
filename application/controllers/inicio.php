<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->model('UsuarioModel');
                //revisamos que este logado
		
        $this->UsuarioModel->ifLogeado();

		$data = Array();	             
                $data['menu'] = $this->UsuarioModel->menu($this->session->userdata('rol'));
		$data['page'] = 'page/default';
		$this->load->view('welcome_message', $data);
	}

}