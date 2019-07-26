<html>
<head>
<meta charset="UTF-8">
<title>Envoi d'un fichier</title>
</head>
<body>
<?php
	$ftp_server = "ftp.rhid.fr";
	$ftp_user_name = "rhidfriwfw";
	$ftp_user_pass = "j5VvjgGe2y9Q";
	$source_file = $_FILES['fichier']['tmp_name']; 
	$destination_file = "/www/DL/".$_FILES['fichier']['name'];

	// connexion
	$conn_id = ftp_connect($ftp_server);
	ftp_pasv($conn_id, true); 

	// login et passwd
	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

	// test connexion
	if ((!$conn_id) || (!$login_result)) { 
		echo "Erreur de connexion au serveur FTP <br/>";
		echo "Vous avez tenté de vous connecter à $ftp_server avec le login $ftp_user_name <br/>"; 
		echo "Veuillez verifier login et mot de passe"; 
		exit; 
	} else {
		echo "Connecté au serveur $ftp_server en tant que $ftp_user_name <br/>";
	}

	// upload
	$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 

	// test envoi
	if (!$upload) { 
		echo "Echec de l'envoi<br/>";
		echo "<a href=\"http://rhid.fr/envoi/\">Tenter à nouveau</a>";
	} else {
		echo "Le fichier a été envoyé sur $ftp_server dans le dossier $destination_file <br/>";
		echo "<a href=\"http://rhid.fr/envoi/\">Envoyer un nouveau fichier</a>";
	}


	// close the FTP stream 
	ftp_close($conn_id);
?>
</body>