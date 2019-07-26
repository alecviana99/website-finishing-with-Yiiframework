<html>
<head>
<title>Envoi d'un fichier</title>
</head>
<body>
	<form enctype="multipart/form-data" action="actionsenvoi.php" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="300000000000000000000000000000000000" />
		Fichier à envoyer : <input name="fichier" type="file" />
		<input type="submit" value="Envoyer le fichier" />
	</form>
</body>
