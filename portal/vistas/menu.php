<?php 
$host=isset( $APP_CONFIG['host'] )? $APP_CONFIG['host'] : '';
 ?>
<ul id="navigationMenu">
	<li><a href="<?php echo $host; ?>/home"><span>Home</span></a></li>
	<li><a href="<?php echo $host; ?>/publicaciones"><span>Publicaciones</span></a></li>
	<li><a href="<?php echo $host; ?>/contacto"><span>Contacto</span></a></li>	
</ul>