<?php


class login  extends CI_Controller{
   public function __construct()
   {
       //este codigo q encontramos en varias partes, es para recargar las funciones del controller CI
       //asi funcionan todas nuetsras libs y helper. en algunas ocasiones es necesario siempre
       parent::__construct();
    
   }
    public function loginNow()
    {
        $this->load->helper(array('form', 'url'));
        $data['page'] = 'login/in';
        $menu = array();
        $data['menu'] = $menu;
        $this->load->view('welcome_message', $data);
    }
    
    
    public function procesarFormulario(){
        //cargamos el modelo
        $this->load->model('Usuario');
        //libreria especial para el consumo y grabado de sesiones
        $this->load->library('session');
        //para usar redirect entre otras cosas
        $this->load->helper('url');
        //asignamos lo que nos envian del formulario
        $name = $this->input->post('username');
        $pass = $this->input->post('password');
        
        //validamos que exista en la bd
        $rol = $this->Usuario->ifExists($name, $pass);
        if($this->Usuario->ifExists($name, $pass)){
            $this->session->set_userdata('user', $name);
            $this->session->set_userdata('rol', $rol);            
        }
        //lo enviamos al index para refrescar nuevamente, si ingreso bien, tomara los menu y todo lo del usuario
        redirect('/inicio/', 'refresh');         
    }
    
    
    public function salirUsuario(){
         //libreria especial para el consumo y grabado de sesiones
        $this->load->library('session');
        //para usar redirect entre otras cosas
        $this->load->helper('url');
        
        //destruimos toda sesion!
        $this->session->sess_destroy();
        //refrescamos
        redirect('/inicio/', 'refresh');
    }
}

?>
