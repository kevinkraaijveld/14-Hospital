<?php
$id = $client[0]['client_id'];
$data = $client[0];
?>

<h3>Pas een cliënt aan:</h3>
<div>
<!-- Dit formulier gaat naar de functie 'changeEdit' in ClientController.php-->
  <form action="<?=URL?>client/changeEdit" method="post" autocomplete="off">
    <label for="fname">Voornaam</label>
    <input type="text" id="client_firstname" name="client_firstname" minlength="2" maxlength="10" value="<?echo $data['client_firstname'];?>" required>

    <label for="fname">Achternaam</label>
    <input type="text" id="client_lastname" name="client_lastname" minlength="2" maxlength="20" value="<?echo $data['client_lastname'];?>" required>

    <label for="fname">Telefoonnummer</label>
    <input type="text" id="client_phone" name="client_phone" minlength="7" maxlength="15" value="<?echo $data['client_phone'];?>">

    <label for="fname">Email-adres</label>
    <input type="email" id="client_Email" name="client_email" minlength="2" maxlength="20" value="<?echo $data['client_email'];?>">

    <label for="fname">Straatnaam</label>
    <input type="text" id="client_street" name="client_street" minlength="2" maxlength="20" value="<?echo $data['client_street'];?>">

    <label for="fname">Woonplaats</label>
    <input type="text" id="client_city" name="client_city" minlength="2" maxlength="20" value="<?echo $data['client_city'];?>">

    <input type="hidden" name="id" value="<?= $data['client_id'] ?>">

    <input type="submit" value="Versturen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='<?=URL?>client/clients/';" />
  </form>
</div>
