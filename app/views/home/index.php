<?php $this->pageTitle='Index'?>
<?php $this->tab=1?>
<div class="section_01_left">
    <h1>Bienvenue sur OpenUpload !</h1>
    Bienvenue <b><?php echo $name?></b> sur mon nouveau site d'upload !
</div> 			
<div class="section_01_right">
    <h1>Site News</h1>
    <?php foreach($data as $title=>$texte):?>
	<h3><?php echo $title?></h3>
	<p><?php echo $texte?></p>
    <?php endforeach?>
</div>
