<?php $this->pageTitle='Héberger un fichier'?>
<?php $this->tab=2?>
<?php $this->tabDescr='Héberger un fichier dans nos serveurs'?>
<?php $this->headerInc=$this->assetHelper->js('upload')?>
<?php $keyFile=uniqid()?>
<form enctype="multipart/form-data" method="post" action="<?php echo $this->urlHelper->genUrl('upload', 'save')?>" onsubmit="verifUpload(<?php echo "'".$this->urlHelper->genUrl('upload', 'uploadinfo', array($keyFile))."'"?>);">
    <input type="hidden" id="keyFile" name="APC_UPLOAD_PROGRESS" value="<?php echo $keyFile?>" />
    <table id="upload">
	<tr>
	    <td style="width: 150px">Sélectionnez le fichier :</td>
	    <td>
		<input type="file" name="fileToUpload" onchange="fakeinput.value=this.value"/>
		<div id="fakefile">
		    <input name="fakeinput" type="text" onclick="fileToUpload.click()"/>
		    <button type="button" onclick="fileToUpload.click()">Choisir...</button>
		</div>
	    </td>
	</tr>
	<tr>
	    <td>Description du fichier :</td>
	    <td>
		<input type="text" name="descr" />
		<input type="submit" value="Uploader" />
	    </td>
	</tr>
    </table>
</form>

<!--<iframe id="uploadFrame" name="uploadFrame" src="#" style="display:none"></iframe>-->
<br/>
<fieldset>
    <legend>Informations</legend>
    <strong>Nom du fichier</strong> : <span id="fileName"><em>Aucun fichier chargé</em></span><br />
    <strong>Progression</strong> : <div id="bar"><div id="progress">0%</div></div>
</fieldset>
