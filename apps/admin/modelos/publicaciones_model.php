<?php
class PublicacionModel extends Modelo{
	var $tabla='cms_publicaciones';	
	var $pk='id';
	function guardar( $params ){
		$dbh=$this->getConexion();
		
		$id=empty($params['id'])? 0 :$params['id'];
		$titulo=$params['titulo'];
		$contenido=$params['contenido'];
		$pk=$id;
		if ( empty($id) ){
			//           CREAR
			$sql='INSERT INTO '.$this->tabla.' SET titulo=:titulo, contenido=:contenido, fecha= now(), fk_categoria=1, fk_autor=1';
			$sth = $dbh->prepare($sql);							
			$sth->bindValue(":titulo",$titulo,PDO::PARAM_STR);					
			$sth->bindValue(":contenido",$contenido,PDO::PARAM_STR);
			
			
			
			
			$msg="Publcacion Guardada";
		}else{
			//	         ACTUALIZAR
			$sql='UPDATE '.$this->tabla.' SET titulo=:titulo, contenido=:contenido WHERE id=:id';
			$sth = $dbh->prepare($sql);							
			$sth->bindValue(":id",$id,PDO::PARAM_INT);			
			$sth->bindValue(":titulo",$titulo,PDO::PARAM_STR);
			$sth->bindValue(":contenido",$contenido,PDO::PARAM_STR);
			$msg="Publcacion Actualizada";
		}
		$success = $sth->execute();
		
		if ($success != true){
			$error=$sth->errorInfo();			
			$success=false; //plionasmo apropósito
			$msg=$error[2];						
			$datos=array();
		}else{
			// $success = rowCount();			
			
			if (empty($pk) ){
				$pk=$dbh->lastInsertId();
			}
			$datos=$this->obtener(array('id'=>$pk));
		}
		
		return array(
			'success'	=>$success,			
			'datos'=>$datos,
			'msg'		=>$msg
		);	
				
	}
}
?>