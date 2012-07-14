function getXHR() {
  var xhr = null;
  
  if(window.XMLHttpRequest || window.ActiveXObject) {
    if(window.ActiveXObject) {
      try {
        xhr = new ActiveXObject('Msxml2.XMLHTTP');
      } catch(e) {
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
      }
    } else {
      xhr = new XMLHttpRequest();
    }
    
  } else {
    return null;
  }
  
  return xhr;
}

function verifUpload(infoUrl) {
  xhr = getXHR();
  
  if(xhr && xhr.readyState != 0) {
    xhr.abort();
  }
  
  var keyFile = document.getElementById('keyFile').value;
  
  xhr.open('POST', infoUrl, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(null);
  
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4) {
      if(xhr.responseText != 'false') {
        var response = eval('('+xhr.responseText+')');
        
	var percent=Math.round(response.current / response.total * 100);
        document.getElementById('fileName').innerHTML = response.filename;
        document.getElementById('progress').innerHTML =
          percent + '%';
	document.getElementById('progress').style.width=percent+'%';
        if(response.done != 1) {
          verifUpload(infoUrl);
        }
      }else{
        verifUpload(infoUrl);
      }
    }
  };
}


