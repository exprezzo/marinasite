<?php 
echo '<link href="/web/apps/'.$_PETICION->modulo.'/css/w_noticias.css" rel="stylesheet" type="text/css" />'; 
$host=isset( $APP_CONFIG['host'] )? $APP_CONFIG['host'] : '';
?>

<style>
	.info:first-letter {
		display:block;
		margin:-9px 0 0 0px;
	}
</style>



	<div class="col_r" style="float:right;display:inline-block;vertical-align:top; margin-top:30px; margin-right:96px;width:300px;" >
		<ul class="w_noticia">
		<?php
			foreach($this->publicaciones as $pub){
				$fecha=DateTime::createFromFormat (  'Y-m-d H:i:s' ,  $pub['fecha'] );
				$fecha=$fecha->format('F d, Y.');
				// echo $pub['position'];
				
				$posx= empty($pub['posx'])? 0 : $pub['posx'].'px';
				$posy= empty($pub['posy'])? 0 : $pub['posy'].'px';
				
				?>
				    
				<li>
					<div class="imagen"><img src='<?php echo $pub['imagen']; ?>'; style="margin-left:-<?php echo $posx; ?>;margin-top:-<?php echo $posy; ?>;" /> </div>
					<div class="datos">
						<div class="fecha"><?php echo $fecha; ?></div>   
						<div class="autor"><?php echo $pub['autor']; ?></div>   
					</div>
					<div class="titulo"><a href="<?php echo $host; ?>/publicaciones/ver?id=<?php echo $pub['id']; ?>"><span><?php echo htmlentities($pub['titulo'],ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?> </span> </a></div>				
					<div class="categoria"><?php echo $pub['categoria']; ?> </div>   					
				</li>
						
					
					

				<?
			}
		?>
		</ul>		
	</div>
