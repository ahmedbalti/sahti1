<?php
	include 'mesFunctionsSQL.php';
	include 'mesFunctionsTable.php';
	
	$id = $_GET["id"];
	if ($id == 0) {
		$user = getNewUser();
		$action = "CREATE";
		$libelle = "Creer";
	} else {
		$user = readUser($id);
		$action = "UPDATE";
		$libelle = "Mettre a jour";
	}
	
	


?>

<html>
<header>
	<link rel="stylesheet" href="style.css">
	<style>
		input[type=text]:focus {
  border: 3px solid #555;
}
	</style>
</header>
<body>
		
	<form action="createUpdate.php" method="get">
	<p>	
		<a href="index.php">Liste des conseils</a>

		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<input type="hidden" name="action" value="<?php echo $action;  ?>"/>
		 <div>
        	<label for="name">Type:</label>
        	<input type="text" id="type" name="type" required pattern="[0-9a-é-zA-Z-\.]{3,15}" placeholder="De 3 à 15 caractères"    value="<?php echo $user['type'];  ?>">
	    </div>
	    <div>
	        <label for="titre">Titre:</label>
	        <input type="text" id="titre" name="titre" required pattern="[0-9a-é-zA-Z-\.]{3,15}" placeholder="De 3 à 15 caractères" value="<?php echo $user['titre'];  ?>">
	    </div>
	    <div>
       <label for="myfile">Image:</label>
       <input type="file" id="image" name="image" required pattern><br>
	   
	       
	    </div>
	    <div>
	        <label for="description">Description:</label>
	        <textarea id="description" name="description" placeholder="veuillez saisir le contenu du conseil"<?php echo $user['description'];  ?>"></textarea>
	    </div>
		<div class="button">
			<button type="submit"><?php echo $libelle;  ?></button>
		</div>
	</p>
	</form>
	<br>


	<!-- <FORM ACTION="trait-new_fiche.php" method="POST" ENCTYPE="multipart/form-data"> 
<input type="hidden" name=\"max_file_size" value="50000">
<label for="title" class="float">Image : </label>  <input TYPE="file" NAME="image"><br>  -->



	<?php if ($action!="CREATE") { ?>
	<form action="createUpdate.php" method="get">
		<input type="hidden" name="action" value="DELETE"/>
		<input type="hidden" name="id" value="<?php echo $user['id'];  ?>"/>
		<p>
		<div class="button">
			<button type="submit">Supprimer</button>
		</div>
		</p>
	</form>

	

	<?php } ?>

</body>
</html>