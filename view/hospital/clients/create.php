<!--  Kevin Kraaijveld PHP Kalender / create.php -->

<h3>Voeg een nieuwe cliënt toe</h3>
<div>
  <!-- Dit formulier gaat naar de functie 'createClient' in ClientController.php-->
  <form action="<?=URL?>client/createClient" method="POST" autocomplete="off">
    <label for="fname">Voornaam</label>
    <input type="text" id="client_firstname" name="client_firstname" minlength="2" maxlength="10" placeholder="Voornaam" required>

    <label for="fname">Achternaam</label>
    <input type="text" id="client_lastname" name="client_lastname" minlength="2" maxlength="20" placeholder="Achternaam" required>

    <label for="fname">Telefoonnummer</label>
    <input type="text" id="client_phone" name="client_phone" minlength="2" maxlength="15" placeholder="Telefoonnummer">

    <label for="fname">Email-adres</label>
    <input type="email" id="client_email" name="client_email" minlength="2" maxlength="25" placeholder="email-adres">

    <label for="fname">Straatnaam</label>
    <input type="text" id="client_street" name="client_street" minlength="2" maxlength="25" placeholder="Straatnaam">

    <label for="fname">Woonplaats</label>
    <input type="text" id="client_city" name="client_city" minlength="2" maxlength="20" placeholder="Woonplaats">

    <input type="submit" value="Versturen">
    <input type="button" name="cancel" value="Annuleren" onClick="window.location='/hospital/';" />
  </form>
</div>
