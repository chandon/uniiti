<?php
        include_once '../../config/configuration.inc.php';
		$urlTo = FALSE; // Déclaration variable pour login_access destination
		$data = "{}";
?>
<div class="ident_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="ident_head">
        <div class="ident_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_dashboard/icon_labels.png" title="" alt="" height="36" width="36" />
        </div><span class="maintitle">Présentation</span>
    </div>   
    <div class="ident_body">
        <style>
            .input_lien_video{float:left;}
            input.input_lien_video{padding:10px;width:480px;height:10px;}
            .embed_preview_video{float:left;padding:10px;width:480px;height:360px;background-color:#f0f0f0;}
            
            .input_lien_petitmot{float:left;}
            textarea.input_lien_petitmot{padding:10px;width:480px;height:100px;resize:none;}
            .ptitmot_wrap_labels,.ptitmot_wrap_recos{text-align:center;float:left;background-color:white;width:480px;padding:10px;}
        </style>
            <div class="infos_gene_title"><span>Présentation de l'objet</span></div>
                <textarea class="input_lien_petitmot" placeholder="Présentation de l'objet en quelques lignes..."></textarea>
    </div>
    <div class="suggestioncommerce_footer">
        
        <div class="suggestioncommerce_valider_wrap"><a href="#">Enregistrer</a></div>
        
    </div>
</div>
</html>