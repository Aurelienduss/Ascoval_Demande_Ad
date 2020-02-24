<?php
session_start();

///////////////////////////////////////////////
/*  $user = $_SESSION["username"];
  if ($user = $_SESSION["username"]){
    echo "bienvenu";
  }

  else {

  }*/

if (!empty($_SESSION["username"])) {

} else {
    header('location:login.html');
}

$db = mysqli_connect('localhost', 'root', '', 'admin');
$req_select_nom = 'SELECT Nom FROM fichier';
$exec_select_nom = $db->query('SELECT * FROM groups');
$db = mysqli_connect("localhost", "root", "", 'admin') or die ("error");
$req = $db->query("SELECT * FROM groups where Type='interservice'");
$req2 = $db->query("SELECT * FROM groups where Type='commun'");
$req3 = $db->query("SELECT * FROM groups where Type='Service'");
$req4 = $db->query("SELECT DISTINCT Groupe FROM groups WHERE Type='interservice'");
$req5 = $db->query("SELECT DISTINCT Groupe FROM groups WHERE Type='commun'");
$req6 = $db->query("SELECT DISTINCT Groupe FROM groups WHERE Type='service'");


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>


<nav class="nav">
    <div class="container">
        <div class="menu" id="open-navbar1">
            <ul class="list">
                <li><a href="consultation-requete.php">Consultation</a></li>
                <li><a href="menu.php">Demande</a></li>
                <li><a href="deco.php">Deconnexion</a></li>
                <li><img class="pic-asco" src="image/ascoval.png"
                         style="height:40px; float: left; margin-left:500px; margin-top:10px;"></img></li>
            </ul>
        </div>
    </div>
</nav>

<div class="login-page2"><a>Demande Droit Fichier</a></div>
<div class="login-page">
    <div class="form">

        <form class="login-form" action="requeteModele.php" method='POST'>
            <input type="text" name="pour_qui" placeholder="prenom.nom"></input>


            <label for="service" class="required">Groupe :</label>
            <select id="service" name="service" content-type="choices" trigger="true" target="groupe">
                <option value="Interservice">Interservice</option>
                <option value="Commun">Commun</option>
                <option value="Service">Service</option>
            </select></br></br>

///////////////////////////////
            <label for="groupe" class="required">Nom dossier :</label>
            <select id="groupe" name="groupe" content-type="choices" trigger="true" target="nom">
                <optgroup reference="Interservice">
                    <?php
                    while ($row = $req4->fetch_array()) {
                        if (stristr($row["Groupe"], 'RW') === FALSE) {

                            echo "<option value='" . $row["Groupe"] . "'>" . $row["Groupe"] . "</option>";
                        }
                    }
                    ?>
                </optgroup>

                <optgroup reference="Commun">
                    <?php
                    while ($row = $req5->fetch_array()) {
                        if (stristr($row["Groupe"], 'RW') === FALSE) {

                            echo "<option value='" . $row["Groupe"] . "'>" . $row["Groupe"] . "</option>";
                        }
                    }
                    ?>
                </optgroup>


                <optgroup reference="Service">
                    <?php
                    while ($row = $req6->fetch_array()) {
                        if (stristr($row["Groupe"], 'RW') === FALSE) {

                            echo "<option value='" . $row["Groupe"] . "'>" . $row["Groupe"] . "</option>";
                        }
                    }
                     ?>
                </optgroup>
            </select></br></br>


            </select>

/////////////////////////////////////
            <label for="nom" class="required">Nom dossier 2:</label>
            <select id="nom" name="nom">
                <optgroup reference=''>



                    <?php
                    while ($row = $req->fetch_array()) {
                        if (stristr($row["Libelle"], 'RW') === FALSE) {

                            echo "<option value='" . $row["Libelle"] . "'>" . $row["Nom"] . "</option>";
                        }
                    }
                    ?>
                </optgroup>


                <optgroup reference="Commun">
                    <?php
                    while ($row = $req2->fetch_array()) {
                        if (stristr($row["Libelle"], 'RW') === FALSE) {

                            echo "<option value='" . $row["Libelle"] . "'>" . $row["Nom"] . "</option>";
                        }
                    }
                    ?>
                </optgroup>


                <optgroup reference="Service">
                    <?php
                    while ($row = $req3->fetch_array()) {
                        if (stristr($row["Libelle"], 'RW') === FALSE) {

                            echo "<option value='" . $row["Libelle"] . "'>" . $row["Nom"] . "</option>";
                        }

                    } ?>
                </optgroup>
            </select></br></br>


            <input type="checkbox" name="ecriture" value="ecriture">Ecriture </input><br><br>
            <button>Validé</button>

        </form>
    </div>
</div>


<script>/*
  * trigger="true" permet de dire que c'est l'élément le plus haut qui fait varier toutes les autres listes
  * target=[id_cible] permet de spécifier la liste qui doit varier au changement de la sélection
  * reference=[id_reference] est l'id de l'élément parent qui déclenche la mise à jour de la liste
*/

    //Fonction qui s'occupe de la mise à jour des listes
    function updateSelectBox(object) {
        // Object correspond au input qui déclenche l'action (pays dans notre cas)
        // On récupère le select (département) qui doit être mise à jour suite au changement du parent (pays)
        var target = $("#" + object.attr('target'));

        // On récupère tous les optgroup du select cible spécifié avec target (les optgroup du select département)
        var listGroups = target.find("optgroup");

        // On récupère le optgroup qui correspond à la valeur courante du select parent (pays)
        var validGroup = target.find("optgroup[reference='" + object.find(':selected').val() + "']");

        //On modifie la valeur courante du select cible (département)
        target.val(validGroup.find("option").val());

        //On cache tous les optgroup de département
        listGroups.hide();

        //On affiche uniquement le optgroup de département qui correspond à la valeur courante de pays
        validGroup.show();

        //On vérifie si la cible (département) doit déclencher une mise à jour d'une autre liste
        // Département peut par exemple déclencher la mise à jour des villes, et les villes déclenches celle des quartiers...
        if (target.attr('content-type') == 'choices')
            target.change();
    }

    //On associe la fonction updateSelectBox à l'événement onchange des listes qui doivent déclencher des mises à jour d'autres listes
    $("select[content-type='choices']").on('change', function () {
        updateSelectBox($(this));
    });

    //On fait la première mise à jour des
    $(document).ready(function () {
        updateSelectBox($("select[trigger='true']"));
    }); </script>
</body>
</html>