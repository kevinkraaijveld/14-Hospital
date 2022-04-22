<!--  Kevin Kraaijveld PHP Hospital / clients.php -->
	<h2>Cliënten</h2>


	<?php
	foreach ($clients as $client => $value) {
		$name = $value['client_firstname'];
		$sirname = $value['client_lastname'];

		$clientPhone= $value['client_phone'];
		$clientEmail = $value['client_email'];
		$clientStreet = $value['client_street'];
		$clientCity = $value['client_city'];

		echo '<h1>' . $name . ' ' . $sirname . '</h1>';
		echo $clientPhone;
		echo "<br>";
		echo $clientEmail;
		echo "<br>";
echo $clientStreet . ' ' . $clientCity;
		echo "<br>";
		echo "<a class='editthis' href = '" . URL . "client/changeClient/" . $value["client_id"]. "'>Edit</a>";
		echo " ";
		echo "<a class='deletethis' href = '" . URL . "client/removeClient/" . $value["client_id"]. "'>Delete</a>";
	}

	?>

	<a id='createNew' href='<?=URL?>client/createNewClient'>+ Voeg cliënt toe</a>
		<a class='middle' href='<?=URL?>hospital'>Home</a>
