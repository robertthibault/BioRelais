<?php
ini_set('display_errors', 1);
require_once 'fonctions/autoload.php';
session_start()?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>EBioRelai</title>
		<style type="text/css">
			@import url(styles/BioRelais.css);
		</style>
	</head>
	<body>
		<?php
			include 'controleurs/controleurPrincipal.php';
		?>

	</body>
</html>
