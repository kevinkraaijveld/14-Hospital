<?php
$id = $species[0]['species_id'];
$data = $species[0];
?>

<h3>Pas een diersoort aan:</h3>
<div>
<!-- Dit formulier gaat naar de functie 'saveSpeciesEdit' in Speciecontroller.php-->
  <form action="<?=URL?>species/saveSpeciesEdit" method="post" autocomplete="off">
    <label for="fname">Diersoort</label>
    <input type="text" id="species_description" name="species_description" minlength="2" maxlength="10" value="<?= $data['species_description'];?>" required>
      <input type="hidden" name="id" value="<?= $data['species_id'] ?>">
    <input type="submit" value="Opslaan">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='<?=URL?>species/species';" />
  </form>
</div>
