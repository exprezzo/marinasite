	<div class="col_center" style="float:left;">
		<!-- -->
		<?php 
			$i=0;
			foreach($this->publicaciones as $idx=>$pub){				
				if ($idx==0){
					$shareUrl='http://exprezzo.tk/publicaciones/ver?id='.$pub['id'];
		?>
		<div class="social" style="margin-top:41px;margin-left:16px;float:right;">
			<span class='st_sharethis_large' 	st_url="<?php echo $shareUrl; ?>" displayText='ShareThis'></span>
			<span class='st_plusone_large' 		st_url="<?php echo $shareUrl; ?>" displayText='Google +1'></span>
			<span class='st_fblike_large' 		st_url="<?php echo $shareUrl; ?>" displayText='Facebook Like'></span>
			<span class='st_facebook_large' 	st_url="<?php echo $shareUrl; ?>" displayText='Facebook'></span>
			<span class='st_twitter_large'		st_url="<?php echo $shareUrl; ?>" displayText='Tweet'></span>
			<span class='st_linkedin_large' 	st_url="<?php echo $shareUrl; ?>" displayText='LinkedIn'></span>
			<span class='st_pinterest_large' 	st_url="<?php echo $shareUrl; ?>" displayText='Pinterest'></span>
			<span class='st_email_large' 		st_url="<?php echo $shareUrl; ?>" displayText='Email'></span>
			<span class='st_fbsend_large' 		st_url="<?php echo $shareUrl; ?>" displayText='Facebook Send'></span>
			<script type="text/javascript">var switchTo5x=true;</script>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">stLight.options({publisher: "160b52cb-facd-4e9b-b412-6cb92d9443b6", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
		</div>
		<?php } ?>
		<div style="clear:both;"></div>
		<!-- -->
		<div class="rectangle" style="">
			 <h2><?php echo htmlentities( $pub['titulo'],ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></h2>
		</div>    
		<div class="triangle-l"></div>		
		<div style="clear:both;"></div>		
		
		
		<div class="info" style="margin-top:32px;">
			 <?php echo $pub['contenido']; ?>			
		</div>
		<!-- DISQUS -->
		<?php if ($idx==0){ ?>
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'fastorder'; // required: replace example with your forum shortname
			//var disqus_identifier = 'scrum';
			var disqus_url='http://www.exprezzo.tk/publicaciones/ver/id=?<?php echo $pub['id']; ?>';
			
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
		<?php } ?>
		<?php } ?>
	</div>
	<?php $this->mostrar('/sidebar'); ?>
</div>
