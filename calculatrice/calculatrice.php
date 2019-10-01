<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="Stylesheet" href="calcul.css">
	<title>calculatrice php</title>
</head> 
    <form method="post" action="index.php">
        Nombre 1: <input type="text" name="nomber1" valus="<?php if(isset($num1)) {echo $num1;} ?>" > <br/><br/>
        Nombre 2: <input type="text" name="nomber2" valus="<?php if(isset($num2)) {echo $num2;} ?>"> <br/><br/>

        operateur: <br/><br/>
                  <input type="radio" name="g" value="+"> Addition<br/>
                  <input type="radio" name="g" value="-"> Soustraction<br/>
                  <input type="radio" name="g" value="*">Multiplication <br/>
                  <input type="radio" name="g" value="/"> Division<br/>
                  <input type="radio" name="g" value="%">Modulo <br/><br/>
                  <input type="submit" name="submit"><br/><br/>
                 
                  
    </form>


<body>


<?php
    ini_set('display_errors',0);
   if(isset($_POST['submit']))
   {
       $num1=$_POST['nomber1'];
       $num2=$_POST['nomber2'];
       if(is_numeric['$num1'] && is_numeric['$num2'])
       {
           if(isset($_POST['g']))
           {
               $operation=$_POST['g'];
               switch ($operation)
               {
                   case'+' :
                   $result=$num1+$num2;
                   break;

                   case'-' :
                   $result=$num1-$num2;
                   break;

                   case'*' :
                   $result=$num1*$num2;
                   break;

                   case'/' :
                   $result=$num1/$num2;
                   break;

                   case'%' :
                   $result=$num1%$num2;
                   break;
                } 
               echo' <h2 style="colore:blue"> Résultat '.$num1.$operation.$num2.'= '.$result.' </h2> ' ; 
           } 
           else
           {
             echo "selectionner operation";  
           }

       }
       else
       {
          echo "entrer une valeur";
       }
   }



?>




</body>
