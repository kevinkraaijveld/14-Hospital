<?php
$id = $client[0]['client_id'];
$data = $client[0];
?>

<h3>Verwijder cliënt:</h3>
<div>
<!-- Dit formulier gaat naar de functie 'deleteAClient' in ClientController.php-->
  <form action="<?=URL?>client/deleteAClient/<?=$client[0]['client_id']?>" method="GET" autocomplete="off">
    <label for="fname">Voornaam</label>
    <input type="text" name="person" placeholder="<?echo $data['client_firstname'];?>" readonly>
    <label for="fname">Achternaam</label>
    <input type="text" placeholder="<?echo $data['client_lastname'];?>" readonly>
    <label for="fname">Telefoonnummer</label>
    <input type="text" name="client_phone" placeholder="<?echo $data['client_phone'];?>" readonly>

    <label for="fname">Email-adres</label>
    <input type="text" name="client_email" placeholder="<?echo $data['client_email'];?>" readonly>

    <label for="fname">Straatnaam</label>
    <input type="text" name="client_street" placeholder="<?echo $data['client_street'];?>" readonly>

    <label for="fname">Woonplaats</label>
    <input type="text" name="client_city" placeholder="<?echo $data['client_city'];?>" readonly>
    <input type="hidden" name="client_id" value="<?= $id ?>">


    <input type="submit" value="Verwijderen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='/hospital/';" />
  </form>
</div>
