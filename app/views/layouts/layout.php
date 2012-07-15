<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Core::$config['name'].' - '.$this->pageTitle?></title>
<meta name="keywords" content="VOIP Company, css template, free web design layout" />
<meta name="description" content="VOIP Company, css template, free web design layout from TemplateMo.com" />
<?php echo $this->assetHelper->css('style')?>
<?php echo $this->assetHelper->css('tabcontent')?>
<?php echo $this->headerInc!==false ? $this->headerInc : ''?>
</head>
<body>
<div id="templatemo_wrapper">
<div id="templatemo_container">
	<!--  Free CSS Template is provided by www.TemplateMo.com  -->
    <div id="templatemo_menu">
        <div id="pettabs" class="indentmenu">
            <ul>
                  <li><a href="<?php echo $this->urlHelper->genUrl()?>" <?php echo $this->tab===1?'class="selected"':''?>>Accueil</a></li>
                  <li><a href="<?php echo $this->urlHelper->genUrl('upload')?>" <?php echo $this->tab===2?'class="selected"':''?>>Upload</a></li>
                  <li><a href="#" <?php echo $this->tab===3?'class="selected"':''?>>Networks</a></li>
                  <li><a href="#" <?php echo $this->tab===4?'class="selected"':''?>>Your Account</a></li>
                  <li><a href="#" <?php echo $this->tab===5?'class="selected"':''?>>About Us</a></li>
                  <li><a href="#" style="border-right: none;" <?php echo $this->tab===6?'class="selected"':''?>>Contact Us</a></li>
            </ul>
        </div>
    </div> <!-- end of mneu -->
   
    <div id="templatemo_banner">
    	<h1><?php echo Core::$config['name']?></h1>
        <p>Site de téléchargement open source codé par <strong>v4vx</strong></p>
    
    </div>
    
	<div id="templatemo_content">
    	<div id="content_top"></div>
        
        <div class="templatemo_content_section_01">
	    <?php echo $content?>           
            <div class="cleaner">&nbsp;</div>
	</div>
        
        <div class="templatemo_content_section_02">
        	
            <div class="section_02_subsection">
                <h2>Services</h2>
                <p>Liste des services disponibles sur cette plateforme</p>
                <ul>
		    <li><a hreh="">Hébergement de fichiers</a></li>
		    <li><a href="">Hébergement d'images</a></li>
		    <li><a href="">Mes fichiers</a></li>
                </ul>
            </div>
            
            <div class="section_02_subsection">
                <h2>Pourquoi utiliser <?php echo Core::$config['name']?> ?</h2>
                <p>Quelques avantages de notre plateforme par rapport aux autres</p>
                <ul>
		    <li>Sécurité</li>
                    <li>Facilité d'utilisation</li>
                    <li>Plateforme gratuite et open source</li>
                    <li>Pas de superflux</li>
                </ul>
            </div>
            
 			<!--<div class="section_02_subsection" style="border-right: none;">
                <h2>Testimonials</h2>
                
                <h3>Phasellus id purus</h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque at nulla eu elit adipiscing tempor.</p>
                <a href="http://www.flashmo.com" target="_blank">Flash Templates</a>
                
                <div style="clear: both; margin-top: 30px;">                
		    <a href="http://validator.w3.org/check?uri=<?php echo Core::$config['base_url']?>"><img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" width="88" height="31" vspace="8" border="0" /></a>
		    <a href="http://jigsaw.w3.org/css-validator/check/<?php echo Core::$config['base_url']?>"><img style="border:0;width:88px;height:31px"  src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" vspace="8" border="0" /></a>
		</div>
            </div>-->
            
            <div class="cleaner">&nbsp;</div>
		</div>
        
        
    </div>
    
    <div id="templatemo_footer">    
	<p>Copyleft 2012 site d'upload Open source par <strong>OpenUpload</strong> - code par <strong>v4vx</strong>, Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a> - <a href="https://github.com/vincent4vx/OpenUpload" target="_blank">Lien GitHub</a></p>
        <p>Copyright © <?php echo date('Y')?> <a href="<?php echo $this->urlHelper->genUrl()?>"><strong><?php echo Core::$config['name']?></strong></a></p>
	<p style="text-align: right;margin-right: 10px;">Page généré en <?php echo number_format(microtime(true)-Core::$start_time, 4)?>sec</p>
    </div> <!-- end of footer -->
	<!--  Free CSS Templates from www.TemplateMo.com  -->
</div>
</div>
</body>
<?php echo $this->footerInc!==false ? $this->footerInc : ''?>
</html>
