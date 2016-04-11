<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Graficos extends CI_Controller {

	var $params = array();
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->params = $this->uri->uri_to_assoc();
	}
	public function index(){
		$data = Array();
		$data['page'] = 'graficos/basico';
		$this->load->view('welcome_message', $data);
	}
	public function basico(){
		// Incluimos los archivos necesarios
		include(APPPATH."libraries/jpgraph/src/jpgraph.php");
		include(APPPATH."libraries/jpgraph/src/jpgraph_line.php");
		// Creamos el array de datos
		$ydata = array(11, 3, 8, 12, 5, 1, 9, 13, 5, 7);
		// Creamos un nuevo grafico de 350x250
		$graph = new Graph(350, 250, "auto");   
		$graph->SetScale( "textlin");
		// Creamos el grafico basado en el array
		$lineplot = new LinePlot($ydata);
		$lineplot->SetColor("blue");
		// Agregamos el grafico a la imagen
		$graph->Add($lineplot);	
		$graph->Stroke();
	}
	public function datos_reales(){
		// Incluimos los archivos necesarios
		include(APPPATH."libraries/jpgraph/src/jpgraph.php");
		include(APPPATH."libraries/jpgraph/src/jpgraph_bar.php");

		$query = $this->db->query("SELECT count(*) AS TOTAL, NOMBRE_COMUNA FROM ESTABLECIMIENTOS 
			WHERE ESTADO = 'FUNCIONANDO' AND NOMBRE_COMUNA IS NOT NULL AND ROWNUM<=50 GROUP BY NOMBRE_COMUNA");

    	foreach ($query->result() as $row)
		{
			$data1y[] = intval($row->TOTAL);
			$data2y[] = intval($row->TOTAL + 3 /*otro dato*/);
			$data1x[] = $row->NOMBRE_COMUNA;
		}
		// Create the graph. These two calls are always required
		$graph = new Graph(550,200,'auto');
		$graph->SetScale("textlin");

		$theme_class=new UniversalTheme;
		$graph->SetTheme($theme_class);

		$graph->yaxis->SetTickPositions(array(0,30,60,90,120,150), array(15,45,75,105,135));
		$graph->SetBox(false);

		$graph->ygrid->SetFill(false);
		$graph->xaxis->SetTickLabels($data1x);
		$graph->yaxis->HideLine(false);
		$graph->yaxis->HideTicks(false,false);

		// Create the bar plots
		$b1plot = new BarPlot($data1y);
		$b2plot = new BarPlot($data2y);
		// Create the grouped bar plot
		$gbplot = new GroupBarPlot(array($b1plot, $b2plot));
		// ...and add it to the graPH
		$graph->Add($gbplot);


		$b1plot->SetColor("white");
		$b1plot->SetFillColor("#cc1111");

		$b2plot->SetColor("white");
		$b2plot->SetFillColor("#11cccc");

		$graph->title->Set("Establecimientos");

		// Display the graph
		$graph->Stroke();
	}
}