<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

        <?php
        include_once '../config/configuration.inc.php';

		?>
    <body>		
		<!-- Required 
		        <link rel="stylesheet" href="<?php echo SITE_URL; ?>/css/main.css">
		
		<link type="text/css" href="../Slider/css/fancymoves.css" media="screen" charset="utf-8" rel="stylesheet"  />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="../Slider/js/slider.js" charset="utf-8"></script>
		
		<script src="<?php echo SITE_URL; ?>/js/vendor/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>   -->
		<!-- Demo only  
		<script type="text/javascript" src="../Slider/demo/demo.js"></script>  -->
	
		<style>
			#filedrag:hover {box-shadow: inset 0 3px 4px #888;}
		</style>	
        <div class="biggymarginer">
        <div class="big_wrapper">
            <div class="liseret_bleu"></div>
            <div class="inscription_head"><h2><img src="<?php echo SITE_URL; ?>/img/pictos_inscription/new_user.png" height="68" width="77" title="" alt="" />Créer un compte en seulement <span>3 étapes</span></h2></div>
            <div class="inscription_head2">
                <div class="inscription_step1"><h3>Informations générales</h3></div>
                <div class="inscription_step2 inscription_current_step_texte_head"><h3>Choix de l'avatar</h3></div>
                <div class="inscription_step3"><h3>Vos centres d'intérêts</h3></div>
            </div>
            <div class="inscription_fields_left">
                <div class="inscription_upload_image_texte"><span>Glissez-déposez une image dans le cadre</span></div>
            <div class="inscription_separation_ou"><span>Ou</span></div>
            </div>
            <div class="inscription_fields_right">
                <div class="inscription_choisir_image_texte"><span>Choisissez-en une dans la Uniiti galerie</span></div>
            </div>
			<form id="upload" onsubmit="return EtapeSuivante();" action="<?php echo SITE_URL; ?>/pages/inscription3.php" method="POST" enctype="multipart/form-data">
				<div class="inscription_fields_left">
					<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="4000000" />
						<div class="inscription_upload_image_container"><span>Ou cliquez pour en choisir une sur votre ordinateur</span>
							<div class="inscription_upload_button" id="filedrag"></div>
							<input type="hidden" name="ImageTemp" value="" id="ImageTemp" />
							<input type="file" id="inscription_upload" name="inscription_upload[]" multiple="multiple" />
						</div>
						
					<?php foreach ($_POST as $Key => $Value) {?>
					<input type="hidden" id="<?php echo $Key; ?>" name="<?php echo $Key; ?>" value="<?php echo $Value; ?>" />
					<?php } ?>
					
					<div id="messages">
						<p>Status Messages</p>
					</div>				
				
				</div>
				<div class="inscription_fields_right">
					<div class="inscription_choisir_image_container">
					<!-- Slider --><div id="wrapper">
						<div id="slider-one">
							<?php for ($i = 1 ; $i < 10 ; $i++) { ?>
								<div class="draggable"><img onclick="ChangeAvatar('../Slider/images/demo-images/img<?php echo $i; ?>.jpg');" src="<?php echo SITE_URL; ?>/Slider/images/demo-images/img<?php echo $i; ?>.jpg" alt="" /></div>
							<?php } ?>
						</div></div>
					<!-- /Slider -->
					</div>
				</div>
				<div class="inscription_wrap_next_step2">
				<div class="inscription_next_step2">
					<div class="inscription_current_step"><span class="inscription_current_step_number">2</span><span class="inscription_current_step_etape_texte">étape</span></div>
					<button class="inscription_next_step_button2" id="submitbutton" type="submit" role="button" class="css3button" >Suivant</button>
				</div>
					<div class="inscription_avatar_selected"><div class="inscription_avatar_selected_texte"><span>Votre avatar</span></div><img id="Avatar" src="<?php echo SITE_URL; ?>/img/avatars/6.png" height="120" width="120" title="" alt="" /></div>
				</div>
           </form> 
        </div><!-- FIN BIG WRAPPER -->
        </div><!-- FIN BIGGY -->
		
		<script type="text/javascript">
		
			function EtapeSuivante() {
				var data = {
						'email_login' : $id("email_login").value,
						prenom : $id("prenom").value,
						nom : $id("nom").value,
						'date_naissance_jour' : $id("date_naissance_jour").value,
						'date_naissance_mois' : $id("date_naissance_mois").value,
						'date_naissance_annee' : $id("date_naissance_annee").value,
						sexe : $id("sexe").value,
						mdp : $id("mdp").value,
						ville : $id("ville").value,
						codepostal : $id("codepostal").value,
						pays : $id("pays").value,
						telephone_contributeur : $id("telephone_contributeur").value,
						ImageTemp : $id("ImageTemp").value
				};
				ActualisePopin(data, '/pages/inscription3.php', 'default_dialog_inscription');
				return false; // si false l action du form ne sera pas appelé
			};	
		
			function ChangeAvatar(src) {
				$("#Avatar").attr("src", src);
			}

			$("#filedrag").click( function(e) {
				e.stopPropagation();
				$("#inscription_upload").click();
			});
			
			// getElementById
			function $id(id) {
				return document.getElementById(id);
			}

			// output information
			function Output(msg) {
				var m = $id("messages");
				m.innerHTML = "<p>Information</p>" + msg;
			}

			// file drag hover
			function FileDragHover(e) {
				e.stopPropagation();
				e.preventDefault();
		//		e.target.className = (e.type == "dragover" ? "hover" : "");
			}

			// file selection
			function FileSelectHandler(e) {

				// cancel event and hover styling
				FileDragHover(e);

				// fetch FileList object
				var files = e.target.files || e.dataTransfer.files;

				// process all File objects
				for (var i = 0, f; f = files[i]; i++) {
					ParseFile(f);
				}

			}

			// output file information
			function ParseFile(file) {
				// display an image
				if (file.type.indexOf("image") == 0) {
					var reader = new FileReader();
					reader.onload = function(e) {
						ChangeAvatar(e.target.result);
						$('#ImageTemp').val(e.target.result);
		//				$("#image").attr("src", e.target.result);
					}
					reader.readAsDataURL(file);
				}
				Output(
					"<p>Fichier: <strong>" + file.name +
					"</strong> type: <strong>" + file.type +
					"</strong> size: <strong>" + file.size +
					"</strong> bytes</p>"
				);

			}

			// initialize
			function Init() {

				var fileselect = $id("inscription_upload"),
					filedrag = $id("filedrag"),
					submitbutton = $id("submitbutton");

				// file select
				fileselect.addEventListener("change", FileSelectHandler, false);

				// is XHR2 available?
				var xhr = new XMLHttpRequest();
				if (xhr.upload) {

					// file drop
					filedrag.addEventListener("dragover", FileDragHover, false);
					filedrag.addEventListener("dragleave", FileDragHover, false);
					filedrag.addEventListener("drop", FileSelectHandler, false);
					filedrag.style.display = "block";

					// remove submit button
//					submitbutton.style.display = "none";
					fileselect.style.display = "none";
				}

			}


		Init();

			
		</script>
		
		
    </body>
</html>