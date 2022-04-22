<?php
$id = $patient[0]['patient_id'];
$data = $patient[0];
?>

<h3>Verwijder cliënt:</h3>
<div>
<!-- Dit formulier gaat naar de functie 'removeAPatient' in PatientController.php-->
  <form action="<?=URL?>patient/removeAPatient/<?=$patient[0]['patient_id']?>" method="GET" autocomplete="off">
  <label for="fname">Naam patiënt</label>
    <input type="text" name="person" placeholder="<?echo $data['patient_name'];?>" readonly>
  <label for="fname">Status patiënt</label>

    <input type="text" placeholder="<?echo $data['patient_status'];?>" readonly>
    <input type="text" placeholder="<?echo $data['patient_gender'];?>" readonly>
    <input type="text" placeholder="<?echo $data['species_description'];?>" readonly>

    <input type="submit" value="Verwijderen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='/hospital/';" />
  </form>
</div>
