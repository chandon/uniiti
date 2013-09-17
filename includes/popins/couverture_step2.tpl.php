<!DOCTYPE html>

<?php
	include_once '../../config/configuration.inc.php';
	include'../head.php';
	

	$MessageAction = "Enregistrer";
	$MessageInfo = "Validez vos images en les repositionnant afin que le rendu soit le plus optimal sur le site.";
	$Step = "{step: 1}";

	function CompresserImage ($image, $ImageRecalibree, $WidthCouv) {
		$couv = $ImageRecalibree;
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$scale = $imagewidth / $WidthCouv;
		$newImage = imagecreatetruecolor($WidthCouv, $imageheight / $scale);
		$imageType = image_type_to_mime_type($imageType);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
		}
		imagecopyresampled($newImage, $source, 0, 0, 0, 0, $WidthCouv, $imageheight / $scale, $imagewidth, $imageheight);
		imagejpeg($newImage, $couv, 70);		
	}
	
	function CreerImageCouverture ($image, $ImageRecalibree, $y, $WidthCouv, $HeightCouv) {

		$couv = $ImageRecalibree;
		list($imagewidth, $imageheight, $imageType) = getimagesize($image);
		$scale = $imagewidth / $WidthCouv;
		$newImage = imagecreatetruecolor($WidthCouv, $HeightCouv);
		$imageType = image_type_to_mime_type($imageType);
		switch($imageType) {
			case "image/gif":
				$source=imagecreatefromgif($image); 
				break;
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
				$source=imagecreatefromjpeg($image); 
				break;
			case "image/png":
			case "image/x-png":
				$source=imagecreatefrompng($image); 
				break;
		}
		imagecopyresampled($newImage, $source, 0, 0, 0, $y * $scale, $WidthCouv, $HeightCouv, $imagewidth, $HeightCouv * $scale);
		imagepng($newImage, $couv);
//			echo "Image sauvegardée dans " . $ImageRecalibree;			
	}
		
		$CheminImageRecalibree = $_SERVER["DOCUMENT_ROOT"] . "/projects/uniiti/img/tmp/";
		$NbImages = 1;
		if (!empty($_POST['image1'])) {
			if (preg_match("/http/i", $_POST['image1'])) {
				$image[1] = $_POST['image1'];
			} else {
				CompresserImage ($_POST['image1'], $CheminImageRecalibree . "couv1.jpg", 1750);
				$image[1] = SITE_URL . "/img/tmp/couv1.jpg";
			}
			$y[1] = $_POST['y1'];
//			$image1 = $CheminImageRecalibree . "couv1.png";
//			CreerImageCouverture($_POST['image1'], $image1, $_POST['y1']);

		}
		else {$image[1] = SITE_URL . "/img/pictos_popins/couv_popin2.jpg";$y[1] = 0;}
		if (!empty($_POST['image2'])) {
			if (preg_match("/http/i", $_POST['image2'])) {
				$image[2] = $_POST['image2'];
			} else {
				CompresserImage ($_POST['image2'], $CheminImageRecalibree . "couv2.jpg", 1750);
				$image[2] = SITE_URL . "/img/tmp/couv2.jpg";
			}
			$NbImages = 2;
			$y[2] = $_POST['y2'];
		}
		else {$image[2] = "";$y[2] = 0;}
		if (!empty($_POST['image3'])) {
			if (preg_match("/http/i", $_POST['image3'])) {
				$image[3] = $_POST['image3'];
			} else {
				CompresserImage ($_POST['image3'], $CheminImageRecalibree . "couv3.jpg", 1750);
				$image[3] = SITE_URL . "/img/tmp/couv3.jpg";
			}
			$NbImages = 3;
			$y[3] = $_POST['y3'];
		}
		else {$image[3] = "";$y[3] = 0;}
		if (!empty($_POST['image4'])) {
			if (preg_match("/http/i", $_POST['image4'])) {
				$image[4] = $_POST['image4'];
			} else {
				CompresserImage ($_POST['image4'], $CheminImageRecalibree . "couv4.jpg", 1750);
				$image[4] = SITE_URL . "/img/tmp/couv4.jpg";
			}
			$NbImages = 4;
			$y[4] = $_POST['y4'];
			}
		else {$image[4] = "";$y[4] = 0;}
		if (!empty($_POST['image5'])) {
			if (preg_match("/http/i", $_POST['image5'])) {
				$image[5] = $_POST['image5'];
			} else {
			CompresserImage ($_POST['image5'], $CheminImageRecalibree . "couv5.jpg", 1750);
			$image[5] = SITE_URL . "/img/tmp/couv5.jpg";
			}
			$NbImages = 5;
			$y[5] = $_POST['y5'];
		}
		else {$image[5] = "";$y[5] = 0;}

	
	?>

