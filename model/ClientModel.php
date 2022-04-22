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

// Dit word aangeroepen door de 'clients' functie in de ClientController
function getAllClients(){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM clients";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

// Dit word aangeroepen door de 'patients' functie in de ClientController
function getClientsById($id){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `clients` where client_id = :id ";
	$query = $db->prepare($sql);
	$query->bindParam(":id", $id);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

/* 2. Create
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'createClient' & 'createNewClient' functie in de ClientController

function newClient($data){
	$db = openDatabaseConnection();
	$sql = $db->prepare("INSERT INTO clients (client_firstname, client_lastname, client_phone,  client_email, client_street, client_city)
	VALUES (:client_firstname, :client_lastname, :client_phone, :client_email, :client_street, :client_city);");

	$sql->bindParam(':client_firstname',$data['client_firstname'],PDO::PARAM_STR);
		$sql->bindParam(':client_lastname',$data['client_lastname'],PDO::PARAM_STR);
		$sql->bindParam(':client_phone',$data['client_phone'],PDO::PARAM_STR);
			$sql->bindParam(':client_email',$data['client_email'],PDO::PARAM_STR);
			$sql->bindParam(':client_street',$data['client_street'],PDO::PARAM_STR);
				$sql->bindParam(':client_city',$data['client_city'],PDO::PARAM_STR);
	$sql->execute();
}


/* 3. Delete
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'deleteClient' & 'removeClient' functie in de ClientController
function deleteThisClient($id) {
	$db = openDatabaseConnection();
		$sql = $db->prepare("DELETE FROM clients WHERE client_id = :id");
		$sql->bindParam(":id", $id);
	$sql->execute();
}

/* 4. Edit
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
// Dit word aangeroepen door de 'saveEdit' & 'changeClient' functie in de ClientController
function update($answers){
	$db = openDatabaseConnection();
	$sql = "UPDATE clients SET client_firstname = :client_firstname, client_lastname = :client_lastname, client_phone = :client_phone,  client_email = :client_email, client_street = :client_street, client_city = :client_city WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->bindParam(":client_firstname", $answers['client_firstname']);
	$query->bindParam(":client_lastname", $answers['client_lastname']);
	$query->bindParam(":client_phone", $answers['client_phone']);
	$query->bindParam(":client_email", $answers['client_email']);
	$query->bindParam(":client_street", $answers['client_street']);
	$query->bindParam(":client_city", $answers['client_city']);
	$query->bindParam(":id", $answers['id']);
	$query->execute();
}

/*Made by Kevin Kraaijveld*/
