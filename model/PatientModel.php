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


// Dit word aangeroepen door de 'delete' en de 'edit' functies in de PatientController
function getPatientsById($id){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `patients`
					INNER JOIN clients on patients.client_id = clients.client_id
					INNER JOIN species on patients.species_id = species.species_id where patient_id = :id ";
	$query = $db->prepare($sql);
	$query->bindParam(":id", $id);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

// Dit word aangeroepen door de 'delete' en de 'edit' functies in de PatientController
function joinAllPatients(){
		$db = openDatabaseConnection();
		$sql = "SELECT * FROM `patients`
						INNER JOIN clients on patients.client_id = clients.client_id
						INNER JOIN species on patients.species_id = species.species_id";
		$query = $db->prepare($sql);
		$query->execute();
			return $query->fetchAll();
}


/* 2. Create
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'createPatient' en de 'createNewPatient' functies in de PatientController
function newPatient($data){
	$db = openDatabaseConnection();
	$sql = $db->prepare("INSERT INTO patients (patient_name , patient_status, patient_gender, species_id, client_id)
	VALUES (:patient_name, :patient_status, :patient_gender, :species_id, :client_id);");

		$sql->bindParam(':patient_name',$data['patient_name'],PDO::PARAM_STR);
		$sql->bindParam(':patient_status',$data['patient_status'],PDO::PARAM_INT);
		$sql->bindParam(':patient_gender',$data['patient_gender'],PDO::PARAM_INT);
	 	$sql->bindParam(':species_id',$data['species_id'],PDO::PARAM_INT);
		$sql->bindParam(':client_id',$data['client_id'],PDO::PARAM_INT);

	$sql->execute();
}


/* 3. Delete
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'deleteAPatient' functie in de PatientController
function deleteThisPatient($id) {
	$db = openDatabaseConnection();
		$sql = $db->prepare("DELETE FROM patients WHERE patient_id = :id");
			$sql->bindParam(":id", $id);
	$sql->execute();
}

/* 4. Edit
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word aangeroepen door de 'changeEdit' functie in de PatientController
function updatePatient($answers){
	$db = openDatabaseConnection();
	$sql = "UPDATE patients SET patient_name = :patient_name, patient_status = :patient_status, patient_gender = :patient_gender, client_id = :client_id WHERE patient_id = :id";
	$query = $db->prepare($sql);
	$query->bindParam(":patient_name", $answers['patient_name']);
	$query->bindParam(":patient_status", $answers['patient_status']);
	$query->bindParam(":patient_gender", $answers['patient_gender']);
	$query->bindParam(":client_id", $answers['client_id']);
	$query->bindParam(":id", $answers['id']);
	$query->execute();
}
/*Made by Kevin Kraaijveld*/
