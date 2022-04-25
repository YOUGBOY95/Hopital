<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Liste des medecins de l'hopital</h1><hr>
    <table>
        <tr>
            <th>Numéro</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Specialité</th>
            <th>Service</th>
            <th>Modif</th>
            <th>Supp</th>
        </tr>
    <?php
        // Connexion au serveur mysql (sgbd)
        $id = mysqli_connect("127.0.0.1:3307", "root", "", "hopital");
        //execution d'une requete sql et affectation du resultat à $resultat
        $resultat = mysqli_query($id, "select * from medecins");
        //recupération d'une ligne du résultat
        while($ligne = mysqli_fetch_assoc($resultat)){
            $numed = $ligne["numed"];
            echo "<tr><td>".$numed.
                 "</td><td>".$ligne["nom"].
                 "</td><td>".$ligne["prenom"].
                 "</td><td>".$ligne["specialite"].
                 "</td><td>".$ligne["service"].
                 "</td><td><a href='modif.php?numed=$numed'><img src='modif.png' width='25'></a>
                 </td><td><a href='sup.php?numed=$numed'><img src='sup.png' width='25'></a></td>
                 </tr>";
        }
    ?>
    </table>
</body>
</html>