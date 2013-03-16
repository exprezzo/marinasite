<?php echo '<link href="/web/apps/'.$_PETICION->modulo.'/css/w_noticias.css" rel="stylesheet" type="text/css" />'; ?>
<style>

</style>



	<div class="col_center" style="float:left;">
		<div class="rectangle" style="">
			 <h2>Bienvenidos</h2>
		</div>    
		<div class="triangle-l"></div>		
		<div style="clear:both;"></div>
		<div>
			
			<img src='http://workshop.rs/wp-content/uploads/2010/04/coin-slider.png' style="margin-left:20px; margin-top:37px;width:735px; ">
			
		</div>		
		<div class="rectangle" style="background-color:#7da315; !important;top:0;">
			 <h2>Me gusta usar JSFIDDLE</h2>
		</div>    
		<div class="triangle-l" style="top:0;"></div>		
		<div style="clear:both;"></div>
		
		<img src='/web/apps/marina/imagenes/social.png' style="margin-left:20px; margin-top:23px;width:735px; ">
		<img style="border:1px solid #aaa;margin:31px 27px 0 10px;float:right; width:370px;height:230px;" src="https://github.com/jsfiddle/jsfiddle-chrome-app/diff_blob/9121ec0c9bcbbaa3b7c5c5c6767f9273ea8d71ea/media/screenshot-logo.png?raw=true" >
		<div class="info">
			 
			
			<p>Esta es una publicacion de prueba. Lorem ipsum dolor lorem noseque Lorem
				ipsum dolor lorem nosequeLorem ipsum dolor lorem nosequeLorem ipsum dolor
				lorem nosequeLorem ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque
				Lorem ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque.<br />
				Lorem  dolor lorem noseque Lorem ipsum dolor lorem noseque
				lorem nosequeLorem ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque lorem nosequeLorem ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque lorem nosequeLorem ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque lorem nosequeLorem ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque
				Lorem ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque. Lorem
				ipsum dolor lorem noseque Lorem ipsum dolor lorem noseque
				
				<p>


				</p>
		</div>
		
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'fastorder'; // required: replace example with your forum shortname
			//var disqus_identifier = 'scrum';
			var disqus_url='http://www.exprezzo.tk/publicaciones';
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
	</div>
	<div class="col_r" style="float:right;display:inline-block;vertical-align:top; margin-top:30px; margin-right:96px;width:300px;" >
		<ul class="w_noticia">
		<?php
			foreach($this->publicaciones as $pub){
				?>
				    
				<li>
					<div class="imagen"><img src='http://www.tonylea.com/wp-content/uploads/2011/04/jsfiddle-javascript-playground-thumb.png'; style="margin-top:-56px;width:288px;" /> </div>
					<div class="datos">
						<div class="fecha">marzo 16,2013</div>   
						<div class="autor">Cesar Octavio</div>   
					</div>
					<div class="titulo"><a href="/publicaciones"><span><?php echo $pub['titulo']; ?> </span> </a></div>				
					<div class="categoria">Programacion web</div>   					
				</li>
						
					
					

				<?
			}
		?>
		</ul>		
	</div>
</div>
