<?php
/*  Kevin Kraaijveld PHP HospitalController
============================================================================

1. Algemeen


============================================================================ */

/* 1. Algemeen
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */


// Dit linkt de controller met de models
require(ROOT . "model/ClientModel.php");
require(ROOT . "model/PatientModel.php");
require(ROOT . "model/SpeciesModel.php");
// Dit toont alle clients in de view/hospital/index.php
function index()
{
	render("hospital/index", // Dit toont de index.php in de view
		array(
				'clients' => joinAllPatients()  // Voert de 'joinAllPatients' functie uit in de PatientModel.php
		)
	);
}


/*Made by Kevin Kraaijveld*/