<body>


<div class="couverture_wrapper">
	<div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
	<div class="couverture_head">
		<div class="couverture_img_container">
			<img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_icon.png" title="" alt="" height="37" width="37" />
		</div><span class="maintitle">Images de couverture</span>
	</div>  

	<div class="couverture_step1_body">
		<div class="couverture_img_items_wrapper">
				<ul id="sortable">
					<?php for ($i = 1 ; $i <= $NbImages ; $i++) { ?>
					<li id="couverture_img_item<?php echo $i; ?>" class="couverture_img_item">
						<div class="couverture_img_item_nbr_img_txt"><span><?php echo $i; ?></span></div>
						<img src="<?php echo $image[$i] ?>" title="" alt=""/>
						<div class="couverture_img_item_container_draggable_icon"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/icon_draggable.png" title="" alt=""/></div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>				
	
		<div class="couverture_step1_footer">
			<div class="couverture_step1_footer_vertical_sep"></div>
			<div class="couverture_step1_infos"><div class="couverture_step_1_infos_img_container"><img src="<?php echo SITE_URL; ?>/img/pictos_popins/couverture_infos_icon.png" title="" alt="" height="23" width="23" /></div><span id="MessageInfo"><?php echo $MessageInfo ?></span></div>

			<div class="couverture_arianne">
				<div class="couverture_arianne_txt">
				<span class="arianne_txt_1">Vos </span>
				<span class="arianne_txt_2">images</span>
				</div>
				<div class="couverture_arianne_nbr">
					<ul class="couverture_arianne_nbr_liste">
						<li><a id="image1" href="#" alt="">1</a></li>
						<li><a id="image2" href="#" alt="">2</a></li>
						<li><a id="image3" href="#" alt="">3</a></li>
						<li><a id="image4" href="#" alt="">4</a></li>
						<li><a id="image5" href="#" alt="">5</a></li>                    
					</ul>
					<form>
						<input id="ImageTemp1" type="hidden" name="ImageTemp1" value="<?php echo $image[1]; ?>"/>
						<input id="ImageTemp2" type="hidden" name="ImageTemp2" value="<?php echo $image[2]; ?>"/>
						<input id="ImageTemp3" type="hidden" name="ImageTemp3" value="<?php echo $image[3]; ?>"/>
						<input id="ImageTemp4" type="hidden" name="ImageTemp4" value="<?php echo $image[4]; ?>"/>
						<input id="ImageTemp5" type="hidden" name="ImageTemp5" value="<?php echo $image[5]; ?>"/>
						<input type="hidden" name="y1" value="<?php echo $y[1]; ?>" id="y1" />
						<input type="hidden" name="y2" value="<?php echo $y[2]; ?>" id="y2" />
						<input type="hidden" name="y3" value="<?php echo $y[3]; ?>" id="y3" />
						<input type="hidden" name="y4" value="<?php echo $y[4]; ?>" id="y4" />
						<input type="hidden" name="y5" value="<?php echo $y[5]; ?>" id="y5" />
					</form>
				</div>
			</div>
		</div>
		<div class="couverture_champs_action"><a href="#" title="" onclick="EtapeSuivante();"><span><?php echo $MessageAction ?></span></a></div>
</div>
<script>    
			function InitSortable() {
				$( "#sortable" ).sortable();
				$( "#sortable" ).disableSelection();
			};

			InitSortable();
			function InitImages() {
				for (i = 1 ; i <=5 ; i++) {
					var NumImage = i;
					if ($('#ImageTemp' + NumImage).val() != "") {
						$("#image" + NumImage).addClass("is_valid");
						$("#image" + NumImage).click(function(e){
							e.preventDefault();
							e.stopPropagation();
							NumImageSel = $(this).attr("id").replace(/image/gi, "");
							EtapePrecedente();
						});
					}
				}
			}
			InitImages();
			
			function EtapePrecedente() {
			var data = {
							step : 1,
							id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
							id_enseigne :'<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
							chemin : '',
							image1 : $('#ImageTemp1').val(),
							image2 : $('#ImageTemp2').val(),
							image3 : $('#ImageTemp3').val(),
							image4 : $('#ImageTemp4').val(),
							image5 : $('#ImageTemp5').val(),
							y1 : $('#y1').val(),
							y2 : $('#y2').val(),
							y3 : $('#y3').val(),
							y4 : $('#y4').val(),
							y5 : $('#y5').val()
						};
				ActualisePopin(data, '/includes/popins/couverture_step1.tpl.php', 'default_dialog_large');
			};
</script>

</body>
</html>