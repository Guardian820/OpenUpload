<?php $this->pageTitle='Upload terminé'?>
<?php $this->tab=2?>
<?php $this->tabDescr='Informations sur l\'upload terminé'?>
<h1>Upload terminé avec succès !</h1>

Le fichier <?php echo htmlentities($name)?> a bien été enregistré avec succès.<br/><br/>
<fieldset>
    <legend>Informations sur le fichier</legend>
    <strong>Nom : </strong><?php echo htmlentities($name)?><br/>
    <strong>Description : </strong><?php echo htmlentities($description)?><br/>
    <strong>Lien : </strong><?php echo $this->urlHelper->urlLink($this->urlHelper->genUrl('download', 'file', array($uid)))?>
</fieldset>
<br/>
