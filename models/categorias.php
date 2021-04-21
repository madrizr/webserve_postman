<?php

	
	class Categoria extends Conectar
	{
		
		public function obtener_categoria()
		{
			$conectar = parent::conexion();
			parent::set_names();
			$sql ="SELECT * FROM categoria WHERE est=1";
			$sql = $conectar->prepare($sql);
			$sql->execute();
			return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC es para que no dupliquye los valores.
		}

		public function get_categoria_id($cat_id)
		{
			$conectar = parent::conexion();
			parent::set_names();
			$sql ="SELECT * FROM categoria WHERE cut_id = ?";
			$sql = $conectar->prepare($sql);
			//$sql -> binValue(1, $cat_id);
			$sql->execute(array($cat_id));
			return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC es para que no dupliquye los valores.
		}

		public function insertar_categoria($cut_num, $cut_obs)
		{
			$conectar = parent::conexion();
			parent::set_names();
			$sql ="INSERT INTO categoria (cut_num, cut_obs, est) VALUES (?, ?, '1')";
			$sql = $conectar->prepare($sql);
			//$sql -> binValue(1, $cat_id);
			$sql->execute(array($cut_num, $cut_obs));
			return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC es para que no dupliquye los valores.
		}

		public function update_categoria($cut_id, $cut_num, $cut_obs)
		{
			$conectar = parent::conexion();
			parent::set_names();
			$sql ="UPDATE categoria SET 
				cut_num = ?,
			 	cut_obs = ? 
			 	WHERE 
			 	cut_id = ?";

			$sql = $conectar->prepare($sql);
			//$sql -> binValue(1, $cat_id);
			$sql->execute(array($cut_num, $cut_obs,$cut_id));
			return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC es para que no dupliquye los valores.
		}

		public function delete_categoria($cut_id)
		{
			$conectar = parent::conexion();
			parent::set_names();
			$sql ="UPDATE categoria SET 
				est = '0'
			 	WHERE 
			 	cut_id = ?";

			$sql = $conectar->prepare($sql);
			//$sql -> binValue(1, $cat_id);
			$sql->execute(array($cut_id));
			return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC es para que no dupliquye los valores.
		}
	}