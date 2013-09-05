<!--[if lt IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<?php
	if(!isset($_SESSION['SESS_MEMBER_ID'])) {$Connecte = false;}
	else {$Connecte = true;}
	if ($Connecte) {

		$sql_header_contrib = "SELECT photo_contributeur, prenom_contributeur, nom_contributeur
							   FROM contributeurs
							   WHERE id_contributeur = :id_contributeur
							  ";

		$req_header_contrib = $bdd->prepare($sql_header_contrib);

		$id_contributeur = $_SESSION['SESS_MEMBER_ID'];
		$req_header_contrib->bindParam(':id_contributeur', $id_contributeur, PDO::PARAM_INT);

		$req_header_contrib->execute();
		$result_header_contrib = $req_header_contrib->fetch(PDO::FETCH_ASSOC);
		
		$photo_contributeur  = $result_header_contrib['photo_contributeur'];
		$prenom_contributeur = $result_header_contrib['prenom_contributeur'];
		$nom_contributeur = $result_header_contrib['nom_contributeur'];
		
		$req_header_contrib->closeCursor();    // Ferme la connexion du serveur
	}
?>


<!-- DEBUT DU HEADER -->
<div class="overlay"></div>
<div class="header">
    <div class="big_wrapper">
    <header>
        
        <div class="header_leftnav">

            <div class="header_button_menu"><button type="button"></button></div>
            <div class="header_searchbar1"><input type="text" value="Quoi" placeholder="Quoi"/></div>
            <div class="header_searchbar2"><input type="text" value="Où" placeholder="Où"/></div>
            <div class="header_button_plus" id="recherche_avancee_button"><button type="button">+</button></div>
            <div class="header_button_search"><button type="button"></button></div>

        </div>

        <div class="header_logo">
            <a href="<?php echo SITE_URL; ?>" title="UNIITI"></a>
        </div>

        <div class="header_rightnav">

            <div class="header_yourcity">
                <div class="header_button_ville"><button type="button"></button></div>
                <aside>Votre ville</aside>
                <div class="header_choixvilles"><a id="header_choixvilles" href="#">Paris 15<sup>ème</sup></a></div>
                <div class="header_flechebas"><a id="header_choixvilles2" href="#"></a></div>
            </div>

            <div class="header_user">
                <div class="header_img_container"><img src="<?php echo SITE_URL; ?>/img/userpic.png" title="" alt="" height="30" width="30"/></div>
                <div class="header_usermenu">
					<a id="header_usermenu" href="#">
						<?php if ($Connecte) {echo $prenom_contributeur . " " . $nom_contributeur;} else {echo "Vous n'êtes pas connecté";}?>
					</a>
				</div>
                <div id="header_flechebas_usermenu" class="header_flechebas"><a id="header_usermenu2" href="#"></a></div>
            </div>
            <div id="header_menu" class="header_user_menulist">
				<?php if ($Connecte) { ?>
                <ul>
                    <li><a href="<?php echo SITE_URL . "/pages/utilisateur_interface.php?id_contributeur=" . $_SESSION['SESS_MEMBER_ID'];?>" title="">Mon profil perso</a></li>
                    <li><a href="#" title="">Mon restaurant</a></li>
                    <li><a href="#" title="">Suggérer un commerce</a></li>
                    <li><a href="#" title="">Suggérer un objet</a></li>
                    <li><a href="<?php echo SITE_URL . "/acces/logout.php" ?>" title="">Déconnexion</a></li>
                </ul>
				<?php }
				else { ?>
                <ul>
                    <li><a href="#" onclick="OuvrePopin({}, '/includes/popins/ident.tpl.php', 'default_dialog');">S'inscrire / Se connecter</a></li>
                </ul>				
				<?php } ?>
            </div>

        </div>
        <div class="recherche_avancee_wrapper big_wrapper"></div>
    </header>
    </div>
</div>
<!-- FIN DU HEADER -->
