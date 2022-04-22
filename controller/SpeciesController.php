<?php
/*  Kevin Kraaijveld PHP SpeciesController
============================================================================

1. Algemeen
2. Create
3. Delete
4. Edit

============================================================================ */

/* 1. Algemeen
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit linkt de controller met de models
require(ROOT . "model/SpeciesModel.php");

// Dit toont alle species in de view/hospital/species.php
function species()
{
	render("hospital/species", // Dit toont de species.php in de view
		array(
			'species' => getAllSpecies() , // Voert de 'getAllSpecies' functie uit in de SpeciesModel.php
		)
	);
}

/* 2. Create
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */

// Dit word uitgevoerd als je in de hospital/index.php op versturen klikt
function createSpec(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'species_description' => $_POST['species_description'],
		);
			newSpec($data); // Dit voert de 'newSpec' functie in de SpeciesModel.php uit.
				echo "<script>alert('Diersoort toegevoegd'); window.location = '". URL ."patient/createPatient';</script>";
	}
	render("hospital/species/create"); // Dit toont de hospital/species/create.php
}
// Dit word uitgevoerd als je in de hospital/species/create.php op versturen klikt
function createNewSpec(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'species_description' => $_POST['species_description'],
		);
			newSpec($data); // Dit voert de 'newSpec' functie in de SpeciesModel.php uit.
				echo "<script>alert('Diersoort toegevoegd'); window.location = '". URL ."species/species';</script>";
	}
	render("hospital/species/createNew"); // Dit toont de hospital/species/createNew.php
}


/* 3. Delete
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
// Dit word uitgevoerd als je in de hospital/species.php op het delete klikt
function deleteSpecies($id){
		$species = getSpeciesById($id);
	render("hospital/species/delete", ['species' => $species]); // Dit toont de hospital/clients/delete.php
}

function deleteASpecies($id){
		deleteThisSpecies($id); // Dit voert de 'deleteThisSpecies' functie in de SpeciesModel uit.
	echo "<script>alert('Diersoort verwijderd'); window.location = '/hospital/species/species';</script>";
}

/* 4. Edit
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


// Dit word uitgevoerd als je in de hospital/species.php op een naam klikt
function editSpecies($id){
		$species = getSpeciesById($id);
	render("hospital/species/edit", ['species' => $species]); // Dit toont de hospital/species/edit.php
}

// Dit word uitgevoerd als je in de hospital/species/edit.php op opslaan klikt
function saveSpeciesEdit(){
		updateSpecies($_POST);
	echo "<script>alert('Diersoort is aangepast'); window.location = '/hospital/species/species/';</script>";
}


/*Made by Kevin Kraaijveld*/
