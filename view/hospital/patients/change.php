<?php
$id = $patient[0]['patient_id'];
$data = $patient[0];
?>

<h3>Pas een patiënt aan:</h3>
<div>

<!-- Dit formulier gaat naar de functie 'saveChange' in PatientController.php-->
  <form action="<?=URL?>patient/saveChange" method="post" autocomplete="off">
    <label for="fname">Naam patiënt</label>
    <input type="text" id="patient_name" name="patient_name" minlength="2" maxlength="10" value="<?echo $data['patient_name'];?>" required>

    <label for="fname">Status patiënt</label>
    <input type="text" id="patient_status" name="patient_status" minlength="2" maxlength="50" value="<?echo $data['patient_status'];?>" required>

    <label for="fname">Geslacht patiënt</label>
    <br>
    <?php
      if($data['patient_gender']=='Man'){
          echo '<label><input type="radio" name="patient_gender" checked  value="Man"> Man<br></label><br>';
      }
      else echo '<label><input type="radio" name="patient_gender"   value="Man"> Man<br></label><br>';
      if($data['patient_gender']=='Vrouw'){
            echo '<label><input type="radio" name="patient_gender" checked  value="Vrouw"> Vrouw<br></label>';
        }
        else echo '<label><input type="radio" name="patient_gender"   value="Vrouw"> Vrouw<br></label>';
     ?>
     <br><br>
     <label for="fname">Cliënt</label>
     <select name="client_id" required>
       <?php foreach ($clients as $client) { ?>
             <option name="client_id" value="<?= $client['client_id']?>">
               <?= $client['client_firstname'] . " " . $client['client_lastname']?>
             </option>
       <?php } ?>
     </select>

      <input type="hidden" name="id" value="<?= $data['patient_id'] ?>">

    <input type="submit" value="Versturen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='<?=URL?>patient/patients';" />
  </form>
</div>
