
<script src="<?php echo $MOD_WEB_PATH; ?>js/catalogos/<?php echo $_PETICION->controlador; ?>/edicion.js"></script>
<script src="/web/<?php echo $_PETICION->modulo; ?>/libs/jcrop/js/jquery.Jcrop.min.js"></script>
<link rel="stylesheet" href="/web/<?php echo $_PETICION->modulo; ?>/libs/jcrop/css/jquery.Jcrop.css" type="text/css" />

<script>			
	$( function(){		
		var config={
			tab:{
				id:'<?php echo $_REQUEST['tabId']; ?>'
			},
			controlador:{
				nombre:'<?php echo $_PETICION->controlador; ?>'
			},
			modulo:{
				nombre:'<?php echo $_PETICION->modulo; ?>'
			},
			catalogo:{
				nombre:'Publicaciones'
			}
			
		};		
		
		 var editor=new Edicionpublicaciones();
		 editor.init(config);		
	});
</script>

	<div class="pnlIzq">
		<?php 	
			global $_PETICION;
			$this->mostrar('/componentes/toolbar');	
			if (!isset($this->datos)){		
				$this->datos=array();		
			}
		?>
		
		<form class="frmEdicion" style="padding-top:10px;">	
			<input type="hidden" name="id" class="txtId" value="<?php echo $this->datos['id']; ?>" />	
			<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">titulo:</label>
			<input type="text" name="titulo" class="txt_titulo" value="<?php echo $this->datos['titulo']; ?>" style="width:500px;" />
		</div>
		<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">contenido:</label>
			<textarea name="contenido" class="txt_contenido" style="width:500px;">
				<?php echo $this->datos['contenido']; ?>
			</textarea>
			
		</div>
		<div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fecha:</label>
			<input type="text" name="fecha" class="txt_fecha" value="<?php echo $this->datos['fecha']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">autor:</label>
			<input type="text" name="autor" class="txt_autor" value="<?php echo $this->datos['autor']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fk_autor:</label>
			<input type="text" name="fk_autor" class="txt_fk_autor" value="<?php echo $this->datos['fk_autor']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fk_categoria:</label>
			<input type="text" name="fk_categoria" class="txt_fk_categoria" value="<?php echo $this->datos['fk_categoria']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">enPortada:</label>
			<input type="text" name="enPortada" class="txt_enPortada" value="<?php echo $this->datos['enPortada']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">imagen:</label>
			<input type="text" name="imagen" class="txt_imagen" value="<?php echo $this->datos['imagen']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">posx:</label>
			<input type="text" name="posx" class="txt_posx" value="<?php echo $this->datos['posx']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">posy:</label>
			<input type="text" name="posy" class="txt_posy" value="<?php echo $this->datos['posy']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
