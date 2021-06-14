<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Netberry_model extends CI_model {
	
	public function __construct() {
        $this->load->database();
	}	
	
	public function getTareas(){
		$query = $this->db->query('SELECT * FROM tareas');
		$tareas = $query->result_object();
		foreach ($tareas as $tarea){
			$tarea->categorias = $this->getTareaCategoria($tarea->tareaId);
		}
		return $tareas;
		
	}
	
	private function getTareaCategoria($idTarea){
		$query = $this->db->query("
			SELECT c.nombreCategoria FROM `tareascategorias` tc 
			INNER JOIN categorias c ON (tc.categoriaId = c.categoriaId) 
			WHERE tc.tareaId=$idTarea");
		$categorias = $query->result_object();
		return $categorias;
	}
	
	public function insertarTarea($form){
		$tarea = array('nombreTarea' => $form['nuevaTarea']);
		$this->db->insert('tareas', $tarea);
        $id = $this->db->insert_id();
		if ($form['php']){
			$tareaCategoria = $this->createCategoriaArray($id,1);
			$this->db->insert('tareascategorias', $tareaCategoria);			
		}		
		if ($form['javascript']){
			$tareaCategoria = $this->createCategoriaArray($id,2);
			$this->db->insert('tareascategorias', $tareaCategoria);			
		}		
		if ($form['css']){
			$tareaCategoria = $this->createCategoriaArray($id,3);	
			$this->db->insert('tareascategorias', $tareaCategoria);			
		}
		
		
	}
	
	private function createCategoriaArray($tareaId,$categoriaId){
		$catArray = array(
			'tareaId' => $tareaId,
			'categoriaId' => $categoriaId);
		return $catArray;
	}
	
	public function borrarTarea($id){
		$this->db->delete('tareas', array('tareaId' => $id));
		$this->db->delete('tareascategorias', array('tareaId' => $id));
	}
}