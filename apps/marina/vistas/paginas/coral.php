<style>
body {
/*    background: #ccc;
     image for body made with Photoshop using noise filter (gaussian monochromatic) on #ccc 
    
    font-size: 12px;
	
	*/
	font-family: Georgia, Verdana, ?Lucida Sans Unicode?, sans-serif;
    
	background-image:url('/web/apps/marina/imagenes/bg6_1.jpg') !important;
	background-repeat:no-repeat;
	background-color:#3bdffb;
}
h2 {
    font-style: italic;
    font-weight: normal;
    line-height: 1.2em;
}
.bubble {
    clear: both;
   /* margin: 0px auto; */
	margin-top:10px;
    width: 780px;
    background: #fff;
    -moz-border-radius: 10px;
    -khtml-border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    -khtml-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
    position: relative;
    z-index: 90;
    /* the stack order: displayed under ribbon rectangle (100) */
}
.rectangle {
    background: #7f9db9;
    height: 50px;
    padding-left:30px;
    padding-right:10px;
    display: inline-block;
    position: relative;
    left:-15.5px;
    top: 28px;
    float: left;
    /*-moz-box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.55);
    -khtml-box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.55);
    -webkit-box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.55);*/
    z-index: 100;
     /*the stack order: foreground */
	border:1px solid #999;
}
.rectangle h2 {
    font-size: 30px;
    color: #fff;
    margin-top: 6px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    text-align: center;
}


.triangle-l {
    border-color: transparent #7d90a3 transparent transparent;
    border-style:solid;
    border-width:15px;
    height:0px;
    width:0px;
    position: relative;
    left: -30px;
    top: 65px;
    z-index: -1;
    /* displayed under bubble */
}
.info {
    padding: 2px 25px 0px 25px;
	color: #999;
}

.info h2 {
    font-size: 20px;
}
.info p {
    padding-top: 10px;
    font-size: 14px;
    line-height: 22px;
    text-align:justify;
}
.info:first-letter {
    display:block;
    margin:12px 0 0 0px;
    float:left;
    color:#FF3366;
    font-size:3.0em;
    font-family:Georgia;
}
.datos_pub{
    float:right;
    margin-right:10px;
	color: #7f9db9;
	border-bottom:2px dotted #eee;
}

.info p a {
    color: #c4591e;
    text-decoration: none;
}
.info p a:hover {
    text-decoration: underline;
}

.contenido_center.ui-widget-content{
	background-color:transparent !important;
	border:none;
}


</style>
<div class="bubble">
    
	<div class="rectangle">
         <h2>General</h2>
    </div>    
    <div class="triangle-l"></div>
    <h2 class="datos_pub"></h2>
    <div style="clear:both;"></div>
    
    <div class="info"></div>
	<!-- 	-->	
	<div class="rectangle">
         <h2>Demos</h2>
    </div>    
    <div class="triangle-l"></div>
    <h2 class="datos_pub"></h2>
    <div style="clear:both;"></div>
    
    <div class="info"></div>
	<!-- 	-->	
	<div class="rectangle">
         <h2>Cookbook</h2>
    </div>    
    <div class="triangle-l"></div>
    <h2 class="datos_pub"></h2>
    <div style="clear:both;"></div>
    
    <div class="info"></div>
	<!-- 	-->	
    <div class="rectangle">
         <h2>API</h2>
    </div>    
    <div class="triangle-l"></div>
    <h2 class="datos_pub"></h2>
    <div style="clear:both;"></div>
    
    <div class="info"></div>
    <!-- 	-->
	
	<div class="rectangle">
         <h2>Downloads</h2>
    </div>    
    <div class="triangle-l"></div>
    <h2 class="datos_pub"></h2>
    <div style="clear:both;"></div>
    
    <div class="info"></div>
    <!-- 	-->
	<div class="rectangle">
         <h2>Developers</h2>
    </div>    
    <div class="triangle-l"></div>
    <h2 class="datos_pub"></h2>
    <div style="clear:both;"></div>
    
    <div class="info"></div>
	<!-- 	-->
</div>