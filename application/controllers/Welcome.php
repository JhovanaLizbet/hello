<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
																// es linea de seguridad, no admite ejecucion //directa de script

class Welcome extends CI_Controller // herencia
{
	public function index() //metodo
	{
		$this->load->view('welcome_message'); //esta importando el archivo welcome_message.php
	}
	public function holamundo() //metodo
	{
		$this->load->view('saludo'); //anda a la carpeta vista y carga saludo.php
	}
}
