
<script src="/web/<?php echo $_PETICION->modulo; ?>/js/catalogos/<?php echo $_PETICION->controlador; ?>/edicion.js"></script>

<script>			
	$( function(){		
		var config={
			tab:{
				id:'<?php echo $_REQUEST['tabId']; ?>'
			},
			controlador:{
				nombre:'<?php echo $_PETICION->controlador; ?>'
			},
			catalogo:{
				nombre:'Usuario'
			}
			
		};				
		 var editor=new Edicionusuarios();
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
			<label style="">nick:</label>
			<input type="text" name="nick" class="txt_nick" value="<?php echo $this->datos['nick']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">pass:</label>
			<input type="text" name="pass" class="txt_pass" value="<?php echo $this->datos['pass']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">email:</label>
			<input type="text" name="email" class="txt_email" value="<?php echo $this->datos['email']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">rol:</label>
			<input type="text" name="rol" class="txt_rol" value="<?php echo $this->datos['rol']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">fbid:</label>
			<input type="text" name="fbid" class="txt_fbid" value="<?php echo $this->datos['fbid']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">name:</label>
			<input type="text" name="name" class="txt_name" value="<?php echo $this->datos['name']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">picture:</label>
			<input type="text" name="picture" class="txt_picture" value="<?php echo $this->datos['picture']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">originalName:</label>
			<input type="text" name="originalName" class="txt_originalName" value="<?php echo $this->datos['originalName']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">bio:</label>
			<input type="text" name="bio" class="txt_bio" value="<?php echo $this->datos['bio']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">allowFavorites:</label>
			<input type="text" name="allowFavorites" class="txt_allowFavorites" value="<?php echo $this->datos['allowFavorites']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">allowShared:</label>
			<input type="text" name="allowShared" class="txt_allowShared" value="<?php echo $this->datos['allowShared']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">allowLiked:</label>
			<input type="text" name="allowLiked" class="txt_allowLiked" value="<?php echo $this->datos['allowLiked']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">keepLoged:</label>
			<input type="text" name="keepLoged" class="txt_keepLoged" value="<?php echo $this->datos['keepLoged']; ?>" style="width:500px;" />
		</div><div class="inputBox" style="margin-bottom:8px;display:block;margin-left:10px;width:100%;" autoFocus >
			<label style="">request:</label>
			<input type="text" name="request" class="txt_request" value="<?php echo $this->datos['request']; ?>" style="width:500px;" />
		</div>
		</form>
	</div>
</div>
