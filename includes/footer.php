<!-- CSS A REVOIR PAR EQUIPE INTEGRATION SI Bouton retour vers le haut conservé -->	
<style>

#ScrollToTop {
	display:none;
	position:fixed;
	bottom:10px;
	right:10px;
	width:55px;
	height:60px;
	background: linear-gradient(rgb(250, 250, 250), rgb(235, 235, 235)) repeat scroll 0% 0% rgb(242, 242, 242);
	box-shadow: 0px 1px 3px rgba(34, 25, 25, 0.5);
	border-radius: 3px 3px 3px 3px;
	font-family: 'Helvetica',sans-serif;
	font-weight: bold;
	text-shadow: 0px 1px rgba(255, 255, 255, 0.9);
	border: 1px solid rgba(153, 153, 153, 0.4);
	color: rgb(119, 119, 119);
}

.textContainer {
	color: rgb(119, 119, 119);
	cursor: pointer;
	font-family: 'Helvetica',sans-serif;
	font-size: 15px;
	font-weight: 700;
	line-height: 19px;
	text-align: center;
	text-shadow: rgba(255, 255, 255, 0.9) 0px 1px 0px;
	visibility: visible;
	width: 50px;
}

</style>
<button id="ScrollToTop" onclick="javascript:window.scrollTo(0,0);">
	<div class="textContainer">Retour en haut</div>
</button>


<div class="uniiti_footer big_wrapper">
	<div class="uniiti_footer_loader_barre_horizontale"></div>
	<div class="uniiti_footer_loader">
		<img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
	</div>
</div>
