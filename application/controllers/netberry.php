<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Netberry extends CI_Controller {

	/**
	Controlador principal para prueba netberry
	 */
	public function __construct (){
		 parent::__construct();
		 $this->load->model('netberry_model');
		 $this->load->helper('form');
	}
	public function index()
	{
		$this->load->view('netberry');
	}
	
	public function gettable(){
		$tareas = $this->netberry_model->getTareas();
		@ob_start();
		include(FCPATH . 'application/views/sublayout/table.php');
		$html = ob_get_clean();
		echo $html;
		ob_end_flush();
		
	}
	
	public function insertarTarea(){
		$form = array();
		parse_str($this->input->post('form'),$form);
		$this->netberry_model->insertarTarea($form);
		$this->gettable();
	}
	
	public function borrartarea(){
		$id = $this->input->post('tareaId');
		$this->netberry_model->borrarTarea($id);
		$this->gettable();
	}
	

}
