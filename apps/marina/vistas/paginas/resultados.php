
<style>
	/*
	.info:first-letter {
		display:block;
		margin:-9px 0 0 0px;
	}
	.info{
		border:0px solid #eee;
		border-right-width:2px;
	} 
	*/
</style>	
	<div class="col_center" style="float:left;">		
		<div style="clear:both;"></div>
		<!-- -->
		<div class="rectangle" style="">
			 <h2>Resultados</h2>
		</div>    
		<div class="triangle-l"></div>		
		<div style="clear:both;"></div>		
		
		<div class="info" style="margin-top:32px;">
		<label></label>
			 <ul>
				<li>Res 1</li>
				<li>Res 2</li>
				<li>Res3</li>
			 </ul>
		</div>
		
	</div>
	<div class="col_r" style="float:right;display:inline-block;vertical-align:top; margin-top:30px; margin-right:96px;width:300px;" >
		<ul class="w_noticia">
		<?php
			foreach($this->publicaciones as $pub){
				$fecha=DateTime::createFromFormat (  'Y-m-d H:i:s' ,  $pub['fecha'] );
				$fecha=$fecha->format('F d, Y.');
				?>
				    
				<li>
					<div class="imagen"><img src='http://www.tonylea.com/wp-content/uploads/2011/04/jsfiddle-javascript-playground-thumb.png'; style="margin-top:-56px;width:288px;" /> </div>
					<div class="datos">
						<div class="fecha"><?php echo $fecha; ?></div>   
						<div class="autor"><?php echo $pub['autor']; ?></div>   
					</div>
					<div class="titulo"><a href="/publicaciones/ver?id=<?php echo $pub['id']; ?>"><span><?php echo $pub['titulo']; ?> </span> </a></div>				
					<div class="categoria"><?php echo $pub['categoria']; ?> </div>   					
				</li>
						
					
					

				<?
			}
		?>
		</ul>		
	</div>
</div>
