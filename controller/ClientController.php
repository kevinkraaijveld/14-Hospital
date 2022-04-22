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
require(ROOT . "model/ClientModel.php");
require(ROOT . "model/PatientModel.php");

// Dit toont alle clients in de view/hospital/clients.php
function clients()
{
	render("hospital/clients", // Dit toont de clients.php in de view
		array(
			'clients' => getAllClients(), // Voert de 'getAllClients' functie uit in de ClientsModel.php
			'patients' => joinAllPatients() // Voert de 'joinAllPatients' functie uit in de PatientModel.php
		)
	);
}

/* 2. Create
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word uitgevoerd als je in de hospital/clients/create.php op versturen klikt
function createClient(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'client_firstname' => $_POST['client_firstname'],
			'client_lastname' => $_POST['client_lastname'],
			'client_phone' => $_POST['client_phone'],
			'client_email' => $_POST['client_email'],
			'client_street' => $_POST['client_street'],
			'client_city' => $_POST['client_city']
		);
			newClient($data); // Dit voert de 'newClient' functie in de ClientModel uit.
				echo "<script>alert('Cliënt toegevoegd'); window.location = '/hospital/';</script>";
	}
	render("hospital/clients/create"); // Dit toont de hospital/clients/create.php
}

// Dit word uitgevoerd als je in de hospital/species/create.php op toevoegen klikt
function createNewClient(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'client_firstname' => $_POST['client_firstname'],
			'client_lastname' => $_POST['client_lastname'],
			'client_phone' => $_POST['client_phone'],
			'client_email' => $_POST['client_email'],
			'client_street' => $_POST['client_street'],
			'client_city' => $_POST['client_city']
		);
			newClient($data); // Dit voert de 'newClient' functie in de ClientModel uit.
				echo "<script>alert('Cliënt toegevoegd'); window.location = '". URL ."client/clients';</script>";
	}
	render("hospital/clients/createNew"); // Dit toont de hospital/clients/createNew.php
}

/* 3. Delete
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word uitgevoerd als je in de hospital/index.php op het delete klikt
function deleteClient($id){
		$client = getClientsById($id);
	render("hospital/clients/delete", ['client' => $client]); // Dit toont de hospital/clients/delete.php
}
function deleteAClient($id){
	deleteThisClient($id); // Dit voert de 'deleteAClient' functie in de ClientModel uit.
echo "<script>alert('Cliënt verwijderd'); window.location = '/hospital/';</script>";
}

// Dit word uitgevoerd als je in de hospital/clients.php op het delete klikt
function removeClient($id){
		$client = getClientsById($id);
	render("hospital/clients/deleteClient", ['client' => $client]); // Dit toont de hospital/clients/deleteClient.php
}
function removeAClient($id){
	deleteThisClient($id); // Dit voert de 'removeAClient' functie in de ClientModel uit.
echo "<script>alert('Cliënt verwijderd'); window.location = '". URL ."client/clients';</script>";
}
/* 4. Edit
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word uitgevoerd als je in de hospital/index.php op een edit klikt
function editClient($id){
		$client = getClientsById($id);
	render("hospital/clients/edit", ['client' => $client]); // Dit toont de hospital/clients/edit.php
}
// Dit word uitgevoerd als je in de hospital/clients/edit.php op opslaan klikt
function saveEdit(){
		update($_POST);
	echo "<script>alert('Cliënt is aangepast'); window.location = '/hospital/';</script>";
}

function changeClient($id){
		$client = getClientsById($id);
	render("hospital/clients/editClient", ['client' => $client]); // Dit toont de hospital/clients/editClient.php
}
// Dit word uitgevoerd als je in de hospital/clients/editClient.php op opslaan klikt
function changeEdit(){
		update($_POST);
	echo "<script>alert('Cliënt is aangepast'); window.location = '". URL ."client/clients';</script>";
}
