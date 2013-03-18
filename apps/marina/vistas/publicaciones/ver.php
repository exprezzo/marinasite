<?php echo '<link href="/web/apps/'.$_PETICION->modulo.'/css/w_noticias.css" rel="stylesheet" type="text/css" />'; ?>
<style>
	.info:first-letter {
		display:block;
		margin:-9px 0 0 0px;
	}
</style>



	<div class="col_center" style="float:left;">
		<!-- -->
		<div class="social" style="margin-top:41px;margin-left:16px;float:right;">
			<span class='st_sharethis_large' displayText='ShareThis'></span>
			<span class='st_plusone_large' displayText='Google +1'></span>
			<span class='st_fblike_large' displayText='Facebook Like'></span>
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_linkedin_large' displayText='LinkedIn'></span>
			<span class='st_pinterest_large' displayText='Pinterest'></span>
			<span class='st_email_large' displayText='Email'></span>
			<span class='st_fbsend_large' displayText='Facebook Send'></span>
			<script type="text/javascript">var switchTo5x=true;</script>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">stLight.options({publisher: "160b52cb-facd-4e9b-b412-6cb92d9443b6", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
		</div>
		<div style="clear:both;"></div>
		<!-- -->
		<div class="rectangle" style="">
			 <h2><?php echo $this->publicacion['titulo']; ?></h2>
		</div>    
		<div class="triangle-l"></div>		
		<div style="clear:both;"></div>		
		
		<div class="info" style="margin-top:32px;">
			 <?php echo $this->publicacion['contenido']; ?>
			
		</div>
		<!-- DISQUS -->
		
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'fastorder'; // required: replace example with your forum shortname
			//var disqus_identifier = 'scrum';
			var disqus_url='http://www.exprezzo.tk/publicaciones/ver/id=?<?php echo $this->publicacion['id']; ?>';
			
			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<div class="" style="margin:20px;">		
			<div id="disqus_thread"></div>		
			<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
		</div>
		
		<!-- ***************  -->
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
