<?php
   
$fichier=file('formule2.txt');
$nombreligne=count($fichier);
$derrniertligne=$fichier[$nombreligne-1];
$mat=explode(';',$derrniertligne);
$matricule=$mat[0];
if($matricule==''){
    $matricule="EM-".sprintf("%05d", 1);
    
} else{
      $matricule++;
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
<form action="formulaire2.php" method="post">
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
    <input type="text" placeholder="date de naissance" name="date"><br><br>
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
    <input type="text" placeholder="salaire" name="salaire" id="salaire"><br><br>
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
<br><br>
    <input type="submit" value="enregistrer" name="enregistrer" id="submit">            
</form>
</fieldset> 
<?php 
if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['date'])&& isset($_POST['salaire']) && isset($_POST['tel']) &&
isset($_POST['email']) && isset($_POST['enregistrer'])){
    if(!empty($_POST['prenom'])&& !empty($_POST['nom']) && !empty($_POST['date']) && !empty($_POST['salaire']) && !empty($_POST['tel']) &&
    !empty($_POST['email'])&& !empty($_POST['enregistrer'])){   
        $prenom=$_POST['prenom'];
        $nom=$_POST['nom'];
        $date= $_POST['date'];
        $salaire=$_POST['salaire'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];      
    if($salaire>=25000 && $salaire<=2000000){
    $tabledate=explode("/",$date);
     if(!checkdate($tabledate[1],$tabledate[0],$tabledate[2])){
         echo "la date $date n'est pas valide";
     } else {
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 if( preg_match('/^(77|78|70|76)[0-9]{7}$/',$tel))  { 
                     
                file_put_contents('formule2.txt' ,$matricule.';'.$prenom.';'.$nom.';'.$date.';'.$salaire.';'.$tel.';'.$email."\n",FILE_APPEND);
           header('Location:recupform2.php');
           
         }
     }
     }
    }
}
}

?>
</body>
</html>






