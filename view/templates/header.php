<!DOCTYPE html>
	<html>
		<head>
			<title>Hospital</title>
			<meta charset="utf-8">
    	<link rel="stylesheet" href="public/css/style.css">
			<link rel="stylesheet" href="../public/css/style.css">
			<link rel="stylesheet" href="/hospital/public/css/style.css">
		</head>

		<body>
			<header id="kev-header">
				<h1>Hospital</h1>
				<ul>
					<li class="menu" onClick="window.location='/hospital/';">Index</li>
					<li class="menu" onClick="window.location='<?=URL?>patient/patients';">Patiënts</li>
  				<li class="menu" onClick="window.location='<?=URL?>client/clients';">Cliënten</li>
  				<li class="menu" onClick="window.location='<?=URL?>species/species';">Diersoorten</li>
  			</ul>
	    </header>
