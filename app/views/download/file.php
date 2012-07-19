<?php $this->pageTitle='Téléchargement'?>
<?php $this->tab=3?>
<?php $this->tabDescr='Téléchargement du fichier'?>
<h1>Télécharger le fichier</h1>

<fieldset>
    <legend>Informations sur le fichier</legend>
    <strong>Nom : </strong><?php echo $file_name?><br/>
    <strong>Description : </strong><?php echo $description?><br/>
    <strong>Taille : </strong><?php echo $this->fileHelper->humanSize($size)?>
</fieldset>
<br/>
<center><?php echo $this->urlHelper->link('Télécharger', 'download', 'download', array($uid))?></center>
