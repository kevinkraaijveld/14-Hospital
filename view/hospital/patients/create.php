<!--  Kevin Kraaijveld PHP Kalender / create.php -->
<h3>Voeg een nieuwe patiënt toe</h3>
<div>
  <!-- Dit formulier gaat naar de functie 'createPatient' in PatientController.php-->
  <form action="<?=URL?>patient/createPatient" method="POST" autocomplete="off">
    <label for="fname">Naam patiënt</label>
    <input type="text" id="patient_name" name="patient_name" minlength="2" maxlength="10" placeholder="Naam patiënt" required>

    <label for="fname">Status patiënt</label>
    <input type="text" id="patient_status" name="patient_status" minlength="2" maxlength="20" placeholder="Status patiënt" required>

    <label for="fname">Geslacht patiënt</label>
    <br>
    <label><input type="radio" name="patient_gender" value="man" checked> Man<br></label>
    <br>
    <label><input type="radio" name="patient_gender" value="vrouw"> Vrouw<br></label>
    <br><br>
    <label for="fname">Diersoort</label>
    <select name="species" required>
      <?php foreach ($species as $specie) { ?>
            <option value="<?= $specie['species_id']?>">
              <?= $specie['species_description']?>
            </option>
      <?php } ?>
    </select>
    <br><br>
    <label for="fname">Cliënt</label>
    <select name="clients" required>
      <?php foreach ($clients as $client) { ?>
            <option value="<?= $client['client_id']?>">
              <?= $client['client_firstname'] . " " . $client['client_lastname']?>
            </option>
      <?php } ?>
    </select>
    <input type="submit" value="Versturen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='/hospital/';" />
  </form>
</div>
