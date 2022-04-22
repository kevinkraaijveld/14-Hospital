<?php
/*  Kevin Kraaijveld PHP ClientController
============================================================================

1. Algemeen
2. Create
3. Delete
4. Edit

============================================================================ */

/* 1. Algemeen
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit linkt de controller met de models
require(ROOT . "model/PatientModel.php");
require(ROOT . "model/SpeciesModel.php");
require(ROOT . "model/ClientModel.php");

// Dit toont alle patienten in de  view/hospital/patients.php
function patients()
{
	render("hospital/patients", // Dit toont de patients.php in de view
		array(
			'patients' => joinAllPatients()  // Voert de 'joinAllPatients' functie uit in de PatientsModel.php
		)
	);
}


/* 2. Create
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
// Dit word uitgevoerd als je in de hospital/patients/create.php op versturen klikt
function createPatient(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'patient_name' => $_POST['patient_name'],
			'patient_status' => $_POST['patient_status'],
			'patient_gender' => $_POST['patient_gender'],
			'species_id' => $_POST['species'],
			'client_id' => $_POST['clients']
		);
			newPatient($data); // Dit voert de 'newPatient' functie in de PatientModel uit.
				echo "<script>alert('Patient toegevoegd'); window.location = '/hospital/';</script>";
	}
	render("hospital/patients/create", // Dit toont de hospital/patients/create.php
	array(
		'species' => getAllSpecies() , // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
		'clients' => getAllClients() // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
	)
	);
	}

// Dit word uitgevoerd als je in de view/hospital/patients/create.php op versturen klikt
function createNewPatient(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'patient_name' => $_POST['patient_name'],
			'patient_status' => $_POST['patient_status'],
			'patient_gender' => $_POST['patient_gender'],
			'species_id' => $_POST['species'],
			'client_id' => $_POST['clients']
		);
			newPatient($data); // Dit voert de 'newPatient' functie in de PatientModel uit.
				echo "<script>alert('Patient toegevoegd'); window.location = '". URL ."patient/patients';</script>";
	}
	render("hospital/patients/createNew",
	array(
		'species' => getAllSpecies() , // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
		'clients' => getAllClients() // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
	)
);
}

/* 3. Delete
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word uitgevoerd als je in de view/hospital/patients.php op delete klikt
function deletePatient($id){
		$patient = getPatientsById($id);
	render("hospital/patients/delete", ['patient' => $patient]); // Dit toont de hospital/patients/delete.php
}
function deleteAPatient($id){
	deleteThisPatient($id); // Dit voert de 'deleteThisPatient' functie in de PatientModel uit.
echo "<script>alert('Patiënt verwijderd'); window.location = '". URL ."patient/patients';</script>";
}

// Dit word uitgevoerd als je in de view/hospital/patients.php op delete klikt
function removePatient($id){
		$patient = getPatientsById($id);
	render("hospital/patients/remove", ['patient' => $patient]); // Dit toont de hospital/patients/delete.php
}
function removeAPatient($id){
	deleteThisPatient($id); // Dit voert de 'deleteThisPatient' functie in de PatientModel uit.
echo "<script>alert('Patiënt verwijderd'); window.location = '/hospital/';</script>";
}

/* 4. Edit
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


function changePatient($id){
		$patient = getPatientsById($id);
	render("hospital/patients/change",
	array(
		'species' => getAllSpecies() , // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
		'clients' => getAllClients(), // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
		'patient' => $patient
	)
		); // Dit toont de hospital/patients/edit.php
}
// Dit word uitgevoerd als je in de hospital/patients/edit.php op opslaan klikt
function saveChange(){
		updatePatient($_POST);
	echo "<script>alert('Patiënt is aangepast'); window.location = '". URL ."patient/patients';</script>";
}

function editPatient($id){
		$patient = getPatientsById($id);
	render("hospital/patients/edit",
	array(
		'species' => getAllSpecies() , // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
		'clients' => getAllClients(), // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
		'patient' => $patient
	)
		); // Dit toont de hospital/patients/edit.php
}
// Dit word uitgevoerd als je in de hospital/patients/edit.php op opslaan klikt
function saveEdit(){
		updatePatient($_POST);
	echo "<script>alert('Patiënt is aangepast'); window.location = '/hospital/';</script>";
}
/*Made by Kevin Kraaijveld*/
