<?php
	class Carrera_model extends CI_Model
	{ 
		public function listaCarreras()
		{
			$this->db->select('*');
			$this->db->from('carreras');
			return $this->db->get();
		}

		public function inscribirEstudiante($idCarrera,$data) 
		{
			$this->db->trans_start(); //INICIAMOS LA TRANSACCION

			$this->db->insert('estudiantes',$data);  //insertamos estudiante
			$idEstudiante=$this->db->insert_id();    //recupera ultimo id insert

			$data2['idCarrera']=$idCarrera;          //creamos data2
			$data2['idEstudiante']=$idEstudiante;    //creamos data2
			$this->db->insert('inscripcion',$data2); //REGISTRAR INSCRIPCION

			$this->db->trans_complete(); //FINALIZAMOS LA TRANSACCION

			if($this->db->trans_status()===FALSE)
			{
				return false;
			}
		}
	} 
