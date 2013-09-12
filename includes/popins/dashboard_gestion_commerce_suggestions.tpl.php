<?php 
	include_once '../../acces/auth.inc.php';                 // Gestion accès à la page - incluant la session	
	include_once '../../config/configuration.inc.php';
	include_once '../../config/configPDO.inc.php';
?>                      
                        <!-- ITEM SUGGESTION -->
                        <div class="dashboard_notif_item">
                            <div class="dashboard_notif_item_head">
                                <div class="dashboard_notif_item_head_img_container">
                                    <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/photo_notif.jpg"/>
                                </div>
                                <div class="dashboard_notif_item_head_desc">
                                    <span class="dashboard_notif_nom_commerce">Restaurant Chez les Artistes</span>
                                    <span class="dashboard_notif_motif">Notification d'ajout de commerce</span>
                                    <span class="dashboard_notif_temps">Il y a 2 jours</span>
                                </div>
                                <div class="dashboard_notif_item_head_buttons">
                                    <a href="#" class="first_img_margin" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_suppr.png"/></a>
                                    <a href="#" title=""><img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/bouton_notif_valide.png"/></a>
                                </div>
                            </div>
                            <div class="dashboard_notif_item_body">
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Nom de l'enseigne :</span><span class="dashboard_notif_txt_normal2"> Le bon coin de chez nous</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Catégorie :</span><span class="dashboard_notif_txt_normal2"> Cuisine</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Sous-catégorie :</span><span class="dashboard_notif_txt_normal2"> Restauration</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Sous-sous catégorie :</span><span class="dashboard_notif_txt_normal2"> Cuisine française</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Descriptif :</span><span class="dashboard_notif_txt_normal2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae dui quis mauris varius commodo nec nec velit. Donec et tristique enim. Suspendisse potenti.</span>
                                </div>
                                
                                <div class="dashboard_notif_item_float_left">
                                    <span class="dashboard_notif_txt_bold2">Code postal ou ville :</span><span class="dashboard_notif_txt_normal2"> 84310</span>
                                </div>
                            </div>
                        </div>
                        <!-- ITEM -->
                       