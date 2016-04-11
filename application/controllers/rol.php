<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rol extends CI_Controller {
	var $params = array();
	var $isOk = null;
	var $msg = null;
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->params = $this->uri->uri_to_assoc();
        //cargamos el modelo con las funciones a utilizar
        $this->load->model('Usuario');
        $this->load->helper(array('form', 'url'));
        //revisamos que este logado
        $this->Usuario->ifLogeado();
        //tenemos la sesion una vez verificado
        	             
                
	}
	public function index()
	{
		$this->lista();
	}
	public function lista()
	{
            		                
		$query = $this->db->query("SELECT * FROM USUARIO");
		$data = Array();
		//proceso para enviar algun mensaje al usuario por algun tipo de proceso
		if($this->isOk and $this->msg){
			$data['isOk'] = $this->isOk;
			$data['msg'] = $this->msg;	
		}
                $data['menu'] = $this->Usuario->menu($this->session->userdata('rol'));
		//$data['page'] = 'page/default';
		$data['page'] = 'rol/lista';
		$data['data'] = $query->result();
		$this->load->view('welcome_message', $data);
	}
	public function editar()
	{
		$id = $this->params['id'];
		$query = $this->db->query("SELECT * FROM USUARIO where ID=".$id);
		$row = $query->row_array(); 
		$data = Array();
                $data['menu'] = $this->Usuario->menu($this->session->userdata('rol'));
		$data['page'] = 'rol/editar';
		$data['row'] =$row;
		$this->load->view('welcome_message', $data);
	}
	public function procesarEditar()
	{
		$id = intval($this->input->post('id'));
		$rol = $this->input->post('rol');                              
		$data = array(
			'rol' => $rol
		);
		$this->db->where('id', $id);
		$isOk = $this->db->update('USUARIO', $data) ? true : false;                
		//recargamos
		$this->isOk = $isOk;
		$this->msg  = 'Rol Editado exitosamente';
		$this->lista();
                
	}
	public function crear()
	{
		$data = Array();
		$data['page'] = 'rol/crear';
		$this->load->view('welcome_message', $data);                                
	}
	public function procesarCrear()
	{
		$nombre = $this->input->post('nombre');
		$data = array(
		   'NOMBRE' => $nombre
		);
		$isOk = $this->db->insert('USUARIO', $data) ? true : false;
		//recargamos
		$this->isOk = $isOk;
		$this->msg  = 'Rol Ingresado exitosamente';
		$this->lista();
	}
	public function eliminar()
	{
		$id = $this->params['id'];		
                $this->db->query("delete from usuario where id=".$id);                
		$this->isOk = $isOk;
		$this->msg  = 'Rol Eliminado exitosamente';
		$this->lista();
	}
}