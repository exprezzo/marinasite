
<style type="text/css">
	.frmEdicion .inputBox{display:inline-block !important; }
	.frmEdicion .wijmo-wijgrid-innercell{
		padding-left:0 !important;
	}
	
	
	
	.pnlIzq > form{
		float:left;
		padding-top:0;
	}
	
	
	.divLabel {vertical-align:bottom;text-alignt:right; text-align:right; display:inline-block;}
.divNumerosStock ul{padding:0;margin:0;}
.divNumerosStock li{display:inline ;padding:0;margin:0;}
.stock_numbers li{display:inline;}

	
	@media screen and (max-width:1280px) { 
		
	}
	
	@media screen and (min-width:1250px) { 
		
		.stock_numbers li
		{ 
			border:1px solid;
			border-left:0;
			border-color:gray;
			padding:10px 8px 10px 8px;
		}		
		.stock_numbers li:last-child{
			border-right:0;
		}
		
		.divNumerosStock ul{margin-top:5px;}
		.divNumerosStock li{
			border:1px solid;
			border-left:0;
			border-color:gray;
			padding:10px 8px 10px 8px;
			
		}
		
		.divNumerosStock li:first-child{
			border-left:1px solid;
		}
		
	}
	@media screen and (max-width:1250px) { 
		.divNumerosStock li{display:block;padding:0;margin-right:10px;}
		.stock_numbers li{display:block;}

	}
	
</style>
<script src="/web/apps/<?php echo $_PETICION->modulo; ?>/js/catalogos/<?php echo $_PETICION->controlador; ?>/edicion.js"></script>

<script>	
	$( function(){				
		var edicion = new EdicionPublicacion();
		var tabId="#<?php echo $_REQUEST['tabId']; ?>";
		var params={
			tabId: "#<?php echo $_REQUEST['tabId']; ?>",
			objId: "<?php echo $_REQUEST['id']; ?>"
		};
		
		edicion.init(params);
		
		$(tabId+' .toolbarEdicion .boton:not(.btnPrint, .btnEmail)').mouseenter(function(){
			$(this).addClass("ui-state-hover");
		});
		
		$(tabId+' .toolbarEdicion .boton *').mouseenter(function(){						
			 $(this).parent('.boton').addClass("ui-state-hover");						
		});
		
		$(tabId+' .toolbarEdicion .boton').mouseleave(function(e){			 
				$(this).removeClass("ui-state-hover");			
		});
		
		
	});
</script>

<?php
	if (isset($this->datos)){		
		$id= empty($this->datos['id'])?0 : $this->datos['id'];
		$titulo= empty($this->datos['titulo'])? 'ESCRIBA UN TITULO' : $this->datos['titulo'];
		$contenido= empty($this->datos['contenido'])? 'contenido' : $this->datos['contenido'];
		
	}else{
		$id=0;
		$titulo=0;
		$contenido=0;
	}	
?>


<div class="paneles" style="width:90%;">
	<div class="pnlIzq">
		<div style="display:block;">
			<?php $this->mostrar('/componentes/toolbar'); ?>
		</div>
		<form class='frmEdicion' style='padding-top:10px;'>	
			<input type='hidden' name='id' class="txtId" value="<?php echo $id; ?>" />	
			
			<div style='display:inline-block;width:100%;'>
				<!--div class="inputBox" style='margin-bottoms:5px;display:inline;'>		
					<label class="lblCategoria" style="width:auto;">Categoria:</label>
					<select class="cmbCayegoria" style='width:70px;'>			
					</select>
				</div-->
					
				<div class="inputBox" style='margin-bottom:8px;display:inline;margin-left:10px;width:100%;' autoFocus >
					<label style="width:auto;">Titulo:</label>
					<input type='text' name='titulo' class="txtTitulo" id="txtTitulo" value="<?php echo $titulo; ?>" style="width:500px;" />
				</div>
				
				
				<div class="inputBox" style='margin-bottom:8px;display:inline;height:26px;margin-left:10px;'>					
					<label style="width:auto;">Contenido:</label><br />												
							
							
					
						
					<textarea type='text' name='contenido' class="txtContenido" id="txtContenido" value=""  style="width:600px;text-align:left;height:400px;"><?php echo $contenido; ?>
					</textarea>
				</div>				
			</div>			
			<br />	
		</form>		
	</div>

	<div class="pnlDer">
	</div>
</div>