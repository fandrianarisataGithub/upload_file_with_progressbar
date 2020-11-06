<?php 


	if($_FILES){

		//unlink("fichiers/developpeur-java.jpg");  // supprime un fichier arahina fotsiny le repertoire
		$name = strtolower($_FILES['fichier']['name']);
		$tmp_name = $_FILES['fichier']['tmp_name'];
		$error = $_FILES['fichier']['error']; // qui vaut 0 s'il n'y a pas d'erreur
		$type = $_FILES['fichier']['type'];
		$size = $_FILES['fichier']['size'];
		
		if($error != 0 || !$tmp_name){
			echo "Une érreur est survenue lors de l'upload d fichier 1";
			die();
		}
		if(move_uploaded_file($tmp_name, "fichiers/" . $name)){
			echo "ok";
		}
		elseif(!move_uploaded_file($tmp_name, "fichiers/" . $name)){
			echo "Une érreur est survenue lors de l'upload d fichier";
			die();
		}
		
	}
	else{
		echo "il n'y a pas de fichier réçu au serveur";
	}

 ?>