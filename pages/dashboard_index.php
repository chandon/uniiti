<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php 
	include_once '../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../config/configuration.inc.php';
	include'../includes/head.php';
	include_once '../includes/fonctions.inc.php';
	include_once '../config/configPDO.inc.php';
?>

    <body>
        <div class="bg_dashboard">
        <div id="default_dialog"></div>
        <div id="default_dialog_large"></div>
        <div id="dialog_overlay">
        <div class="index_overlay"></div>
            <div class="dialog_overlay_wrap_content">
                    <div class="dialog_footer_loader">
                            <img src="<?php echo SITE_URL; ?>/img/pictos_actions/gif_uniiti.gif" height="70" width="70"/>
                    </div>
            </div>
        </div>
        <?php include'../includes/header.php'; ?>
        <div class="biggymarginer">
            <div class="big_wrapper" id="test">

            </div>
            <style>
                .bg_dashboard{background-color:white;height:100%;}
                .dashboard_wrap{margin:0 auto;}
                .dashboard_title_wrap{text-transform:uppercase;margin:0 auto;text-align:center;width:630px;}
                .dashboard_title_wrap h1{font-weight:300;margin:40px 0;}
                .dashboard_title_wrap h1 span{font-weight:600;}
                
                .dashboard_panel,.dashboard_content{width:694px;min-height:460px;margin:0 auto;}
                .dashboard_cube_item{position:relative;line-height:1.85em;text-align:center;float:left;}
                .dashboard_cube_item_margin_right{margin-right:5px;}
                .dashboard_cube_item_haut{z-index:2;}
                .dashboard_cube_item_bas{z-index:1;}
                .dashboard_cube_item_margin_top{margin-top:-7px;}
                
                .dashboard_cube_item_c{background:url('../img/pictos_dashboard/cube_c.png');}
                .dashboard_cube_item_f{background:url('../img/pictos_dashboard/cube_f.png');}
                .dashboard_cube_item span{display:block;font-size:1.7em;font-weight:400;text-transform:uppercase;}
                .dashboard_cube_item span.dashboard_txt_bold{font-weight:700;}
                .dashboard_cube_item a{color:white;display:inline-block;padding-top:75px;height:115px;width:228px;}
                .dashboard_cube_item a.dashboard_cube_item_last{padding-top:90px;height:100px;}
                .dashboard_cube_item a:hover{color:#acacac;}
                
                .dashboard_cube_ombre{float:left;margin:-15px -25px 0 0;width:736px;height:93px;background:url('../img/pictos_dashboard/ombre_cube.png');}
                
                .dashboard_content h2{margin-top:0;text-transform:uppercase;font-weight:600;border-bottom:1px solid #252525;}
                .dashboard_content span{display:inline-block;font-size:1.4em;}
                .dashboard_content span.dashboard_txt_bold{font-weight:700;margin-left:20px;}
            </style>
        <!-- FIN BIG WRAPPER -->
        <!-- CONTENU PRINCIPAL -->
        <div class="dashboard_wrap"><!-- DASH WRAP -->
            <div class="dashboard_title_wrap"><h1>Bienvenue sur <span>l'interface d'administration</span> de Uniiti.com</h1></div>
            <div class="dashboard_panel">
                <div class="dashboard_cube_item dashboard_cube_item_haut dashboard_cube_item_margin_right dashboard_cube_item_c"><a href="dashboard_ajout_commerce.php" title=""><span>Ajouter</span><span class="dashboard_txt_bold">un commerce</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_margin_right dashboard_cube_item_f"><a href="#" title=""><span>Ajouter</span><span class="dashboard_txt_bold">un objet</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_haut item dashboard_cube_item_c"><a href="dashboard_ajout_avis.php" title=""><span>Ajouter</span><span class="dashboard_txt_bold">des avis</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_bas dashboard_cube_item_margin_right dashboard_cube_item_margin_top dashboard_cube_item_f"><a href="#" title=""><span>Gérer</span><span class="dashboard_txt_bold">les commerces</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_bas dashboard_cube_item_margin_right dashboard_cube_item_margin_top dashboard_cube_item_c"><a href="#" title=""><span>Gérer</span><span class="dashboard_txt_bold">les objets</span></a></div>
                <div class="dashboard_cube_item dashboard_cube_item_bas dashboard_cube_item_margin_top dashboard_cube_item_f"><a href="#" title="" class="dashboard_cube_item_last"><span>Paramètres</span></a></div>
                <div class="dashboard_cube_ombre"></div>
            </div>
            <div class="dashboard_content">
                <h2>Données globales</h2>
                <span>Adresse du site :</span><span class="dashboard_txt_bold"><a href="#">http://www.uniiti.com</a></span>
            </div>
        </div><!-- FIN DASH WRAP -->
        <!-- FIN CONTENU PRINCIPAL -->
        </div><!-- FIN BIGGY -->
        <?php include'../includes/js.php' ?>
        </div>
    </body>
</html>