<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uopload file with progress bar</title>

</head>
<body>
    <h1>Upload fichier</h1>
    <form action="" enctype="multipart/form-data" method="post">
        <label for="">upload file</label>
        <input type="file" id ="fichier" name="fichier"><br>
        <progress value="0" id="progress" max="100" style="width: 300px; background: orange;"></progress>
        <input id="register" type="submit" name="register" value="Télecharger">
    </form>
    <div id="status"></div>
    <div id="status_byte"></div>
   <script>

    	function _(val){
    		var element = document.getElementById(val);
    		return element;
    	}

    	function upload_file(){
    		var fichier = _('fichier');
    		console.log(fichier);
    	}

    	function upload_file(){
    		var fichier = _('fichier').files[0];
    		var data = new FormData();
    		data.append('fichier', fichier);
    		
    		var ajax = new XMLHttpRequest();

    		ajax.upload.addEventListener("progress", progressHandler, false);
    		ajax.addEventListener("load", loadHandler, false); // rehefa complete
    		ajax.addEventListener("error", errorHandler, false);
    		ajax.addEventListener("abort", abortHandler, false); // en cas d'annulation
    		ajax.open("POST", "upload.php");
    		ajax.send(data);

    	}

    	function progressHandler(event){
    		_('status_byte').innerText = event.loaded + "bytes uploadé sur " + event.total + " bytes.";
    		var pourcentage = (event.loaded / event.total) * 100;
    		pourcentage = Math.round(pourcentage);
    		_('progress').value = pourcentage;
    		_('status').innerText = pourcentage + " % uploadé";

    	}

    	function loadHandler(event){
    		var response = event.target.responseText;
    		if(response == "ok"){
    			_('status').innerText = "upload terminé"; // target fait référence à upload.php (le fichier cible)
    			_('progress').value = 0;
    		}
    		else{
    			_('status').innerText = event.target.responseText;
    			_('progress').value = 0;
    		}
    		
    	}

    	function errorHandler(){
    		_('status').innerText = "Erreur: upload de fichier";
    	}

    	function abortHandler(){
    		_('status').innerText = "L'upload de fichier est interrompu";
    	}

    	_('register').onclick = function(event){
    		event.preventDefault();
    		upload_file();
    	}



    </script>
</body>
</html>