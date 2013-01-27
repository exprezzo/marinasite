<?php
require_once $_PETICION->basePath.'modelos/pedido_model.php';
require_once $_PETICION->basePath.'modelos/almacen_model.php';
require_once $_PETICION->basePath.'modelos/articulo_model.php';
require_once $_PETICION->basePath.'modelos/um_model.php';
class Pedidoi extends Controlador{
	function getModel(){		
		if ( !isset($this->modObj) ){						
			$this->modObj = new PedidoModel();	
		}	
		return $this->modObj;
	}
	function verPedido(){		
		$idPedido=empty($_REQUEST['id'])? 0 : $_REQUEST['id'];		
		$pedido=$this->getPedido($idPedido);		
	}
	function getListaArticulos(){
		$datos=array();
		$datos[]=array(
			'id'=>1,
			'nombre'=>'Papas',
			'fk_articulo'=>11,
			'cantidad'=>8,
			'um'=>'Kg',
			'fk_um'=>21		
		);
		$res=array(
			'datos'=>$datos,
			'total'=>1
		);
		$respuesta=array(	
			'rows'=>$res['datos'],
			'totalRows'=> $res['total']
		);
		echo json_encode($respuesta);	
	}
	
	function getArticulos(){
		$mod=new ArticuloModel();		
		// $paging=$_GET['paging'];
		// $start=intval($paging['pageIndex'])*9;		
		$start=0;		
		$res=$mod->paginar($start,9);				
		
		$respuesta=array(	
			'rows'=>$res['datos'],
			'totalRows'=> $res['total']
		);
		echo json_encode($respuesta);	
	}
	function getUnidadesMedida(){
		$mod=new UMModel();		
		// $paging=$_GET['paging'];
		// $start=intval($paging['pageIndex'])*9;		
		$start=0;		
		$res=$mod->paginar($start,9);				
		
		$respuesta=array(	
			'rows'=>$res['datos'],
			'totalRows'=> $res['total']
		);
		echo json_encode($respuesta);	
	}
	function nuevoPedido(){
		return $this->nuevo();
	}
	function nuevo(){
		$vista=$this->getVista();
		$vista->mostrar('pedidoi/pedidoi');
	}
	function getPedido($id = null){
		if ($id==null){
			$idPedido=$_REQUEST['pedidoId'];
			$mostrar=true;
		}else{
			$idPedido=$id;
			$mostrar=false;
		}
		$mod=$this->getModel();
		
		$pedido = $mod->getPedido( $idPedido );
		
		$vista=$this->getVista();
		$vista->pedido=$pedido;
		if ($mostrar==true){			
			$vista->mostrar('pedidoi/pedidoi');
		}else{
			return $vista;
		}
	}
	
	function verPedidos(){
		$mod=$this->getModel();
		$res=$mod->paginar();
		
		$vista=$this->getVista();
		$vista->pedidos=$res['datos'];
		$vista->total=$res['total'];
		
		$vista->mostrar('pedidoi/lista_de_pedidos');
	}
	function pedidos(){
		return $this->lista_de_pedidos();
	}
	function lista_de_pedidos(){
		return $this->verPedidos();		
	}
	
	function paginar(){
		$mod=$this->getModel();
		$paging=$_GET['paging'];
		$pageSize=intval($paging['pageSize']);
		$start=intval($paging['pageIndex'])*$pageSize;
		
		$res=$mod->paginar($start,$pageSize);				
				
		$respuesta=array(	
			'rows'=>$res['datos'],			
			'totalRows'=> $res['total']			
		);
		echo json_encode($respuesta);
	}
	
	function getAlmacenes(){
	
	
		$mod=new AlmacenModel();		
		// $paging=$_GET['paging'];
		// $start=intval($paging['pageIndex'])*9;		
		$start=0;		
		$res=$mod->paginar($start,9);				
		
		$respuesta=array(	
			'rows'=>$res['datos'],
			'totalRows'=> $res['total']
		);
		echo json_encode($respuesta);		
	}
	function guardar(){
		$pedido= $_POST['pedido'];
		
		if ( empty($_POST['pedido']) ){
			$res=array(
				'success'=>false,
				'msg'=>'No se recibieron datos para almacenar'
			);
			echo json_encode($res); exit;
		}
		if ( empty($_POST['pedido']['almacen']) ){
			$res=array(
				'success'=>false,
				'msg'=>'Debe seleccionar un almac&eacute;n de origen'
			);
			echo json_encode($res); exit;
		}
		$model=$this->getModel();
		$res = $model->guardar($pedido);
		echo json_encode($res);
	}
}
?>