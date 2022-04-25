<?php
//echo $_GET["numed"];
$numed = $_GET["numed"];
$id = mysqli_connect("127.0.0.1:3307", "root", "", "hopital");
$resultat = mysqli_query($id, "delete from medecins
                                where numed=$numed");
header("location:listeMedecins.php");
?>