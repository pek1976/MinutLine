<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {
        var $params = array();
	var $isOk = null;
	var $msg = null;
	public function __construct(){       
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->params = $this->uri->uri_to_assoc();
        //cargamos el modelo con las funciones a utilizar
        $this->load->model('UsuarioModel');
        $this->load->helper(array('form', 'url'));
        //revisamos que este logado
        $this->UsuarioModel->ifLogeado();
        //tenemos la sesion una vez verificado
        
	}

	public function index()
	{
		
	}
        
        public function lista()
	{
            
            $query = $this->db->query("SELECT * FROM usuario");
		$data = Array();
		//proceso para enviar algun mensaje al usuario por algun tipo de proceso
		if($this->isOk and $this->msg){
			$data['isOk'] = $this->isOk;
			$data['msg'] = $this->msg;	
		}
                $data['menu'] = $this->UsuarioModel->menu($this->session->userdata('rol'));
		//$data['page'] = 'page/default';
		$data['page'] = 'usuario/lista';
		$data['data'] = $query->result();
		$this->load->view('welcome_message', $data);
	}
        
        public function crear()
	{
		$data = Array();
                $data['menu'] = $this->UsuarioModel->menu($this->session->userdata('rol'));
		$data['page'] = 'usuario/crear';
		$this->load->view('welcome_message', $data);                                
	}
        
        public function procesarCrear(){
            
                $this->load->library('form_validation');            
		$nombre = $this->input->post('nombre');
                $apellido = $this->input->post('apellido');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $passwordx = $this->input->post('passwordx');                
                $this->form_validation->set_rules('nombre', 'este es mensaje customizado', 'required');  
                
                if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('myform');
		}
		else
		{
			$this->load->view('formsuccess');
		}
                
                if($password == $passwordx){
                    $data = array(
		   'nombre'     => $nombre,
                   'apellido'   => $apellido,
                   'email'      => $email,
                   'password'   => $password
                    );                    
                    $isOk = $this->db->insert('usuario', $data) ? true : false;
                    //recargamos
                    $this->isOk = $isOk;
                    $this->msg  = 'Usuario Ingresada exitosamente';
                    }  else {
                        $this->msg  = 'La password ingresada son diferentes';
                    }                                       		
		$this->crear();
	}
        
        public function eliminar()
	{
            
		$id = $this->params['id'];		
                $this->db->query("delete from usuario where id=".$id);                
		$this->isOk = $isOk;
		$this->msg  = 'Usuario eliminado exitosamente';
		$this->lista();
	}
        

	public function empresa(){
		echo "desde empresa";
	}
}