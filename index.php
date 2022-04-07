<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once './racine.php';
include_once RACINE . '/service/ContactService.php';
$es = new ContactService();
?>
<html lang="en">
    <head>
        <title>International telephone input</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="styles.css" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
            />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </head>
    <body>
        <form method="GET" action="controller/addNumber.php">
            <fieldset>
                <legend>Ajouter un nouveau contact</legend>
                <table border="0">
                    <tr>
                        <td>Nom : </td>
                        <td><input type="text" name="nom" value="" /></td>
                    </tr>
                    <tr>
                        <td>Prenom :</td>
                        <td><input type="text" name="prenom" value="" /></td>
                    </tr>

                    <tr>
                        <td>Payée : </td>
                        <td>
                              <select name="ville">
                            <?php foreach ($es->findAllPayee() as $e) {?>
                                  <option value=<?php echo $e->getNom(); ?>><?php echo $e->getNom(); ?></option> 
                                      <?php } ?>
                          
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sexe </td>
                        <td>
                            M<input type="radio" name="sexe" value="homme" />
                            F<input type="radio" name="sexe" value="femme" />
                        </td>
                    </tr>
                    <tr>
                        <td>Phone number :</td>
                        <td><input id="phone" type="tel" name="phone" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Envoyer" />
                            <input type="reset" value="Effacer" />
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <form method="GET" action="controller/searshNumber.php">
            <table>
                <tr>
                    <td>Search :</td>
                    <td><input type="text" name="Sname" value="" placeholder="name" /></td>
                    <td> <input id="phone" type="tel" name="Sphone" />
                    </td>

                    <td> <input type="submit" value="Search" /></td>
                </tr>
            </table>
        </form>
         <script>
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
      utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    const info = document.querySelector(".alert-info");
    const error = document.querySelector(".alert-error");

    function process(event) {
      event.preventDefault();

      const phoneNumber = phoneInput.getNumber();

      info.style.display = "none";
      error.style.display = "none";

      const data = new URLSearchParams();
      data.append("phone", phoneNumber);

      fetch("http://<your-url-here>.twil.io/lookup", {
        method: "POST",
        body: data,
      })
        .then((response) => response.json())
        .then((json) => {
          if (json.success) {
            info.style.display = "";
            info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
          } else {
            console.log(json.error);
            error.style.display = "";
            error.innerHTML = `Invalid phone number.`;
          }
        })
        .catch((err) => {
          error.style.display = "";
          error.innerHTML = `Something went wrong: ${err}`;
        });
    }
  </script>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ville</th>
                    <th>Sexe</th>
                    <th>phone</th>

                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                foreach ($es->findAll() as $e) {
                    ?>
                    <tr>
                        <td><?php echo $e->getId(); ?></td>
                        <td><?php echo $e->getNom(); ?></td>
                        <td><?php echo $e->getPrenom(); ?></td>
                        <td><?php echo $e->getVille(); ?></td>
                        <td><?php echo $e->getSexe(); ?></td>
                        <td><?php echo $e->getphone(); ?></td>

                        <td>
                            <a href="controller/deleteNumber.php?id=
                               <?php echo $e->getId(); ?>">Supprimer</a> </td>
                        <td><a href="controller/updateEtudiant.php?id=
                               <?php echo $e->getId(); ?>">Modifier</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
