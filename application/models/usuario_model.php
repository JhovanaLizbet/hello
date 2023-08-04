<?php
	class Usuario_model extends CI_Model
	{ 
		public function validar($login,$password) //recupera la lista de todos los estudiantes
		{
			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->where('login',$login);//muestra solo est hab
			$this->db->where('password',$password);
			return $this->db->get();
		}

	} 
		
		

