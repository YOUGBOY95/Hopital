<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>AJOUT MEDECIN DANS LA BASE HOPITAL</h1><hr>
    <form action="" method="post">
    <input type="text" name="nom" placeholder="Nom du medecin :" required><br><br>
    <input type="text" name="prenom" placeholder="Prénom du medecin :"  required><br><br>
    <select name="specialite">
        <?php
        $id = mysqli_connect("127.0.0.1:3307", "root", "", "hopital");
        $resultat = mysqli_query($id, "select distinct specialite from medecins");
        while($ligne = mysqli_fetch_assoc($resultat)){
            echo "<option>".$ligne["specialite"]."</option>";
        }
        ?>
    </select><br><br>
    <input type="text" name="service" placeholder="Numéro de service :"  required><br><br>
    <input type="submit" value="ENREGISTRER" name="bout">

    </form><hr>

    <?php
    if(isset($_POST["bout"])){
        // $nom = $_POST["nom"];
        // $prenom = $_POST["prenom"];
        // $specialite = $_POST["specialite"];
        // $service = $_POST["service"];
        extract($_POST);
        echo "Tu as entré $nom $prenom $specialite $service";

        $req = "insert into medecins values
                (null,'$nom','$prenom','$specialite','$service')";
        mysqli_query($id, $req);
        header("location:listeMedecins.php");
    }

    ?>
</body>
</html>