<?php
  $code= $_GET['ok'];
    if(isset($_POST['oui'])){
      $code= $_POST['oui'];
     $file=fopen("formule2.txt","r");
     $tmp=fopen("tamponform2.txt","w+"); 
  
    while(!feof($file))
    {
      $lignefile = fgets($file);
       
      $infos = explode(';',$lignefile);
      if($code!=$infos[0]){
        fwrite($tmp,$lignefile);
      }
     
    }
  
    fclose($tmp);
    fclose($file);
    $file=fopen("formule2.txt","w+");
    $tmp=fopen("tamponform2.txt","r"); 
    
    $chaine="";
    $chaine=file_get_contents("tamponform2.txt");
    fwrite($file,$chaine);

    fclose($tmp);
    fclose($file);
    //unlink("tmp.txt");
 header("Location:recupform2.php");
    
}
   
  
   ?>
   
   <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="supform2.css">
</head>
<body>

  <form action="recupform2.php" method="post">
      <button type="submoit" name="oui" value="<?php if(isset($code)) echo $code?>">OUI</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <button class="non"> <a href="recupform2.php">NON</a></button><br><br>
        Voulez-vous supprimer cet employe?
  </form>

</body>
</html>





