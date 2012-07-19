<?php $this->pageTitle='Index'?>
<?php $this->tab=1?>
<?php $this->tabDescr='Bienvenue '.($this->Session->name===false ? 'invité' : $this->Session->name).' sur '.Core::$config['name']?>
<div class="section_01_left">
    <h1>Bienvenue sur OpenUpload !</h1>
    Bienvenue <b><?php echo $this->Session->name?></b> sur mon nouveau site d'upload !
</div>
