<?php
        include_once '../../config/configuration.inc.php';
        include'../head.php'; ?>

<div class="oublimdp_wrapper">
    <div class="popin_close_button"><div class="popin_close_button_img_container"></div></div>
    <div class="oublimdp_head">
        <div class="oublimdp_img_container">
            <img src="<?php echo SITE_URL; ?>/img/pictos_popins/ident_icon.png" title="" alt="" height="36" width="37" />
        </div><span class="maintitle">Identifiants oubliés</span>
    </div>   
    <div class="oublimdp_body">
            
        <div class="oublimdp_explications">

            <span class="oublimdp_explications_txt"><span>Pour récupérer vos accès, indiquez ci-dessous votre email :</span>
        
        </div>
        <div class="oublimdp_inputs">
            <input class="oublimdp_input_email" type="mail" />
        </div> 
            
    </div>
    <div class="ident_footer">
        
        <div class="ident_inscription_wrap"><a href="#">Inscription</a></div>
        <div class="ident_connexion_wrap"><a href="#">Connexion</a></div>
        
    </div>
</div>
</html>