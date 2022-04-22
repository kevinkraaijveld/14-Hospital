<?php
/*  Kevin Kraaijveld PHP HospitalModel
============================================================================

1. Algemeen
2. Create
3. Delete
4. Edit

============================================================================ */

/* 1. Algemeen
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


// Dit word aangeroepen door de 'species' functie in de SpeciesController
function getAllSpecies(){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM species ORDER BY `species`.`species_description` ASC";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

// Dit word aangeroepen door de 'delete' en de 'edit' functies in de SpeciesController
function getSpeciesById($id){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `species` where species_id = :id ";
	$query = $db->prepare($sql);
	$query->bindParam(":id", $id);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

/* 2. Create
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'createSpec' & 'createNewSpec' functie in de ClientController
function newSpec($data){
	$db = openDatabaseConnection();
	$sql = $db->prepare("INSERT INTO species (species_description)
	VALUES (:species_description);");

		$sql->bindParam(':species_description',$data['species_description'],PDO::PARAM_STR);
	$sql->execute();
}

/* 3. Delete
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'deleteASpecies' functie in de SpeciesController
function deleteThisSpecies($id) {
	$db = openDatabaseConnection();
		$sql = $db->prepare("DELETE FROM species WHERE species_id = :id");
			$sql->bindParam(":id", $id);
	$sql->execute();
}


/* 4. Edit
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'saveSpeciesEdit' functie in de SpeciesController
function updateSpecies($answers){
	$db = openDatabaseConnection();
	$sql = "UPDATE species SET species_description = :species_description WHERE species_id = :id";
	$query = $db->prepare($sql);
	$query->bindParam(":species_description", $answers['species_description']);
	$query->bindParam(":id", $answers['id']);
	$query->execute();
}


/*Made by Kevin Kraaijveld*/
