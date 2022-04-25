<?php
$id = mysqli_connect("127.0.0.1:3307", "root", "", "hopital");
$numed = $_GET["numed"];
$req = "select * from medecins where numed=$numed";
$res = mysqli_query($id,$req);
$ligne2 = mysqli_fetch_assoc($res);
$nom = $ligne2["nom"];
$prenom = $ligne2["prenom"];
$specialite = $ligne2["specialite"];
$service = $ligne2["service"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MODIFICATION DU MEDECIN N° <?=$numed?></h1><hr>
    <form action="" method="post">
    <input type="hidden" name="numed" value="<?=$numed?>">
    <input type="text" name="nom" placeholder="Nom du medecin :" required value="<?=$nom?>"><br><br>
    <input type="text" name="prenom" placeholder="Prénom du medecin :"  required value="<?=$prenom?>"><br><br>
    <select name="specialite">
        <?php
        
        $resultat = mysqli_query($id, "select distinct specialite from medecins
                                        order by specialite");
        while($ligne = mysqli_fetch_assoc($resultat)){
            if($specialite == $ligne["specialite"]){
                echo "<option selected>".$ligne["specialite"]."</option>";
            }else{
                echo "<option>".$ligne["specialite"]."</option>";
            }
        }
        ?>
    </select><br><br>
    <input type="text" name="service" placeholder="Numéro de service :"  required value="<?=$service?>"><br><br>
    <input type="submit" value="ENREGISTRER" name="bout">

    </form><hr>

    <?php
    if(isset($_POST["bout"])){
        
        extract($_POST);

        $req = "update medecins set nom = '$nom',
                                    prenom = '$prenom',
                                    specialite = '$specialite',
                                    service = '$service'
                where numed=$numed";
        mysqli_query($id, $req);
        //echo mysqli_error($id);
        header("location:listeMedecins.php");
    }

    ?>
</body>
</html>