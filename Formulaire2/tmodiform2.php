<?php
   if(isset($_POST['modifier'])){
       $code= $_GET['code'];
       $matricule=$_POST['matricule'];
       $prenom=$_POST['prenom'];
       $nom = $_POST['nom'];
       $date=$_POST['date'];
       $salaire=$_POST['salaire'];
       $tel=$_POST['tel'];
       $email=$_POST['email'];
       var_dump($matricule);
       $tab=$matricule.";".$prenom.";".$nom .";".$date.";".$salaire.";". $tel .";". $email."\n";
     $file=fopen("formule2.txt","r");
     $tmp=fopen("tamponform2.txt","w+"); 
    /*while($tab=fgets($file,1000,";")){
      if($tab[0]!=$code){
        var_dump($tab);
        $svg=$tab[0].";".$tab[1].";".$tab[2].";".$tab[3].";".$tab[4].";".$tab[5].";".$tab[0]."\n";
        fputs($tmp,$svg);
      }
    }*/
    while(!feof($file))
    {
      $lignefile = fgets($file);
       
      $infos = explode(';',$lignefile);
     // var_dump($infos[0]);
      if($matricule==$infos[0]){
        $tab=$matricule.";".$nom.";".$prenom .";".$date.";".$salaire.";". $tel .";". $email."\n";
        //var_dump($tab);
        fwrite($tmp,$tab);
      }
      else{
        fwrite($tmp,$lignefile);
      }
     
    }
  
    fclose($tmp);
    fclose($file);


   // copy("tmp.txt","employe.txt");
    $file=fopen("formule2.txt","w+");
    $tmp=fopen("tamponform2.txt","r"); 
    
    $chaine="";
    $chaine=file_get_contents("tamponform2.txt");
    fwrite($file,$chaine);

    fclose($tmp);
    fclose($file);
    unlink("tamponform2.txt");
 header("Location:recupform2.php"); 
    }
   ?>
   