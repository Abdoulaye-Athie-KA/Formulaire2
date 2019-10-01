<?php
if(isset($_GET['ok'])){
    $matricule=$_GET['ok'];
    $file=fopen('formule2.txt',"r");
    while(!feof($file))
    {
     
      $lignefile = fgets($file);
       
      $infos = explode(';',$lignefile);
      if($matricule==$infos[0]){
        $prenom=$infos[1];
          $nom=$infos[2]; 
          $date=$infos[3];
          $salaire=$infos[4];
          $tel=$infos[5];
          $email=$infos[6];
      }
     
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="Stylesheet" href="formul2.css">
	<title>Formulaire2</title>
</head> 
<body>
<fieldset>
        <legend>Formulaire Employer</legend> 
<form action="recupform2.php" method="post">
<label for=" Matricule"> Matricule :</label>
    <input type="text" name="matricule" value="<?php echo $matricule;?>"readonly><br><br>
<label for="prenom">prenom :</label>
    <input type="text" placeholder="prenom" name="prenom" id="prenom"><br><br>
    <?php
    $prenom=$_POST['prenom'];
    if(!empty($prenom))
    {
         echo "";
    }
    if(!preg_match("/^[a-zA-Z]+$/",$prenom))//le prenom s'écrive en charactère seulement
    {
        echo "veuillez entrer un prenom valide svp!";
    }
    ?>
 <label for="nom"> Nom :</label>
    <input type="text" placeholder="nom" name="nom" id="nom"><br><br>
    <?php
    $nom=$_POST['nom'];
    if(!empty($nom))
    {
        echo "";
    }
    if(!preg_match("/^[a-zA-Z]+$/",$nom))//le nom s'écrive en charactère seulement
    {
        echo "veuillez entrer un nom valide svp!";
    }
    ?>

<label for="date de Naissance">date de Naissance :</label>
    <input type="text" name="date"><br><br>
    <?php
    if(isset($_POST['date'])){
        $date= $_POST['date'];
        $tabdate= explode("/",$date);
        if(!checkdate($tabdate[1],$tabdate[0],$tabdate[2]) )
        {
            echo "date n'est pas valide ";
        }

        }
        ?>    
    <label for="salaire:">Salaire</label>
    <input type="text" name="salaire" id="salaire"><br><br>
    <?php
    if(isset($_POST['salaire'])){
    $salaire=$_POST['salaire'];
    if($salaire>=25000 && $salaire<=2000000){
               
    }else{
        echo " le salire dois etre compris entre 25000f-2000000f ";
        } echo '<br>';
    }
    ?>

<label for="Tel :">Tel:</label>
    <input type="text" placeholder="tel" name="tel" id="tel"><br><br>              
     <?php
     $tel=$_POST['tel'];        
    if(!preg_match("/^77|78|70|76)[0-9]{7}*$/",$tel))// entre un numero valide
                
    //longueur du numéro
    if(strlen($tel)<9)
    {
        echo "le numéro est insufisant";
    }
    if(strlen($tel)>9)
    {
        echo "le numéro trop long";
    }
    ?> 

    <label for=" Email"> Email:</label>
    <input type="text" placeholder="email" id="email" name="email"><br><br>
   <?php
   if(isset($_POST['email'])){
   $email=$_POST['email'];
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "L'adresse email '$email_a' n'est pas valide.";
}
   }
?>
<input  type="submit" name="modifier" value="modifier" class="btn btn-succes"></button>
                
</form>
</fieldset> 
</body>
</html>