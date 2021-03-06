<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>
<div class="reservation_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="reservation_head">
        <div class="reservation_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Réservation</span>
    </div>
    <div class="reservation_body">

        <div class="reservation_option1">
            <div class="reservation_option1_img_container reservation_recap_option1_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_popins/reservation_icon_valide.png" title="" alt="" height="13" width="19" /></div>
            <span class="reservation_option_txt">Récapitulatif</span><span class="parrainage_option_txt2"></span>
        </div>
        <div class="reservation_recap_body">
            <div class="reservation_recap_body_txt">
                <span class="reservation_recap_body_txt_bold">Une table est disponible !</span>
                <span class="reservation_recap_body_txt_normal">pour le</span>
                <span class="reservation_recap_body_txt_bleu"><?php if (!empty($_POST['date'])) {echo $_POST['date'];} ?></span>
                <span class="reservation_recap_body_txt_normal">à</span>
                <span class="reservation_recap_body_txt_bleu"><?php if (!empty($_POST['heure'])) {echo $_POST['heure'];} ?></span>
                <span class="reservation_recap_body_txt_normal">,</span>
                <span class="reservation_recap_body_txt_bleu"><?php echo $_POST['nombre']; ?> personne<?php if ($_POST['nombre'] > 1) {echo "s";}?></span>
            </div>
        </div>
        <div class="reservation_option2">
            <div class="reservation_option2_img_container"> <img src="<?php echo SITE_URL; ?>/img/pictos_commerces/abonnes.png" title="" alt="" height="18" width="19" /></div>
            <span class="reservation_option_txt">Informations</span><span class="reservation_option_txt2"></span>
        </div>
        <div class="reservation_option2_body_centered">
            <span>Pour terminer votre réservation, veuillez remplir le formulaire ci-dessous :</span>
        </div>
		<form id="FormReservation" onsubmit="return EtapeSuivante();" action="<?php echo SITE_URL; ?>/includes/envoyer_mail.php" method="post"  autocomplete="on">
			<div class="reservation_recap_formulaire">
				<input id="Nom" required="required" type="text" class="reservation_recap_formulaire_nom" placeholder="Nom *"/>
				<input id="Prenom" type="text" class="reservation_recap_formulaire_prenom" placeholder="Prénom"/>
				<div class="resa_recap_vertical_sep"></div>
				<input id="email" required="required" type="text" class="reservation_recap_formulaire_email" placeholder="Email *"/>
				<input id="Telephone" type="text" class="reservation_recap_formulaire_tel" placeholder="N° de téléphone"/>
				<textarea class="reservation_recap_formulaire_message" placeholder="Demande à l'attention du restaurant : Votre demande sera transmise au restaurant mais nous ne pouvons vous garantir qu’il pourra satisfaire toute les demandes."></textarea>
				<div class="reservation_recap_cgu_wrap">
					
					<div class="resa_recap_cgu_1">
					<input type="checkbox" id="resa_recap_infos"/><span><label for="resa_recap_infos">Je souhaite recevoir des informations de la part de ce restaurant</label></span>
					</div>
					<div class="resa_recap_cgu_2">
					<input type="checkbox" id="resa_recap_cgu"/><label for="resa_recap_cgu"><span>Je reconnais avoir pris connaissance et accepter les </span><a href="#" class="reservation_recap_body_txt_bleu">conditions générales d'utilisation de Uniiti.com</a></label>
					</div>
				</div>
			</div>
			<button type="submit" class="reservation_step4_footer"><a href="#" title="" onclick="EtapeSuivante();">Terminer la réservation</a></button>
 		</form>           
    </div>
</div>
<script>

function EnvoiMailContributeur(nom_enseigne, date, heure, nombre) {
    var datareservation = {
                destinataire : $('#email').val(),
                tel_destinataire : $('#Telephone').val(),
				sujet : 'Réservation pour '+nombre+' personnes, le '+date+' à '+heure,
				message : 'Une réservation pour '+nombre+' personnes, le '+date+' à '+heure+' a été transmise à l\'enseigne '+nom_enseigne+'. Une confirmation va vous etre envoyée très prochainement.'
                };
		console.log(datareservation);
		
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/envoyer_mail.php',
			data : datareservation,
			success: function(result){
				alert(result.result);
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);return false;}
		});
	return true;
}

function EtapeSuivante() {

	var nombre = '<?php if (!empty($_POST['nombre'])) {echo $_POST['nombre'];} ?>';
	var heure = '<?php if (!empty($_POST['heure'])) {echo $_POST['heure'];} ?>';
	var date = '<?php if (!empty($_POST['date'])) {echo $_POST['date'];} ?>';
	var nom_enseigne = '<?php if (!empty($_POST['nom_enseigne'])) {echo $_POST['nom_enseigne'];} ?>';
	var prevenir_reservation = '<?php if (!empty($_POST['prevenir_reservation'])) {echo $_POST['prevenir_reservation'];} ?>';

	var dataresenseigne = {
				step : 4,
				date : date,
				heure : heure,
				nombre : nombre,
				id_contributeur : '<?php if (!empty($_POST['id_contributeur'])) {echo $_POST['id_contributeur'];} ?>',
				id_enseigne :'<?php if (!empty($_POST['id_enseigne'])) {echo $_POST['id_enseigne'];} ?>',
				nom_enseigne :'<?php if (!empty($_POST['nom_enseigne'])) {echo $_POST['nom_enseigne'];} ?>',
				email_reservation :'<?php if (!empty($_POST['email_reservation'])) {echo $_POST['email_reservation'];} ?>',
				telephone_reservation :'<?php if (!empty($_POST['telephone_reservation'])) {echo $_POST['telephone_reservation'];} ?>',
				destinataire : '<?php if (!empty($_POST['email_reservation'])) {echo $_POST['email_reservation'];} ?>',
				sujet : 'Réservation pour '+nombre+' personnes, le '+date+' à '+heure,
				message : 'Une réservation pour '+nombre+' personnes, le '+date+' à '+heure+' demandeur : '+$('#Nom').val()+', email : '+$('#email').val()+', tel : '+$('#Telephone').val(),
				telephone_destinataire : $('#Telephone').val(),
				email_destinataire : $('#email').val(),
				nom_destinataire : $('#Nom').val(),
				prenom_destinataire : $('#Prenom').val(),
				prevenir_reservation: prevenir_reservation
				};
	console.log(dataresenseigne);
	//onfirmation mail + sms
	if (prevenir_reservation /*== 1*/) {
		$.ajax({
			async : false,
			type :"POST",
			url : siteurl+'/includes/envoyer_mail.php',
			data : dataresenseigne,
			success: function(result){
				alert(result.result);
				if (EnvoiMailContributeur(nom_enseigne, date, heure, nombre)) {
					ActualisePopin(dataresenseigne, '/includes/popins/reservation_valide.tpl.php', 'default_dialog');
				}
			},
			error: function(xhr) {console.log(xhr);alert('Erreur '+xhr.responseText);}
		});		
	} else if (prevenir_reservation == 2) {
	
	
	}
	return false;
};
</script>
