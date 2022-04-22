<?php
$id = $species[0]['species_id'];
$data = $species[0];
?>

<h3>Verwijder diersoort:</h3>
<div>
<!-- Dit formulier gaat naar de functie 'deleteASpecies' in Speciecontroller.php-->
  <form action="<?=URL?>species/deleteASpecies/<?=$species[0]['species_id']?>" method="GET" autocomplete="off">
    <label for="fname">Diersoort</label>
    <input type="text" id="species_description" name="species_description" minlength="2" maxlength="10" placeholder="<?echo $data['species_description'];?>" readonly>
    <input type="submit" value="Verwijderen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='<?=URL?>species/species';" />
  </form>
</div>
