<?php
	class Estudiante_model extends CI_Model
	{ 
		public function listaestudiantes() //recupera la lista de todos los estudiantes
		{
			$this->db->select('*');
			$this->db->from('estudiantes');
			$this->db->where('habilitado','1');//muestra solo est hab
			return $this->db->get();
		}

		public function listaestudiantesdes() //recupera la lista de todos los estudiantes
		{
			$this->db->select('*');
			$this->db->from('estudiantes');
			$this->db->where('habilitado','0');//muestra solo est hab
			return $this->db->get();
		}


		public function agregarestudiante($data)
		{
			$this->db->insert('estudiantes',$data);
		}

		public function eliminarestudiante($idestudiante)
		{
			                    // BD
			$this->db->where('idEstudiante',$idestudiante);
			$this->db->delete('estudiantes');
		}

		public function recuperarestudiante($idestudiante)
		{
			$this->db->select('*');
			$this->db->from('estudiantes');
			$this->db->where('idEstudiante',$idestudiante);
			return $this->db->get();

		}

		public function modificarestudiante($idestudiante,$data)
		{
			$this->db->where('idEstudiante',$idestudiante);
			$this->db->update('estudiantes',$data);
		}
	} 
		
		

