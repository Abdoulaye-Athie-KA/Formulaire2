<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="Stylesheet" href="recupform2.css">
	<title>Formulaire2</title>
</head> 
<body>
<table border=6 bordercolor="#660000" width="30%"  cellspacing="5" bgcolor="#FFCC66">
<?php
$lignes = file("formule2.txt");
//affichage des enregistrements
echo"<table>";
 echo"<tr>
	<th>Matricule</th>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Date de Naissance</th>
    <th>Salaire</th>
    <th>Tel</th>
    <th>Email</th>
    <th>Action</th>
</tr>"; 
//traitement de chaque ligne
for ($i=0; $i<count($lignes); $i++)
{
 
  //Affichage des titres dans les colonnes
   //nouvelle ligne
   //eclatement en elements distincts
   $personne=explode(";",$lignes[$i]);
   //pour chaque colonne
   for($j = 0; $j < count($personne); $j++)
   {
       //nouvelle colonne
       
       echo"<td>" . $personne[$j] . "</td>";
       
   }
   {
     echo"<td><a href='supform2.php?ok=$personne[0]'><button class='sup'>Supprimer</button></a>";
     echo"<a href='modiform2.php?ok=$personne[0]'><button class='modif'>Modifier</button></a></td>";
   }
 
   //fin de ligne
   echo "</tr>";
}  
echo"</table>";
?>	


