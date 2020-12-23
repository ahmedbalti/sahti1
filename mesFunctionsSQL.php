<?php 
	
	function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "";
			$pdo = new PDO('mysql:host=localhost;dbname=tuto_php', $user, $pass);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	
	// récupere tous les conseils
	function getAllUsers() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from conseils';
		$rows = $con->query($requete);
		return $rows;
	}

	// creer un conseil
	function createUser($type, $titre, $image, $description) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO conseils (type, titre,image, description) 
					VALUES ('$type', '$titre', '$image','$description')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	//recupere un conseil
	function readUser($id) {
		$con = getDatabaseConnexion();
		$requete = "SELECT * from conseils where id = '$id' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}

	//met à jour le conseil
	function updateUser($id, $type, $titre, $image, $description) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE conseils set 
						type = '$type',
						titre = '$titre',
						image = '$image' ,
						description = '$description'
						where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	// suprime un conseil
	function deleteUser($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from conseils where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	function getNewUser() {
		$user['id'] = "";
		$user['type'] = "";
		$user['titre'] = "";
		$user['image'] = "";
		$user['description'] = "";
		
	}
	


 ?>