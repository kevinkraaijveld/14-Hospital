<!--  Kevin Kraaijveld PHP Kalender / create.php -->

<h3>Voeg een nieuwe diersoort toe</h3>
<div>
  <!-- Dit formulier gaat naar de functie 'createNewSpec' in Speciecontroller.php-->
  <form action="<?=URL?>species/createNewSpec" method="POST" autocomplete="off">
    <label for="fname">Diersoort</label>
    <input type="text" id="species_description" name="species_description" minlength="2" maxlength="10" placeholder="Diersoort" required>

    <input type="submit" value="Versturen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='<?=URL?>species/species';" />
  </form>
</div>
