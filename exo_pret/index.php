<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
            text-align: center;
        }

        fieldset {


            background-color: #ffff;
            width: 89%;
            height: 89%;
            padding: 2%;
            margin-left: auto;
            margin-right: auto;
        }

        .tableau {

            background-color: #fff;
        }
    </style>

    <?php
    require './model/Pret.php';

    if (isset($_GET['valide']) &&  !empty($_GET['emprunt']) &&  !empty($_GET['interet']) && !empty($_GET['annee'])) {

        $monPretPerso = new Pret($_GET["emprunt"], $_GET["interet"], $_GET["annee"]);

        $maMensualite = $monPretPerso->calculMensualite();
    }

    ?>

    <fieldset>
        <form action="" method="get" enctype="text/plain">

            <div>
                <label for="Emprunt">Capital emprunté : </label>
                <input type="number" name="emprunt" id="Emprunt" step="1" min="0" value="
<?php
echo $capital;
?>
"

                 placeholder="0">
            </div>

            <div>
                <label for="interet">Taux d'intérêt en % : </label>
                <input type="number" name="interet" id="interet" step="0.1" min="0" placeholder="0">

            </div>

            <div>
                <label for="année"> nombreb d'année : </label>
                <input type="number" name="annee" id="année" step="1" placeholder="0" min="0">
            </div>
            <div>

                <label for="mensualite">mensualité: </label>
                <input type="text" name="mensualite" id="mensualite" disabled="true" value="
                <?php
                $remboursement = (isset($monPretPerso)) ? $monPretPerso->calculMensualite() . "€/mois " : "invalide";

                

                echo $remboursement;
                ?>
                
                ">

            </div>

            <input type="submit" value="Valider" name="valide">

        </form>


        <table class="tableau">
            <th>
            <td>

            </td>
            </th>
        </table>




    </fieldset>
</body>

</html>