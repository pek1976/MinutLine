<?php

class UsuarioModel extends CI_Model {

    function __construct()
    {
        //Call the Model constructor
        parent::__construct();
        //carga de libs
        $this->load->database();
        $this->load->library('session');        
        $this->params = $this->uri->uri_to_assoc();
    }
    
    function ifLogeado(){
        if (!$this->session->userdata('user'))
        {   
            redirect('/login/loginNow/', 'refresh');
        }
    }
    
    function ifExists($name, $pass)
    {
        $this->load->library('session');                
        $query = $this->db->query("select * from USUARIO where NOMBRE = ? and PASSWORD = ?", array("$name", "$pass"));
        //contamos que el numero de registros sea mayor a cero, eso nos indica que existe!

            if ($query->num_rows() > 0)
            {
                foreach ($query->result() as $value)
                {
                    $rol = $value->rol[0];
                }
                 //$this->session->set_userdata('rol', $rol);
                return $rol;                                
            }else{
                return 0;
            } 
    }
	
	public function menu($rol)
	{
	if($rol == 1 ){ // Rol 
            
		$menu['usuario/home']       = "Home";
		$menu['usuario/lista']     = "Usuarios";
                $menu['rol/lista']      = "Privilegios";
		$menu['usuario/contenidos'] = "Plantilla";
		$menu['usuario/datos']      = "Minuta";
		
	}
	else if($rol == 2 ){
           
		$menu['usuario/home']       = "Home";
		$menu['usuario/lista']     = "Usuarios";
		$menu['usuario/contenidos'] = "Mantenedor Plantilla";
	}

            return $menu;
        }
}
