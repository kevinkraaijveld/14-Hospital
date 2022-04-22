<!--  Kevin Kraaijveld PHP Hospital / index.php -->
	<h2>Hospital</h2>
<br><br>
	<table class="sortable">
			<thead>
				<tr>
					<th>Client</th>
					<th>Diersoort</th>
					<th>Naam</th>
					<th>Status</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
	 <tbody>
		<?php
		foreach ($clients as $client) {
		echo "<tr>";
		echo "<th>" . $client['client_firstname'] . " " . $client['client_lastname'] . "</th>";
		echo "<th>" . $client['species_description']  . "</th>";
		echo "<th>" . $client['patient_name'] . "</th>";
		echo "<th>" . $client['patient_status']  . "</th>";

		echo "<td class='center'>" . "<a href='" . URL . "patient/editPatient/" . $client['patient_id'] . "'>Edit</a></td>";
		echo "<td class='center'>" . "<a href='" . URL . "patient/removePatient/" . $client['patient_id'] . "'>Delete</a></td>";
		echo "</tr>";
		?>
		<?php } ?>
		</tbody>
	</table>

	<br>
	<main>
	<a id='createNew' href='<?=URL?>client/createClient'>+ Voeg cliënt toe</a>
	<a id='createSpec' href='<?=URL?>patient/createPatient'>+ Voeg patiënt toe</a>
</main>
