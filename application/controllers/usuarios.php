<?php

defined('BASEPATH') OR exit('No direct script access allowed'); // internamente va a gestionar las solicitudes, 
// es linea de seguridad, no admite ejecucion //directa de script

class Usuarios extends CI_Controller // herencia
{
	public function index() //metodo
	{
		if($this->session->userdata('login')) // si esxiste un usuario VALIDADO
		{
			redirect('usuarios/panel','refresh'); // cargamos su panel de trabajo
		}
		else
		{
			$data['msg']=$this->uri->segment(3); // 			
			$this->load->view('login',$data); //cabezera
		}		
	}

/*	public function indexlte() //metodo
	{
		if($this->session->userdata('login')) // si esxiste un usuario VALIDADO
		{
			redirect('usuarios/panel','refresh'); // cargamos su panel de trabajo

		}
		else
		{
			redirect('usuarios/index','refresh');
		}		

		$lista=$this->estudiante_model->listaestudiantes();
		$data['estudiantes']=$lista;

		$fechaprueba=formatearFecha('2023-06-02 16:00:08');
		$data['fechatest']=$fechaprueba; //se crea otro campo fechatest su valor va a ser $fechaprueba

		$this->load->view('inclte/cabecera'); //cabezera
		$this->load->view('inclte/menusuperior'); //menu
		$this->load->view('inclte/menulateral');
		$this->load->view('est_listalte',$data);
		$this->load->view('inclte/pie'); // pie 
	}
*/
	public function validarusuario()
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);

		$consulta=$this->usuario_model->validar($login,$password);

		if($consulta->num_rows()>0)
		{
			foreach($consulta->result() as $row)
			{
				//creando mi variable de sesion
				$this->session->set_userdata('idusuario',$row->idUsuario); //
				$this->session->set_userdata('login',$row->login); //
				$this->session->set_userdata('tipo',$row->tipo); //	

			 	redirect('usuarios/panel','refresh'); // redirigimos a su panel de trabajo	
			}		
		}
		else
		{
			redirect('usuarios/index/1','refresh');
		}
	}
	//legan todos los usuarios autenticados
	public function panel()
	{
		if($this->session->userdata('login')) // si esxiste una session abierta
		{
			$tipo=$this->session->userdata('tipo');
			if($tipo=='admin')
			{
				redirect('estudiante/indexlte','refresh'); 
			}
			else
			{
				redirect('estudiante/invitadolte','refresh');
			}
		}
		else
		{
			redirect('usuarios/index/2','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy(); //vamos a eliminar las variables de sesion y despues
		redirect('usuarios/index/3','refresh'); // va a redireccionar al login
	}







/*
	public function agregar()
	{
		//mostrar un formulario (que va a estar en una vista) para agregar nuevo est

		$this->load->view('inclte/cabecera'); //cabezera
		$this->load->view('inclte/menusuperior'); //menu
		$this->load->view('inclte/menulateral');
		$this->load->view('est_formulario');
		$this->load->view('inclte/pie'); // pie 
	}

	public function agregarbd()
	{
		//atributo BD          formulario         
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];

		$this->estudiante_model->agregarestudiante($data);

		//redireccionamos, dirigirnos al controlador estudiante y el metoddo index
		redirect('estudiante/indexlte','refresh');
	}
	
	public function eliminarbd()
	{
		                          //FORM
		$idestudiante=$_POST['idestudiante'];
		$this->estudiante_model->eliminarestudiante($idestudiante);
		redirect('estudiante/index','refresh');		
	}

	public function modificar()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['infoestudiante']=$this->estudiante_model->recuperarestudiante($idestudiante);
		$this->load->view('inc/cabecera'); //cabezera
		$this->load->view('inc/menu'); //menu
		$this->load->view('est_modificar',$data);
		$this->load->view('inc/pie'); // pie 
	}

	public function modificarbd()
	{
		$idestudiante=$_POST['idestudiante'];

		$data['nombre']=$_POST['nombre'];//construyendo mi array data
		$data['primerApellido']=$_POST['apellido1'];
		$data['segundoApellido']=$_POST['apellido2'];

		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/index','refresh');
	}

	public function deshabilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='0';
		
		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/index','refresh');//
	}

	public function habilitarbd()
	{
		$idestudiante=$_POST['idestudiante'];
		$data['habilitado']='1';
		
		$this->estudiante_model->modificarestudiante($idestudiante,$data);
		redirect('estudiante/deshabilitados','refresh');
	}

	public function deshabilitados() //metodo
	{
		$lista=$this->estudiante_model->listaestudiantesdes();
		$data['estudiantes']=$lista;

		$this->load->view('inc/cabecera'); //cabezera
		$this->load->view('inc/menu'); //menu
		$this->load->view('est_listades',$data); 
		$this->load->view('inc/pie'); // pie 
	}

	public function indexlte() //metodo
	{
		$lista=$this->estudiante_model->listaestudiantes();
		$data['estudiantes']=$lista;

		$fechaprueba=formatearFecha('2023-06-02 16:00:08');
		$data['fechatest']=$fechaprueba; //se crea otro campo fechatest su valor va a ser $fechaprueba

		$this->load->view('inclte/cabecera'); //cabezera
		$this->load->view('inclte/menusuperior'); //menu
		$this->load->view('inclte/menulateral');
		$this->load->view('est_listalte',$data);
		$this->load->view('inclte/pie'); // pie 
	}
	*/

}