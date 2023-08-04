<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
																// es linea de seguridad, no admite ejecucion //directa de script

class Base extends CI_Controller // herencia
{
	public function index() //metodo
	{

		$this->load->view('inc/cabecera'); //cabezera
		$this->load->view('inc/menu'); //menu
		$this->load->view('inicio'); //esta importando el archivo inicio.php  // contenido
		$this->load->view('inc/pie'); // pie 
	}

	public function prod() //metodo
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$data['estudiantes']=$lista;

		$this->load->view('inc/cabecera'); //cabezera
		$this->load->view('inc/menu'); //menu
		$this->load->view('productos',$data); //anda a la carpeta vista y carga productos.php
		$this->load->view('inc/pie'); // pie 
	}
	
	public function cont() //metodo
	{
		$this->load->view('inc/cabecera'); //cabezera
		$this->load->view('inc/menu'); //menu
		$this->load->view('contactos'); //anda a la carpeta vista y carga contactos.php
		$this->load->view('inc/pie'); // pie 
	}

	public function pruebabd()
	{
		$query=$this->db->get('estudiantes'); //consult seleccionar 
		$ejecutarconsulta=$query->result(); // 
		print_r($ejecutarconsulta);
	}

}
