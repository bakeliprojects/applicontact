<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="icon" href="image/Ussd.png" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<head><title>Ma page d'accueil</title></head>  
 
<body background="images.jpg"  style='color:#778899;'>




   <center> <h3 class="text-muted"  style='color:#778899;'>BIENVENU DANS  VOTRE APPLICATION DE GESTION DE CONTACT!!!!</h3>  </center>
     <hr>
<div class="container" display="inline-block">
     


     <div class="container-fluid" >
        <div class="row-Danger">

 <?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connection = new PDO('mysql:host=localhost;dbname=applicontact', 'root', '', $pdo_options);

  


 echo "  <center> <td class='badge'> <a href='Ajout.php'> AJOUTER<span class='glyphicon glyphicon-plus'> </span></a> </td> </center>";
?>



 
<TABLE BORDER="2" class="table table-striped" class="table-responsive">
  <CAPTION class="Danger"> <h1>liste des contacts</h1>  </CAPTION>
  <tr>
 <th > id </th>
 <th> nom</th>
 <th> prenom </th>

 <th> <span class="glyphicon glyphicon-tint"> </span> VOIR </th>
 <th> MODIFIER </th>
 <th> supprimer </th>
 

  </tr>
  
 <?php
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connection = new PDO('mysql:host=localhost;dbname=applicontact', 'root', '', $pdo_options);
     
     
    // On recupere tout le contenu de la table contact 
$reponse = $connection->query('SELECT id, nom, prenom FROM contact');
  
// On affiche le resultat
while ($donnees = $reponse->fetch())
{
    //On affiche les données dans le tableau
    echo "</tr>";
    echo "<td> $donnees[id] </td>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[prenom] </td>";
    
         echo "<td><a href='detailcontact.php?id=".$donnees['id']."'>voir<span class='glyphicon glyphicon-eye-open'></span> </a></td>";
         echo "<td><a href='modifcontact.php?id=".$donnees['id']."'>modifier<span class='glyphicon glyphicon-pencil'> </span></a></td>";
         echo "<td><a  href='suppcontact.php?id=".$donnees['id']."' onclick=\"return confirm('voulez-vous vraiment supprimer?');\"> <span class='glyphicon glyphicon-trash'></span> </a></td>";
     

    echo "</tr>";
 
     
}
$reponse->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
   

          </div>
      </div>
  </div>

   <script type="text/javascript" src="npm.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>

</table>
</body>
</html>
