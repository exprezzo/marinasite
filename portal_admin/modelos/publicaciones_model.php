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
		
		$autor=$_SESSION['userInfo']['name'];
		$fk_autor=$_SESSION['userInfo']['id'];
		
		$imagen=$params['url_imagen'];
		$posx=$params['posx'];
		$posy=$params['posy'];
		$fk_categoria=$params['fk_categoria'];
		
		if ( empty($id) ){
			//           CREAR
			$sql='INSERT INTO '.$this->tabla.' SET titulo=:titulo,imagen=:imagen,posx=:posx,posy=:posy, contenido=:contenido, fecha= now(), fk_categoria=1, fk_autor=:fk_autor,autor=:autor, fk_categoria=:fk_categoria';
			$sth = $dbh->prepare($sql);							
			$sth->bindValue(":titulo",$titulo,PDO::PARAM_STR);					
			$sth->bindValue(":contenido",utf8_decode($contenido),PDO::PARAM_STR);
			$sth->bindValue(":autor",$autor,PDO::PARAM_STR);					
			$sth->bindValue(":fk_autor",$fk_autor,PDO::PARAM_INT);			
			$sth->bindValue(":imagen",$imagen,PDO::PARAM_STR);					
			$sth->bindValue(":posy",$posy,PDO::PARAM_INT);			
			$sth->bindValue(":posx",$posx,PDO::PARAM_INT);			
			$sth->bindValue(":fk_categoria",$fk_categoria,PDO::PARAM_INT);			
			$msg="Publcacion Guardada";
		}else{
			//	         ACTUALIZAR
			$sql='UPDATE '.$this->tabla.' SET titulo=:titulo,imagen=:imagen, posx=:posx, posy=:posy, contenido=:contenido,fk_categoria=:fk_categoria WHERE id=:id';
			$sth = $dbh->prepare($sql);							
			$sth->bindValue(":id",$id,PDO::PARAM_INT);			
			$sth->bindValue(":fk_categoria",$fk_categoria,PDO::PARAM_INT);			
			$sth->bindValue(":titulo",$titulo,PDO::PARAM_STR);
			$sth->bindValue(":contenido",utf8_decode($contenido),PDO::PARAM_STR);
			$sth->bindValue(":imagen",$imagen,PDO::PARAM_STR);					
			$sth->bindValue(":posy",$posy,PDO::PARAM_INT);			
			$sth->bindValue(":posx",$posx,PDO::PARAM_INT);						
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