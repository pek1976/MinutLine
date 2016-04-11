<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** Ejemplos d querys como objetos en CI
  * @author Mauricio Barria
  * @version 1
  */
class Test extends CI_Controller {

/** Ejemplo query simple 1
  * @return No devuelve ningun valor.
  */
	public function ejemplo1()
	{
		//cargamos bd
		$this->load->database();
		/*
		* query simple
		*/
		$query = $this->db->query("SELECT * FROM COMUNAS");
		//numero de filas
		$query->num_rows();
		//iteramos resultado
		foreach ($query->result() as $row)
		{
		    echo $row->ID;
		}

	}
/** Ejemplo query simple 2
  * @return No devuelve ningun valor.
  */
	public function ejemplo2()
	{
		//cargamos bd
		$this->load->database();
		/*
		* query simple
		*/
		$query = $this->db->query("SELECT * FROM COMUNAS");
		//iteramos resultado, como array
		foreach ($query->result_array() as $row)
		{
		    echo $row->ID;
		}

	}
/** Ejemplo query simple 3
  * @return No devuelve ningun valor.
  */
	public function ejemplo3()
	{
		//cargamos bd
		$this->load->database();
		/*
		* query simple
		*/
		$query = $this->db->query("SELECT * FROM COMUNAS");
		//resultado "single" unica fila.
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); // ó $query->row_array(); 
		   //$row = $query->row(5);
		   echo $row->ID;
		}
		//liberamos memoria
		$query->free_result();

	}
/** Ejemplo query 4
  * Ejemplos con GET object
  * @return No devuelve ningun valor.
  */
	public function ejemplo4()
	{
		//cargamos bd
		$this->load->database();
		/*
		* query tipico select * from
		*/
		$query = $this->db->get('COMUNAS');
		//iteramos
		foreach ($query->result() as $row)
		{
		    echo $row->ID;
		}
		/*
		* query con limit 5,10
		*/
		$query = $this->db->get('COMUNAS', 5, 10);
		/*
		* query con WHERE
		*/
		$query = $this->db->get_where('COMUNAS', array('ID' => 2));
		//liberamos memoria
		$query->free_result();
	}
/** Ejemplo query 5
  * DML : INSERT
  * @return No devuelve ningun valor.
  */
	public function ejemplo5()
	{
		//cargamos bd
		$this->load->database();
		/*
		* Armamos array con referencia columna->valor
		*/
		$data = array(
		   'ID' => 1 ,
		   'NOMBRE' => 2 
		);
		//le pasamos al object insert, la data a ingresar
		$this->db->insert('COMUNAS', $data); 
	}
/** Ejemplo query 6
  * DML : UPDATE
  * @return No devuelve ningun valor.
  */
	public function ejemplo6()
	{
		//cargamos bd
		$this->load->database();
		/*
		* Armamos array con referencia columna->valor
		*/
		$data = array(
		   'NOMBRE' => 2 
		);
		//where simple y pasamos la data como en el INSERT
		$this->db->where('ID', 2);
		$this->db->update('COMUNAS', $data); 
	}
/** Ejemplo query 7
  * DML : DELETE
  * @return No devuelve ningun valor.
  */
	public function ejemplo7()
	{
		//cargamos bd
		$this->load->database();
		/*
		* Armamos array con referencia columna->valor para el id
		*/
		$this->db->delete('COMUNAS', array('ID' => 3)); 
	}
	
}
?>