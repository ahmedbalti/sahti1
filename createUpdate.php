<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	
	$action = $_GET["action"];

	if ($action == "DELETE") {
		$id = $_GET["id"];
	} else {
		$id = $_GET["id"];
		$type = $_GET["type"];
		$titre = $_GET["titre"];
		$image = $_GET["image"];
		$description = $_GET["description"];
	

	}
	

	if ($action == "CREATE") {
		createUser($type, $titre, $image, $description );

		echo "conseil crée <br>";
		echo "<a href='index.php'>Liste des conseils</a>";
		
	}
	
	if ($action == "UPDATE") {
		updateUser($id,$type, $titre, $image, $description );
		echo "conseil update <br>";
		echo "<a href='index.php'>Liste des conseils</a>";
	}
	if ($action == "DELETE") {
		deleteUser($id);
		echo "conseil delete <br>";
		echo "<a href='index.php'>Liste des conseils</a>";
	}
	

	
?>